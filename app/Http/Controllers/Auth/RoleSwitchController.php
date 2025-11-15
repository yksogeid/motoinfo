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

        Session::put('selected_role', $role);

        if ($role === 'admin') return redirect()->route('admin.dashboard');
        if ($role === 'mecanico') return redirect()->route('mecanico.dashboard');
        if ($role === 'editor') return redirect()->route('editor.dashboard');

        return redirect()->route('user.dashboard');
    }
}
