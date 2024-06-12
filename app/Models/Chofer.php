<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chofer extends Model
{
    use HasFactory;

    protected $table = 'chofer';
    protected $primaryKey = 'idChofer';
    protected $fillable = [
        'idChofer',
        'idUsuario',
        'idVehiculo',
    ];


    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'idVehiculo');
    }

}
