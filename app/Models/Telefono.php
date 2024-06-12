<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    use HasFactory;

    protected $table = 'telefono';
    protected $primaryKey = 'idTelefono';
    protected $fillable = [
        'idTelefono',
        'idUsuario',
        'telefono'
    ];


    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }

}
