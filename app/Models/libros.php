<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class libros extends Model
{
    use HasFactory;

    protected $table = 'libros';

    protected $fillable = [
        'nombre',
        'autor_id',
        'editorial_id',
        'genero_id',
        'stock',
        'foto',
    ];

    public function autores(){
        return $this->belongsTo(autores::class, 'autor_id');
    }

    public function editoriales(){
        return $this->belongsTo(editoriales::class, 'editorial_id');
    }

    public function generos(){
        return $this->belongsTo(generos::class, 'genero_id');
    }


}
