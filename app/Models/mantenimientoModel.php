<?php

namespace App\Models;

use App\Models\estadoModel;
use App\Models\User;
use App\Models\vehiculoModel;
use Illuminate\Database\Eloquent\Model;

class mantenimientoModel extends Model
{
    protected $table = 'mantenimiento';
    protected $fillable = ['idVehiculo', 'observacion', 'idEstado', 'idAsesor', 'idMecanico', 'fechaProgramada'];  

    public function asesor()
    {
        return $this->belongsTo(User::class, 'idAsesor');
    }

    public function mecanico()
    {
        return $this->belongsTo(User::class, 'idMecanico');
    }

    public function estado()
    {
        return $this->belongsTo(estadoModel::class, 'idEstado');
    }

    public function vehiculo()
    {
        return $this->belongsTo(vehiculoModel::class, 'idVehiculo');
    }
}
