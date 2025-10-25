<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class estadoModel extends Model
{
    protected $table = "estado";
    protected $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        "nombre",
    ];
}
