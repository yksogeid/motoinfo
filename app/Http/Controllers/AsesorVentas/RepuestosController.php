<?php

namespace App\Http\Controllers\AsesorVentas;

use App\Http\Controllers\Controller;
use App\Models\repuestoModel;
use Illuminate\Http\Request;

class RepuestosController extends Controller
{
    public function index()
    {
        $repuestos = repuestoModel::all();
        return view('asesorVentas.repuestos.index', compact('repuestos'));
    }

    public function create()
    {
        return view('asesorVentas.repuestos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        repuestoModel::create([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('asesor.repuestos.index')
            ->with('success', 'Repuesto creado correctamente');
    }

    public function edit($id)
    {
        $repuesto = repuestoModel::findOrFail($id);
        return view('asesorVentas.repuestos.edit', compact('repuesto'));
    }

    public function update(Request $request, $id)
    {
        $repuesto = repuestoModel::findOrFail($id);

        $request->validate([
            'nombre' => 'required',
        ]);

        $repuesto->update([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('asesor.repuestos.index')
            ->with('success', 'Repuesto actualizado correctamente');
    }

    public function destroy($id)
    {
        $repuesto = repuestoModel::findOrFail($id);
        $repuesto->delete();

        return redirect()->route('asesor.repuestos.index')
            ->with('success', 'Repuesto eliminado correctamente');
    }
}




