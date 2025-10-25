<?php

namespace App\Http\Controllers\User;

use App\Models\documentoVehiculoModel;
use App\Http\Controllers\Controller;

class DocumentoVehiculoController extends Controller
{
public function index($idVehiculo)
{
$documentoVehiculos = documentoVehiculoModel::with('admin_aprobo','estado_validacion')
    ->where('vehiculo_id', $idVehiculo)
    ->get();
    return view('user.documentovehiculo', compact('documentoVehiculos'));
}

}