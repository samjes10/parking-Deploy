<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espacio extends Model
{
    use HasFactory;
    protected $table = 'espacios';
    protected $filliable = ['codigo', 'descripcion', 'estado', 'ubicacion', 'parqueo_id'];

    public function parqueo()
    {
        return $this->belongsTo(Parqueo::class);
    }

    public function asignaciones()
    {
        return $this->hasMany(Asignacion::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
