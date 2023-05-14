<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_usuario',
        'correo',
        'contrasena',
        'foto_perfil'
    ];

    protected $hidden = [
        'contrasena'
    ];

}
