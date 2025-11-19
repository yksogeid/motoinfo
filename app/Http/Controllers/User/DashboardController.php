<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\userVehiculoModel;
use App\Models\marcaModel;
use App\Models\lineaComercialModel;
use App\Models\colorModel;
use App\Models\tipoModel;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userVehiculos = userVehiculoModel::with('vehiculo')
            ->where('user_id', $user->id)
            ->get();
        $totalVehiculos = $userVehiculos->count();
        $marcas = marcaModel::all();
        $lineas = lineaComercialModel::all();
        $colores = colorModel::all();
        $tipos = tipoModel::all();

        return view('user.dashboard', [
        'userVehiculos' => $userVehiculos,
        'userLogueado' => $user,
        'totalVehiculos' => $totalVehiculos,
        'marcas'=> $marcas,
        'lineas'=> $lineas,
        'colores'=> $colores,
        'tipos'=> $tipos
    ]);
    }
}
