<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSelectedRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        $selectedRole = session('selected_role');

        // Si no hay rol seleccionado, redirigir a selección
        if (!$selectedRole) {
            return redirect()->route('select.role');
        }

        // Si el rol solicitado NO es el que seleccionó, bloquear acceso
        if ($selectedRole !== $role) {
            abort(403, 'No tienes permiso para acceder a esta sección.');
        }

        return $next($request);
    }
}
