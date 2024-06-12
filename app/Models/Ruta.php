<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;

    protected $table = 'ruta';
    protected $primaryKey = 'idRuta';
    protected $fillable = [
        
        'idRuta',
        'ruta',

    ];

}
