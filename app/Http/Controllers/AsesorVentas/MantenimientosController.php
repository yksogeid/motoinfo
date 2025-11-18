<?php

namespace App\Http\Controllers\AsesorVentas;

use App\Http\Controllers\Controller;
use App\Models\mantenimientoModel;
use App\Models\vehiculoModel;
use App\Models\estadoModel; // ← Importación correcta
use App\Models\User;
use Illuminate\Http\Request;

class MantenimientosController extends Controller
{
    /**
     * Mostrar todos los mantenimientos
     */
    public function index()
    {
        $mantenimientos = mantenimientoModel::with(['vehiculo', 'mecanico', 'estado'])
            ->orderBy('id', 'DESC')
            ->get();

        return view('asesorVentas.mantenimientos.index', compact('mantenimientos'));
    }

    /**
     * Formulario de creación
     */
    public function create()
    {
        $vehiculos = vehiculoModel::all();
        $mecanicos = User::role('mecanico')->get();
        $estados   = estadoModel::all(); // ← corregido

        return view('asesorVentas.mantenimientos.create', compact('vehiculos', 'mecanicos', 'estados'));
    }


    /**
     * Guardar nuevo mantenimiento
     */
    public function store(Request $request)
    {
        $request->validate([
            'idVehiculo'      => 'required|exists:vehiculo,id',
            'idMecanico'      => 'required|exists:users,id',
            'idEstado'        => 'required|exists:estado,id',
            'fechaProgramada' => 'required|date',
            'observacion'     => 'required|string|max:500',
        ]);

        mantenimientoModel::create([
            'idVehiculo'      => $request->idVehiculo,
            'idMecanico'      => $request->idMecanico,
            'idEstado'        => $request->idEstado,
            'fechaProgramada' => $request->fechaProgramada,
            'observacion'     => $request->observacion,
            'idAsesor'        => auth()->user()->id,
        ]);

        return redirect()->route('asesor.mantenimientos.index')
            ->with('success', 'Mantenimiento creado correctamente.');
    }

    /**
     * Ver detalle del mantenimiento
     */
    public function show($id)
    {
        $mantenimiento = mantenimientoModel::with(['vehiculo', 'mecanico', 'estado'])
            ->findOrFail($id);

        return view('asesorVentas.mantenimientos.show', compact('mantenimiento'));
    }

    /**
     * Formulario de edición
     */
    public function edit($id)
    {
        $mantenimiento = mantenimientoModel::findOrFail($id);

        $vehiculos = vehiculoModel::all();
        $mecanicos = User::role('mecanico')->get();
        $estados   = estadoModel::all(); // ← corregido

        return view('asesorVentas.mantenimientos.edit', compact(
            'mantenimiento',
            'vehiculos',
            'mecanicos',
            'estados'
        ));
    }

    /**
     * Actualizar mantenimiento
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'idVehiculo'      => 'required|exists:vehiculo,id',
            'idMecanico'      => 'required|exists:users,id',
            'idEstado'        => 'required|exists:estado,id',
            'fechaProgramada' => 'required|date',
            'observacion'     => 'required|string|max:500',
        ]);

        $mantenimiento = mantenimientoModel::findOrFail($id);

        $mantenimiento->update([
            'idVehiculo'      => $request->idVehiculo,
            'idMecanico'      => $request->idMecanico,
            'idEstado'        => $request->idEstado,
            'fechaProgramada' => $request->fechaProgramada,
            'observacion'     => $request->observacion,
        ]);

        return redirect()->route('asesor.mantenimientos.index')
            ->with('success', 'Mantenimiento actualizado correctamente.');
    }

    /**
     * Eliminar mantenimiento
     */
    public function destroy($id)
    {
        $mantenimiento = mantenimientoModel::findOrFail($id);
        $mantenimiento->delete();

        return redirect()->route('asesor.mantenimientos.index')
            ->with('success', 'Mantenimiento eliminado correctamente.');
    }
}







