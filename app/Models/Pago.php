<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    protected $table = 'pagos';
    protected $fillable = [
        'asignacion_id', 'codigoEspacio', 'cliente', 'monto', 'dias_retraso', 'total', 'detalle', 'fecha_hora_actual'
    ];

    public function asignacion()
    {
        return $this->belongsTo(Asignacion::class);
    }

}
