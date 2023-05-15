<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    use HasFactory;
    protected $table = 'asignaciones';
    protected $fillable = [
        'cliente_id', 'espacio_id', 'fecha_hora_actual', 'fecha_limite', 'codigoEspacio', 'cliente'
    ];
    
    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function espacio()
    {
        return $this->belongsTo(Espacio::class);
    }
}