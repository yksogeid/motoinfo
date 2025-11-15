<?php

namespace App\Http\Controllers\AsesorVentas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\documentoVehiculoModel;
use App\Models\mantenimientoModel;

class DashboardController extends Controller
{
    public function index()
    {
        $mantenimientosCount = mantenimientoModel::where('idMecanico', auth()->id())
            ->where('idEstado', 2)
            ->count();
        $mantenimientosPorRealizar = mantenimientoModel::where('idMecanico', auth()->id())
            ->where('idEstado', 1)
            ->count();
        $cantidadVehiculosRealizados = mantenimientoModel::where('idMecanico', auth()->id())
            ->where('idEstado', 2)
            ->distinct('idVehiculo')
            ->count('idVehiculo');
        return view('mecanico.dashboard', compact('mantenimientosCount', 'mantenimientosPorRealizar', 'cantidadVehiculosRealizados'));
    }

    public function misMantenimientos()
    {
        $mantenimientos = mantenimientoModel::where('idMecanico', auth()->id())
            ->where('idEstado', 2)
            ->get();//Mantenimiento ya realizados
        return view('mecanico.misMantenimientos', compact('mantenimientos'));
    }
    public function mantenimientosPorRealizar()
    {
        $mantenimientos = mantenimientoModel::where('idMecanico', auth()->id())
            ->where('idEstado', 1)
            ->get();//Mantenimiento por realizar
        return view('mecanico.mantenimientosPorRealizar', compact('mantenimientos'));
    }
}
