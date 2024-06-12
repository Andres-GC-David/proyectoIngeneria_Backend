<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChoferViaje extends Model
{
    use HasFactory;

    protected $table = 'choferViaje';
    protected $primaryKey = 'idChoferViaje';
    protected $fillable = [
        'idChoferViaje',
        'idChofer',
        'idViaje',
    ];


    public function chofer()
    {
        return $this->belongsTo(Chofer::class, 'idChofer');
    }

    public function viaje()
    {
        return $this->belongsTo(Viaje::class, 'idViaje');
    }

}
