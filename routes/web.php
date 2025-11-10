<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Editor\DashboardController as EditorDashboard;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\User\MotoController as UserMoto;
use App\Http\Controllers\User\UsVehiculoController as UserVehiculoController;
use App\Http\Controllers\User\DocumentoVehiculoController as DocumentoVehiculoController;
use App\Http\Controllers\User\vehiculoController as vehiculoController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RoleUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Ruta dashboard que redirige según el rol
Route::get('/dashboard', function () {
    if (auth()->user()->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    } elseif (auth()->user()->hasRole('editor')) {
        return redirect()->route('editor.dashboard');
    } else {
        return redirect()->route('user.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {

    // Rutas de Admin
    Route::middleware(['role:admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('admin.dashboard');
        Route::resource('roles', RoleController::class)->names('admin.roles');
        Route::get('roles/{role}/users', [RoleUserController::class, 'index'])->name('admin.roles.users.index');
        Route::post('roles/{role}/users', [RoleUserController::class, 'attach'])->name('admin.roles.users.attach');
        Route::delete('roles/{role}/users/{user}', [RoleUserController::class, 'detach'])->name('admin.roles.users.detach');

    });

    // Rutas de Editor
    Route::middleware(['role:editor'])->prefix('editor')->group(function () {
        Route::get('/dashboard', [EditorDashboard::class, 'index'])->name('editor.dashboard');
    });

    // Rutas de Usuario normal
    Route::middleware(['role:user'])->prefix('user')->group(function () {
        Route::get('/dashboard', [UserDashboard::class, 'index'])->name('user.dashboard');
        Route::get('/motos', [UserMoto::class, 'index'])->name('user.motos');


        // 🏍️ CRUD de relaciones usuario-vehículo
        //Route::get('/vehiculos', [UserVehiculoController::class, 'index'])->name('user.vehiculos.index');
        Route::get('/dashboard/crearVehiculo', [UserVehiculoController::class, 'create'])->name('vehiculos.create');
        Route::post('/vehiculos', [UserVehiculoController::class, 'store'])->name('vehiculos.store');
        //Route::post('/vehiculos', [UserVehiculoController::class, 'store'])->name('user.vehiculos.store');
        //Route::get('/vehiculos/{id}', [UserVehiculoController::class, 'show'])->name('user.vehiculos.show');

        Route::put('/vehiculos/{id}', [UserVehiculoController::class, 'update'])->name('user.vehiculos.update');
        Route::delete('/vehiculos/{id}', [UserVehiculoController::class, 'destroy'])->name('user.vehiculos.destroy');

        // 🏍️ CRUD de documentos de vehículos
        Route::get('/documentos-vehiculos/{vehiculo_id}', [DocumentoVehiculoController::class, 'index'])->name('user.documentos-vehiculos.index');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';