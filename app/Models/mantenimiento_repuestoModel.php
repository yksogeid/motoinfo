<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mantenimiento_repuestoModel extends Model
{
    protected $table = 'mantenimiento_repuesto';
    
    protected $fillable = [
        'idMantenimiento',
        'idRepuesto',
    ];
    
    public function mantenimiento()
    {
        return $this->belongsTo(Mantenimiento::class, 'idMantenimiento');
    }
    
    public function repuesto()
    {
        return $this->belongsTo(Repuesto::class, 'idRepuesto');
    }
}
