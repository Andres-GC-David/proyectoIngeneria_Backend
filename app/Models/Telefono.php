<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Telefono extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'telefono';
    protected $primaryKey = 'idTelefono';
    protected $fillable = [
        'idTelefono',
        'idUsuario',
        'telefono',
        'isVerified',
    ];


    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }

}
