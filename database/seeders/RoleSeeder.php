<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Crear roles
        $adminRole = Role::create(['name' => 'admin']);
        $editorRole = Role::create(['name' => 'editor']);
        $userRole = Role::create(['name' => 'user']);

        // Crear permisos
        $permissions = [
            'view dashboard',
            'create posts',
            'edit posts',
            'delete posts',
            'manage users',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Asignar permisos a roles
        $adminRole->givePermissionTo(Permission::all());
        $editorRole->givePermissionTo(['view dashboard', 'create posts', 'edit posts']);
        $userRole->givePermissionTo(['view dashboard']);

        // Crear usuarios de prueba
        $admin = User::create([
            'documento' => 123,
            'fechanacimiento' => '2000-01-01',
            'pais' => 'Colombia',
            'ciudad' => 'Bogota',
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('admin');

        $editor = User::create([
            'documento' => 12345,
            'fechanacimiento' => '2000-01-01',
            'pais' => 'Colombia',
            'ciudad' => 'Bogota',
            'name' => 'Editor User',
            'email' => 'editor@example.com',
            'password' => bcrypt('password'),
        ]);
        $editor->assignRole('editor');

        $user = User::create([
            'documento' => 1234567,
            'fechanacimiento' => '2000-01-01',
            'pais' => 'Colombia',
            'ciudad' => 'Bogota',
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole('user');
    }
}