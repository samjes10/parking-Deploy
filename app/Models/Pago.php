<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    protected $table = 'pagos';
    protected $fillable = [
        'codigoEspacio', 'cliente', 'precio_Espacio', 'dias_retraso', 'descuento', 'total', 'detalle', 'asignacion_id'
    ];

    public function asignacion()
    {
        return $this->belongsTo(Asignacion::class);
    }

}
