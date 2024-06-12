<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $table = 'pago';
    protected $primaryKey = 'idPago';
    protected $fillable = [
        'idPago',
        'idViaje',
        'montoTotal',
        'idTipoPago'
    ];


    public function tipoPago()
    {
        return $this->belongsTo(TipoPago::class, 'idTipoPago');
    }

    public function viaje()
    {
        return $this->belongsTo(Viaje::class, 'idViaje');
    }
}
