<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller {
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */

    public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();
    $request->session()->regenerate();

    $user = $request->user();

    // Si el usuario tiene más de un rol → mostrar pantalla de selección
    if ($user->roles->count() > 1) {
        return redirect()->route('select.role');
    }

    // Si solo tiene un rol, redirige normal
    if ($user->hasRole('admin')) {
        session(['selected_role' => 'admin']);
        return redirect()->route('admin.dashboard');
    }
    if ($user->hasRole('mecanico')) {
        session(['selected_role' => 'mecanico']);
        return redirect()->route('mecanico.dashboard');
    }
    if ($user->hasRole('editor')) {
        session(['selected_role' => 'editor']);
        return redirect()->route('editor.dashboard');
    }

    session(['selected_role' => 'user']);
    return redirect()->route('user.dashboard');
}



    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function switchRole($role) 
{
    $user = auth()->user();

    // Validar que el usuario realmente tenga ese rol
    if (! $user->hasRole($role)) {
        abort(403, 'No tienes permiso para usar este rol.');
    }

    // Guardamos el rol elegido en sesión
    session(['selected_role' => $role]);

    // Redirigir al dashboard correcto
    if ($role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    if ($role === 'mecanico') {
        return redirect()->route('mecanico.dashboard');
    }
    if ($role === 'editor') {
        return redirect()->route('editor.dashboard');
    }
    
    return redirect()->route('user.dashboard');
}

}
