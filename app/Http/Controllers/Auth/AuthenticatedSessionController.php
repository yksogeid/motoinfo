<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = $request->user();

        // Limpiar rol previo si existe
        session()->forget('selected_role');

        // Si tiene más de un rol -> Seleccionar
        if ($user->roles->count() > 1) {
            return redirect()->route('select.role');
        }

        // Si solo tiene un rol lo guardamos en sesión
        $role = $user->roles->first()->name;
        session(['selected_role' => $role]);

        return $this->redirectByRole($role);
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        session()->forget('selected_role');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function switchRole($role)
    {
        $user = auth()->user();

        if (!$user->hasRole($role)) {
            abort(403, 'No tienes permiso para acceder con este rol.');
        }

        session(['selected_role' => $role]);

        return $this->redirectByRole($role);
    }

    private function redirectByRole($role)
    {
        return match ($role) {
            'admin'        => redirect()->route('admin.dashboard'),
            'mecanico'     => redirect()->route('mecanico.dashboard'),
            'editor'       => redirect()->route('editor.dashboard'),
            'asesorVentas' => redirect()->route('asesor.dashboard'),
            default        => redirect()->route('user.dashboard'),
        };
    }
}






