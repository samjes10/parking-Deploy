<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Cliente extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
    protected $table = 'clientes';
    protected $fillable = ['nombre', 'primer_apellido', 'segundo_apellido', 'email', 'telefono', 'carnet', 'cargo', 'direccion', 'password', 'espacioAsignado', 'imagen'
    ];

    protected $hidden = [
        'password'
    ];

    public function asignaciones()
    {
        return $this->hasMany(Asignacion::class);
    }

    public function espacios()
    {
        return $this->hasMany(Espacio::class);
    }

    public function reclamos()
    {
        return $this->hasMany(Reclamo::class);
    }
}
