<?php

namespace App\Models;

use App\Models\User;
use App\Models\vehiculoModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userVehiculoModel extends Model
{
    use HasFactory;

    protected $table = 'user_vehiculo';

    protected $fillable = [
        'user_id',
        'vehiculo_id',
        'estado',
    ];

    /** Relaciones */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function vehiculo()
    {
        return $this->belongsTo(vehiculoModel::class, 'vehiculo_id');
    }
}
