<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Editor\DashboardController as EditorDashboard;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\Mecanico\DashboardController as MecanicoDashboard;
use App\Http\Controllers\User\MotoController as UserMoto;
use App\Http\Controllers\User\UsVehiculoController as UserVehiculoController;
use App\Http\Controllers\User\DocumentoVehiculoController as DocumentoVehiculoController;
use App\Http\Controllers\AsesorVentas\MecanicosController;
use App\Http\Controllers\AsesorVentas\RepuestosController;
use App\Http\Controllers\AsesorVentas\MantenimientosController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RoleUserController;
use App\Http\Controllers\Admin\validarDocumentosController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Página inicial
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Selección de Rol
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Vista de selección de roles
    Route::get('/select-role', function () {
        $roles = auth()->user()->getRoleNames();
        return view('auth.select-role', compact('roles'));
    })->name('select.role');

    // Cambiar y asignar rol seleccionado
    Route::get('/switch-role/{role}', [AuthenticatedSessionController::class, 'switchRole'])
        ->name('role.switch');
});

/*
|--------------------------------------------------------------------------
| Dashboard dinámico según el rol seleccionado
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {

    $user = auth()->user();
    $role = session('selected_role');

    // Si no existe rol en sesión, obligar a seleccionar
    if (!$role) {

        // Si tiene más de un rol mostrar selección
        if ($user->roles->count() > 1) {
            return redirect()->route('select.role');
        }

        // Si solo tiene uno guardarlo automáticamente
        $role = $user->roles->first()->name;
        session(['selected_role' => $role]);
    }

    return match ($role) {
        'admin'        => redirect()->route('admin.dashboard'),
        'mecanico'     => redirect()->route('mecanico.dashboard'),
        'editor'       => redirect()->route('editor.dashboard'),
        'asesorVentas' => redirect()->route('asesor.dashboard'),
        default        => redirect()->route('user.dashboard'),
    };

})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Rutas protegidas según el rol + rol seleccionado
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:admin', 'selected_role:admin'])
        ->prefix('admin')
        ->group(function () {

        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('admin.dashboard');

        Route::resource('roles', RoleController::class)->names('admin.roles');

        Route::get('roles/{role}/users', [RoleUserController::class, 'index'])->name('admin.roles.users.index');
        Route::post('roles/{role}/users', [RoleUserController::class, 'attach'])->name('admin.roles.users.attach');
        Route::delete('roles/{role}/users/{user}', [RoleUserController::class, 'detach'])->name('admin.roles.users.detach');

        Route::get('/validardocumentos', [validarDocumentosController::class, 'index'])->name('admin.validardocumentos');
        Route::post('/admin/documentos/validar', [validarDocumentosController::class, 'validar'])->name('documentos.validar');
    });


    /*
    |--------------------------------------------------------------------------
    | ASESOR DE VENTAS
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:asesorVentas', 'selected_role:asesorVentas'])
        ->prefix('asesor')
        ->name('asesor.')
        ->group(function () {

        Route::get('/dashboard', [\App\Http\Controllers\AsesorVentas\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('mecanicos', MecanicosController::class);
        Route::resource('repuestos', RepuestosController::class);
        Route::resource('mantenimientos', MantenimientosController::class);
    });


    /*
    |--------------------------------------------------------------------------
    | EDITOR
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:editor', 'selected_role:editor'])
        ->prefix('editor')
        ->group(function () {

        Route::get('/dashboard', [EditorDashboard::class, 'index'])->name('editor.dashboard');
    });


    /*
    |--------------------------------------------------------------------------
    | MECÁNICO
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:mecanico', 'selected_role:mecanico'])
        ->prefix('mecanico')
        ->group(function () {

        Route::get('/dashboard', [MecanicoDashboard::class, 'index'])->name('mecanico.dashboard');
        Route::get('/misMantenimientos', [MecanicoDashboard::class, 'misMantenimientos'])->name('mecanico.misMantenimientos');
        Route::get('/mantenimientosPorRealizar', [MecanicoDashboard::class, 'mantenimientosPorRealizar'])->name('mecanico.mantenimientosPorRealizar');
        Route::post('/guardar', [MecanicoDashboard::class, 'guardarConclusion']);
        Route::post('/transcribirAudio', [MecanicoDashboard::class, 'transcribirAudio']);

    });


    /*
    |--------------------------------------------------------------------------
    | USUARIO NORMAL
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:user', 'selected_role:user'])
        ->prefix('user')
        ->group(function () {

        Route::get('/dashboard', [UserDashboard::class, 'index'])->name('user.dashboard');
       // Route::get('/motos', [UserMoto::class, 'index'])->name('user.motos');

        Route::get('/dashboard/crearVehiculo', [UserVehiculoController::class, 'create'])->name('vehiculos.create');
        Route::post('/vehiculo/{idVehiculo}/documentos/subir', [DocumentoVehiculoController::class, 'subir'])->name('documentos.subir');

        Route::post('/vehiculos', [UserVehiculoController::class, 'store'])->name('vehiculos.store');
        Route::put('/vehiculos/{id}', [UserVehiculoController::class, 'update'])->name('user.vehiculos.update');
        Route::delete('/vehiculos/{id}', [UserVehiculoController::class, 'destroy'])->name('user.vehiculos.destroy');

        Route::get('/documentos-vehiculos/{vehiculo_id}', [DocumentoVehiculoController::class, 'index'])->name('user.documentos-vehiculos.index');
    });
});

/*
|--------------------------------------------------------------------------
| Perfil
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
