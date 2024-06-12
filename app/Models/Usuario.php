<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario';
    protected $primaryKey = 'idUsuario';
    protected $fillable = [
        'idUsuario',
        'nombre',
        'apellido',
        'idTipoUsuario'
    ];


    public function tipoUsuario()
    {
        return $this->belongsTo(TipoUsuario::class, 'idTipoUsuario');
    }

}
