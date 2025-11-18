<?php

namespace App\Http\Controllers\Mecanico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\documentoVehiculoModel;
use App\Models\mantenimientoModel;

class DashboardController extends Controller
{
    public function index()
    {
        $mantenimientosCount = mantenimientoModel::where('idMecanico', auth()->id())
            ->where('idEstado', 2)
            ->count();
        $mantenimientosPorRealizar = mantenimientoModel::where('idMecanico', auth()->id())
            ->where('idEstado', 1)
            ->count();
        $cantidadVehiculosRealizados = mantenimientoModel::where('idMecanico', auth()->id())
            ->where('idEstado', 2)
            ->distinct('idVehiculo')
            ->count('idVehiculo');
        return view('mecanico.dashboard', compact('mantenimientosCount', 'mantenimientosPorRealizar', 'cantidadVehiculosRealizados'));
    }

    public function misMantenimientos()
    {
        $mantenimientos = mantenimientoModel::where('idMecanico', auth()->id())
            ->where('idEstado', 2)
            ->get(); //Mantenimiento ya realizados
        return view('mecanico.misMantenimientos', compact('mantenimientos'));
    }
    public function mantenimientosPorRealizar()
    {
        $mantenimientos = mantenimientoModel::where('idMecanico', auth()->id())
            ->where('idEstado', 1)
            ->get(); //Mantenimiento por realizar
        return view('mecanico.mantenimientosPorRealizar', compact('mantenimientos'));
    }
    public function guardarConclusion(Request $request)
    {
        $conclusionCompleta = $request->input('conclusion'); // tu string completo

        // Buscar la posición donde empieza "Conclusión técnica:"
        $pos = strpos($conclusionCompleta, 'Conclusión técnica:');

        if ($pos !== false) {
            // Extraer desde "Conclusión técnica:" hasta el final
            $conclusionTecnica = substr($conclusionCompleta, $pos);
        } else {
            // Si no encuentra, poner todo vacío o lo que quieras
            $conclusionTecnica = '';
        }

        $request->validate([
            'mantenimiento_id' => 'required|integer',
            'conclusion' => 'nullable|string',
            'audio' => 'nullable|file|mimes:wav,mp3,m4a,ogg|max:5000'
        ]);

        $mantenimiento = mantenimientoModel::findOrFail($request->mantenimiento_id);
        $mantenimiento->observacionMecanico = $conclusionTecnica;

        $mantenimiento->save();

        return response()->json(['ok' => true]);
    }
    public function transcribirAudio(Request $request)
    {
        try {
            if (!$request->hasFile('audio')) {
                return response()->json(['error' => 'No se recibió el archivo de audio'], 400);
            }

            $audio = $request->file('audio');

            $client = new \GuzzleHttp\Client();
            $response = $client->post('https://api.groq.com/openai/v1/audio/transcriptions', [
                'headers' => [ 
                    'Authorization' => 'Bearer ' . config('services.groq.key'),
                ],
                'multipart' => [
                    [
                        'name' => 'file',
                        'contents' => fopen($audio->getRealPath(), 'r'),
                        'filename' => $audio->getClientOriginalName(),
                    ],
                    [
                        'name'  => 'model',
                        'contents' => 'whisper-large-v3'
                    ]
                ]
            ]);

            $transcripcion = json_decode($response->getBody(), true);
            $textoMecanico = $transcripcion['text'] ?? '';

            if (empty($textoMecanico)) {
                return response()->json(['error' => 'No se pudo obtener la transcripción'], 500);
            }

            $mantenimientoId = $request->input('mantenimiento_id');

            $mantenimiento = mantenimientoModel::find($mantenimientoId);

            if (!$mantenimiento) {
                return response()->json(['error' => 'Mantenimiento no encontrado'], 404);
            }

            $observacionCliente = $mantenimiento->observacion; // <-- Ajusta al nombre real del campo

            $openRouterResponse = $client->post('https://openrouter.ai/api/v1/chat/completions', [
                'headers' => [
                    'Authorization' => 'Bearer ' . config('services.openrouter.key'),
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => 'openai/gpt-4.1-mini',
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => 'Eres un asistente técnico especializado en mecánica de motos. Tu tarea es generar una conclusión técnica breve, profesional y precisa a partir de la observación del cliente y el comentario del mecánico. Usa terminología mecánica precisa, lista para registrar en un informe de mantenimiento. No agregues sugerencias ni preguntas.'
                        ],
                        [
                            'role' => 'user',
                            'content' => "Observación del cliente: {$observacionCliente}\nComentario del mecánico: {$textoMecanico}"
                        ]
                    ]
                ]
            ]);

            $conclusionData = json_decode($openRouterResponse->getBody(), true);
            $conclusionTecnica =
                "Observación del cliente: " . $observacionCliente . "\n" .
                "Observación del mecánico: " . $textoMecanico . "\n" .
                "Conclusión técnica: " . ($conclusionData['choices'][0]['message']['content'] ?? '');


            return response()->json(['text' => $conclusionTecnica ?? '']);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al procesar el audio: ' . $e->getMessage()
            ], 500);
        }
    }
}
