<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipoDocumentoModel extends Model
{
    protected $table = "tipodocumento";
    protected $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        "nombre",
    ];
}
