<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marcaModel extends Model
{
    use HasFactory;

    protected $table = 'marca';

    protected $fillable = ['nombre'];

    /** Relaciones */
    public function vehiculos()
    {
        return $this->hasMany(vehiculoModel::class, 'marca_id');
    }
}
