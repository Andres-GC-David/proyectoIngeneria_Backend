<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    use HasFactory;

    protected $table = 'viaje';
    protected $primaryKey = 'idViaje';
    protected $fillable = [
        'idViaje',
        'puntoDeLlegada',
        'puntoDePartida',
        'idRuta',
        'idEstadoConfirmacion'
    ];


    public function ruta()
    {
        return $this->belongsTo(Ruta::class, 'idRuta');
    }

    public function estadoConfirmacion()
    {
        return $this->belongsTo(EstadoConfirmacion::class, 'idEstadoConfirmacion');
    }

}
