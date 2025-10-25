<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserVehiculoModel;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userVehiculos = UserVehiculoModel::with('vehiculo')
            ->where('user_id', $user->id)
            ->get();
        $totalVehiculos = $userVehiculos->count();
           return view('user.dashboard', [
        'userVehiculos' => $userVehiculos,
        'userLogueado' => $user,
        'totalVehiculos' => $totalVehiculos,
    ]);
    }
}
