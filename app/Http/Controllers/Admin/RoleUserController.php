<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    public function index(Role $role)
    {
        $users = $role->users; // Usuarios con ese rol
        $availableUsers = User::whereDoesntHave('roles', fn($q) => $q->where('id', $role->id))->get();

        return view('admin.roles.users', compact('role', 'users', 'availableUsers'));
    }

    public function attach(Request $request, Role $role)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->assignRole($role->name);

        return redirect()->route('admin.roles.users.index', $role)
            ->with('success', 'Usuario asignado correctamente al rol.');
    }

    public function detach(Role $role, User $user)
    {
        $user->removeRole($role->name);

        return redirect()->route('admin.roles.users.index', $role)
            ->with('success', 'Usuario eliminado del rol.');
    }
}
