<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialReclamo extends Model
{
    use HasFactory;

    protected $fillable = ['reclamo_id', 'cliente_id', 'nombre_cliente', 'accion', 'descripcion'];

    protected $table = 'historial_reclamos';

    // Otras propiedades y métodos del modelo

    public function reclamo()
    {
        return $this->belongsTo(Reclamo::class);
    }
}
