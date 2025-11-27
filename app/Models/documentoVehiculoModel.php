<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\vehiculoModel;
use App\Models\tipoDocumentoModel;
use App\Models\estadoModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class documentoVehiculoModel extends Model
{
    use HasFactory;
    protected $table = "documentovehiculo";
    protected $primaryKey = "id";
    protected $fillable = [
        "vehiculo_id",
        "tipo_documento_id",
        "urlArchivo",
        "fechaSubida",
        "id_estado_validacion",
        "observacion",
        "id_admin_aprobo",
        "fecha_aprobacion",
    ];

    public function vehiculo()
    {
        return $this->belongsTo(vehiculoModel::class, "vehiculo_id");
    }

    public function tipo_documento()
    {
        return $this->belongsTo(tipodocumentoModel::class, "tipo_documento_id");
    }

    public function estado_validacion()
    {
        return $this->belongsTo(estadoModel::class, "id_estado_validacion");
    }

    public function admin_aprobo()
    {
        return $this->belongsTo(User::class, "id_admin_aprobo");
    }
}
