<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parqueo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion','estado','filas','columnas','cantidadEspacios', 'precio'];


    public function espacios()
    {
        return $this->hasMany(Espacio::class);
    }
}
