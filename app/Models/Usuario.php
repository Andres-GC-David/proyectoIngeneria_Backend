<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Usuario extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

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

    public function telefonos()
    {
        return $this->hasMany(Telefono::class, 'idUsuario');
    }

}
