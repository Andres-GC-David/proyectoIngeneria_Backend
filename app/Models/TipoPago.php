<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPago extends Model
{
    use HasFactory;

    protected $table = 'tipoPago';
    protected $primaryKey = 'idTipoPago';
    protected $fillable = [
        
        'idTipoPago',
        'tipo',

    ];

}
