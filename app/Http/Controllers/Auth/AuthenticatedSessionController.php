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

    public function store(LoginRequest $request): RedirectResponse {
    $request->authenticate();
    $request->session()->regenerate();

    //Segun el rol redirige a la vista correspondiente
    if ($request->user()->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    } elseif ($request->user()->hasRole('mecanico')) {
        return redirect()->route('mecanico.dashboard');
    } elseif ($request->user()->hasRole('editor')) {
        return redirect()->route('editor.dashboard');
    } else {
        return redirect()->route('user.dashboard');
    }
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
}
