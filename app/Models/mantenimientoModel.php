<?php

namespace App\Models;

use App\Models\Estado;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Database\Eloquent\Model;

class mantenimientoModel extends Model
{
    protected $table = 'mantenimiento';
    protected $fillable = ['idVehiculo', 'observacion', 'idEstado', 'idAsesor', 'idMecanico'];  

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
        return $this->belongsTo(Estado::class, 'idEstado');
    }

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'idVehiculo');
    }
}
