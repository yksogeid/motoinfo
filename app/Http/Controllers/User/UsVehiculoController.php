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
        $marcas = marcaModel::all();
        $lineas = lineaComercialModel::all();
        $colores = colorModel::all();
        $tipos = tipoModel::all();
        $tipoDocumentos = tipoDocumentoModel::all();

        return view('user_vehiculo.index', [
            'userVehiculos' => $userVehiculos,
            'userLogueado' => $user,
            'marcas' => $marcas,
            'lineas' => $lineas,
            'colores' => $colores,
            'tipos' => $tipos,
            'tipoDocumentos' => $tipoDocumentos,
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
            'placa' => 'required|string|max:10|unique:vehiculo,placa'
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

        // ✅ Redirigir con mensaje de éxito
        return redirect()
            ->route('user.dashboard')
            ->with([
                'success' => 'El vehículo ha sido registrado exitosamente.',
                'titulo' => 'Registro completado'
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
