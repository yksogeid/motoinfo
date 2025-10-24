<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\UserVehiculoModel;
use App\Models\User;
use App\Models\vehiculoModel;
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


    /**
     * Crear una nueva relación usuario-vehículo.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'vehiculo_id' => 'required|exists:vehiculo,id',
            'estado' => 'boolean',
        ]);

        $userVehiculo = userVehiculoModel::create([
            'user_id' => $request->user_id,
            'vehiculo_id' => $request->vehiculo_id,
            'estado' => $request->estado ?? true,
        ]);

        return response()->json([
            'message' => 'Relación usuario-vehículo creada correctamente',
            'data' => $userVehiculo
        ], 201);
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

        return response()->json([
            'message' => 'Estado actualizado correctamente',
            'data' => $userVehiculo
        ]);
    }

    /**
     * Eliminar una relación usuario-vehículo.
     */
    public function destroy($id)
    {
        $userVehiculo = userVehiculoModel::findOrFail($id);
        $userVehiculo->delete();

        return response()->json(['message' => 'Relación eliminada correctamente']);
    }
}
