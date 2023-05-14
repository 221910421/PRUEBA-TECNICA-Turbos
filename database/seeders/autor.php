<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\autores;

class autor extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nombres = [
            'Stephen King',
            'Gabriel García Márquez',
        ];

        foreach($nombres as $nombre){
            autores::create([
                'nombre' => $nombre,
            ]);
        }
    }
}
