<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\documentoVehiculoModel;

class validarDocumentosController extends Controller
{
    public function index()
    {
        $documentos = documentoVehiculoModel::all();
        return view('admin.validacion.validarDocumentos', compact('documentos'));
    }

    public function validar(Request $request)
    {
        $request->validate([
            'documento_id' => 'required|exists:documentovehiculo,id',
            'observacion' => 'required|string|max:255',
            'accion' => 'required|in:validar,rechazar',
        ]);

        $doc = documentoVehiculoModel::findOrFail($request->documento_id);
        $doc->observacion = $request->observacion;
        $doc->id_admin_aprobo = auth()->id();
        $doc->fecha_aprobacion = now();

        // ✅ Estado según la acción
        if ($request->accion === 'validar') {
            $doc->id_estado_validacion = 2; // Validado
        } else {
            $doc->id_estado_validacion = 3; // Rechazado
        }

        $doc->save();

        // ✅ Redirigir con mensaje de éxito
        return redirect()
            ->route('admin.validardocumentos')
            ->with('success', 'El documento ha sido ' . ($request->accion === 'validar' ? 'validado' : 'rechazado') . ' correctamente.');
    }
}
