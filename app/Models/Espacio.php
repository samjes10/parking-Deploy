<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espacio extends Model
{
    use HasFactory;
    protected $filliable = ['id', 'codigo', 'descripcion', 'estado', 'parqueo_id'];

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
