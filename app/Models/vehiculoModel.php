<?php

namespace App\Models;   

use App\Models\marcaModel;
use App\Models\lineaComercialModel;
use App\Models\colorModel;
use App\Models\tipoModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehiculoModel extends Model
{
    use HasFactory;

    protected $table = 'vehiculo';

    protected $fillable = [
        'nombre',
        'marca_id',
        'linea_id',
        'color_id',
        'tipo_id',
        'cilindraje',
        'modelo',
        'combustible',
        'numeropasajero',
        'placa',
    ];

    /** Relaciones */
    public function marca()
    {
        return $this->belongsTo(marcaModel::class, 'marca_id');
    }

    public function linea()
    {
        return $this->belongsTo(lineaComercialModel::class, 'linea_id');
    }

    public function color()
    {
        return $this->belongsTo(colorModel::class, 'color_id');
    }

    public function tipo()
    {
        return $this->belongsTo(tipoModel::class, 'tipo_id');
    }
}
