<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'cliente';
    protected $primaryKey = 'idCliente';
    protected $fillable = [
        'idCliente',
        'fechaDeNacimiento',
        'idUsuario'
    ];


    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }

}
