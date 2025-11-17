<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class RoleSwitchController extends Controller
{
    public function switch($role)
    {
        $user = auth()->user();

        if (! $user->hasRole($role)) {
            abort(403, "No tienes este rol.");
        }

        // Guardar la selección en sesión
        Session::put('selected_role', $role);

        // Cambiar dinámicamente el rol activo en Spatie
        $user->syncRoles([$role]);

        // Redirigir según el rol asignado
        if ($role === 'admin') return redirect()->route('admin.dashboard');
        if ($role === 'mecanico') return redirect()->route('mecanico.dashboard');
        if ($role === 'editor') return redirect()->route('editor.dashboard');
        if ($role === 'asesorVentas') return redirect()->route('asesor.dashboard');

        return redirect()->route('user.dashboard');
    }
}

