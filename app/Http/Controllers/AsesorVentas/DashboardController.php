<?php

namespace App\Http\Controllers\AsesorVentas;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\mantenimientoModel;
use App\Models\repuestoModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Cant. mecánicos
        $mecanicosCount = User::role('mecanico')->count();

        // Cant. mantenimientos
        $mantenimientosCount = mantenimientoModel::count();

        // Cant. repuestos
        $repuestosCount = repuestoModel::count();

        return view('asesorVentas.dashboard', compact(
            'mecanicosCount',
            'mantenimientosCount',
            'repuestosCount'
        ));
    }
}

