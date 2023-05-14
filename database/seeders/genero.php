<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\generos;

class genero extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nombres = [
            'Terror',
            'Realismo mágico',
        ];

        foreach($nombres as $nombre){
            generos::create([
                'nombre' => $nombre,
            ]);
        }
    }
}
