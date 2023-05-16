<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Reclamo extends Model
{
    use HasFactory;

    protected $table = 'reclamos';

    protected $fillable = ['cliente_id', 'asunto', 'descripcion'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function historial()
    {
        return $this->hasMany(HistorialReclamo::class);
    }
}
