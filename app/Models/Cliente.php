<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'clientes';
    protected $fillable = ['nombre', 'primer_apellido', 'segundo_apellido', 'email', 'telefono', 'carnet', 'cargo', 'direccion', 'password', 'espacioAsignado', 'imagen'
    ];

    public function asignaciones()
    {
        return $this->hasMany(Asignacion::class);
    }

    public function espacios()
    {
        return $this->hasMany(Espacio::class);
    }
}
