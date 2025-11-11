<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\UserVehiculoModel;
use App\Models\User;
use App\Models\vehiculoModel;
use App\Models\marcaModel;
use App\Models\lineaComercialModel;
use App\Models\colorModel;
use App\Models\tipoModel;
use App\Models\tipoDocumentoModel;
use App\Models\documentoVehiculoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsVehiculoController extends Controller
{
    /**
     * Mostrar todas las relaciones usuario-vehículo.
     */
    public function index()
    {
        $user = Auth::user();
        $userVehiculos = UserVehiculoModel::with('vehiculo')
            ->where('user_id', $user->id)
            ->get();

        return view('user_vehiculo.index', [
            'userVehiculos' => $userVehiculos,
            'userLogueado' => $user,
        ]);
    }


    public function create()
    {
        $marcas = marcaModel::all();
        $lineas = lineaComercialModel::all();
        $colores = colorModel::all();
        $tipos = tipoModel::all();
        $tipoDocumentos = tipoDocumentoModel::all();

        return view('vehiculos.create', compact('marcas', 'lineas', 'colores', 'tipos', 'tipoDocumentos'));
    }

    /**
     * Guardar un nuevo vehículo.
     */
    public function store(Request $request)
{
    // ✅ Validaciones del formulario
    $request->validate([
        'nombre' => 'required|string|max:100',
        'marca_id' => 'required|exists:marca,id',
        'linea_id' => 'required|exists:lineacomercial,id',
        'color_id' => 'required|exists:color,id',
        'tipo_id' => 'required|exists:tipo,id',
        'cilindraje' => 'required|numeric',
        'modelo' => 'required|integer',
        'combustible' => 'required|string|max:50',
        'numeropasajero' => 'required|integer',
        'placa' => 'required|string|max:10|unique:vehiculo,placa',
        'tipoDocumento_id' => 'required|exists:tipodocumento,id',
        'documento' => 'required|file|mimes:pdf,jpg,jpeg|max:5120', // 5 MB máx
    ]);

    // ✅ Crear vehículo
    $vehiculo = vehiculoModel::create($request->only([
        'nombre',
        'marca_id',
        'linea_id',
        'color_id',
        'tipo_id',
        'cilindraje',
        'modelo',
        'combustible',
        'numeropasajero',
        'placa'
    ]));

    // ✅ Asociar vehículo al usuario autenticado
    $user = Auth::user();

    UserVehiculoModel::create([
        'user_id' => $user->id,
        'vehiculo_id' => $vehiculo->id,
        'estado' => 1,
    ]);

    // ✅ Guardar documento asociado
    if ($request->hasFile('documento')) {
        $archivo = $request->file('documento');
        $tipoDocumento = tipoDocumentoModel::findOrFail($request->tipoDocumento_id);

        // Obtener extensión del archivo
        $extension = $archivo->getClientOriginalExtension();

        // Nombre de archivo seguro (sin caracteres raros)
        $nombreArchivo = preg_replace(
            '/[^A-Za-z0-9_\-]/',
            '_',
            $user->documento . '-' . $tipoDocumento->nombre
        ) . '.' . $extension;

        try {
            // Guardar archivo en storage/app/public/documentos
            $path = $archivo->storeAs('documentos', $nombreArchivo, 'public');

            // Generar URL pública accesible
            $urlPublica = asset('storage/' . $path);

            // Guardar registro en la tabla documentoVehiculo
            documentoVehiculoModel::create([
                'vehiculo_id' => $vehiculo->id,
                'tipo_documento_id' => $request->tipoDocumento_id,
                'urlArchivo' => $urlPublica,
                'fechaSubida' => now(),
                'id_estado_validacion' => 1,
            ]);
        } catch (\Exception $e) {
            // En caso de error, eliminar el vehículo recién creado para evitar datos huérfanos
            $vehiculo->delete();
            return redirect()
                ->back()
                ->withErrors(['documento' => 'Error al subir el archivo: ' . $e->getMessage()])
                ->withInput();
        }
    }

    // ✅ Redirigir con mensaje de éxito
    return redirect()
        ->route('user.dashboard')
        ->with([
            'success' => 'Se ha creado el vehículo y el documento se ha cargado correctamente.',
            'titulo' => 'Creación exitosa'
        ]);
}

    /**
     * Mostrar una relación específica.
     */
    public function show($id)
    {
        $userVehiculo = userVehiculoModel::with(['usuario', 'vehiculo'])->findOrFail($id);
        return response()->json($userVehiculo);
    }

    /**
     * Actualizar una relación existente.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'estado' => 'boolean',
        ]);

        $userVehiculo = userVehiculoModel::findOrFail($id);
        $userVehiculo->update($request->only('estado'));

        // Redirige con mensaje de éxito
        return redirect()
            ->route('user.dashboard')
            ->with('success', 'El estado se actualizo correctamente.');
    }


    /**
     * Eliminar una relación usuario-vehículo.
     */
    public function destroy($id)
    {
        $userVehiculo = userVehiculoModel::findOrFail($id);
        $userVehiculo->delete();

        return redirect()
            ->route('user.dashboard')
            ->with([
                'success' => 'Se ha realizado la eliminación del vehiculo exitosamente.',
                'titulo' => 'Eliminación exitosa'
            ]);
    }
}
