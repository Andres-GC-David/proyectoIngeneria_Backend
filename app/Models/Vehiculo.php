<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehiculo';
    protected $primaryKey = 'idVehiculo';
    protected $fillable = [
        'idVehiculo',
        'placa',
        'idMarca',
        'modelo',
        'idColor'
    ];


    public function marca()
    {
        return $this->belongsTo(Marca::class, 'idMarca');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'idColor');
    }

}
