<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\usuarios;
use Illuminate\Support\Facades\Crypt;

class usuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        usuarios::create([
            'nombre_usuario' => 'admin',
            'contrasena' => Crypt::encrypt('admin'),
            'correo' => 'admin@mail.com',
        ]);
    }
}
