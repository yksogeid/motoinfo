<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mantenimientoModel extends Model
{
    protected $table = 'mantenimiento';
    protected $fillable = ['idVehiculo', 'observacion', 'idEstado', 'idAsesor', 'idMecanico'];  
}
