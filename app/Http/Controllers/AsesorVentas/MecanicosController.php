<?php

namespace App\Http\Controllers\AsesorVentas;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MecanicosController extends Controller
{
    public function index()
    {
        $mecanicos = User::role('mecanico')->get();
        return view('asesorVentas.mecanicos.index', compact('mecanicos'));
    }

    public function create()
    {
        return view('asesorVentas.mecanicos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'documento' => 'required',
            'password' => 'required|min:6',
        ]);

        $mecanico = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'documento' => $request->documento,
            'password' => Hash::make($request->password),
        ]);

        $mecanico->assignRole('mecanico');

        return redirect()->route('asesor.mecanicos.index')->with('success', 'Mecánico creado correctamente');
    }

    public function edit($id)
    {
        $mecanico = User::findOrFail($id);
        return view('asesorVentas.mecanicos.edit', compact('mecanico'));
    }

    public function update(Request $request, $id)
    {
        $mecanico = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'documento' => 'required',
        ]);

        $mecanico->update([
            'name' => $request->name,
            'email' => $request->email,
            'documento' => $request->documento,
        ]);

        return redirect()->route('asesor.mecanicos.index')->with('success', 'Mecánico actualizado');
    }

    public function destroy($id)
    {
        $mecanico = User::findOrFail($id);
        $mecanico->removeRole('mecanico');
        $mecanico->delete();

        return redirect()->route('asesor.mecanicos.index')->with('success', 'Mecánico eliminado');
    }
}



