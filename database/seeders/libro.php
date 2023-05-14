<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\libros;

class libro extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        libros::create([
            'nombre' => 'El juego de Gerald',
            'autor_id' => 1,
            'genero_id' => 1,
            'editorial_id' => 1,
            'stock' => 10,
            'foto' => '1684104083-El juego de Gerald.jpg'
        ]);


        libros::create([
            'nombre' => 'Cien años de soledad',
            'autor_id' => 2,
            'genero_id' => 2,
            'editorial_id' => 2,
            'stock' => 10,
            'foto' => '1684105635-Cien años de soledad.jpg'
        ]);
    }
}
