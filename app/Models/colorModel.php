<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class colorModel extends Model
{
    protected $table = 'color';
    protected $fillable = ['nombre'];

    /** Relaciones */
    public function vehiculos()
    {
        return $this->hasMany(vehiculoModel::class, 'color_id');
    }
}
