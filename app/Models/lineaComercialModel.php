<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lineaComercialModel extends Model
{
    protected $table = 'lineacomercial';
    protected $fillable = ['nombre'];

    /** Relaciones */
    public function vehiculos()
    {
        return $this->hasMany(vehiculoModel::class, 'linea_id');
    }
}
