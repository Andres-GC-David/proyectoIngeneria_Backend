<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoConfirmacion extends Model
{
    use HasFactory;

    protected $table = 'estadoConfirmacion';
    protected $primaryKey = 'idEstadoConfirmacion';
    protected $fillable = [
        
        'idEstadoConfirmacion',
        'estado',

    ];

}
