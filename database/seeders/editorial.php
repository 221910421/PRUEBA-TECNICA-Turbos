<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\editoriales;

class editorial extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nombre = [
            'Planeta',
            'Santillana',
        ];

        foreach($nombre as $nombre){
            editoriales::create([
                'nombre' => $nombre,
            ]);
        }
    }
}
