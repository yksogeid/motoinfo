<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipoModel extends Model
{
    protected $table = 'tipo';
    protected $fillable = ['nombre'];

    /** Relaciones */
    public function vehiculos()
    {
        return $this->hasMany(vehiculoModel::class, 'tipo_id');
    }
}
