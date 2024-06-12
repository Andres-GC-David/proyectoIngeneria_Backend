<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteViaje extends Model
{
    use HasFactory;

    protected $table = 'clienteViaje';
    protected $primaryKey = 'idClienteViaje';
    protected $fillable = [
        'idClienteViaje',
        'idCliente',
        'idViaje',
    ];


    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idCliente');
    }

    public function viaje()
    {
        return $this->belongsTo(Viaje::class, 'idViaje');
    }

}
