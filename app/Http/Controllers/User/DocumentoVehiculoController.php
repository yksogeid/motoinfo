<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\documentoVehiculoModel;
use App\Models\tipoDocumentoModel;
use App\Http\Controllers\Controller;

class DocumentoVehiculoController extends Controller
{
public function index($idVehiculo)
{
    // Traer todos los documentos existentes del vehículo con sus relaciones
    $documentoVehiculos = documentoVehiculoModel::with(['admin_aprobo', 'estado_validacion'])
        ->where('vehiculo_id', $idVehiculo)
        ->get();

    // IDs de tipos de documento que ya tiene el vehículo
    $tiposYaCargados = $documentoVehiculos->pluck('tipo_documento_id')->toArray();

    // Tipos de documento faltantes
    $tiposFaltantes = tipoDocumentoModel::whereNotIn('id', $tiposYaCargados)->get();

    // Pasamos $idVehiculo a la vista
    return view('user.documentovehiculo', [
        'documentoVehiculos' => $documentoVehiculos,
        'tiposFaltantes' => $tiposFaltantes,
        'vehiculo' => (object)['id' => $idVehiculo],
    ]);
}

public function subir(Request $request, $idVehiculo)
{
    // Validar los datos del formulario
    $request->validate([
        'tipo_documento' => 'required|exists:tipodocumento,id',
        'archivo' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
    ]);

    // Guardar el archivo físicamente en storage/app/public/documentos_vehiculo
    $archivo = $request->file('archivo');
    $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
    $rutaArchivo = $archivo->storeAs('documentos', $nombreArchivo, 'public');

    // Crear el registro en la base de datos
    $documento = new documentoVehiculoModel();
    $documento->vehiculo_id = $idVehiculo;
    $documento->tipo_documento_id = $request->tipo_documento;
    $documento->urlArchivo = '/storage/' . $rutaArchivo;
    $documento->fechaSubida = now();
    $documento->id_estado_validacion = 1; // Por ejemplo: "Pendiente de validación"
    $documento->observacion = null;
    $documento->id_admin_aprobo = null;
    $documento->fecha_aprobacion = null;
    $documento->save();

    // Redirigir con mensaje de éxito
    return redirect()
    ->route('user.documentos-vehiculos.index', ['vehiculo_id' => $idVehiculo])
    ->with('success', 'Documento subido correctamente.');


}



}