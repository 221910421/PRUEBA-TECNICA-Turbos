<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this -> call([
            usuario::class,
            autor::class,
            genero::class,
            editorial::class,
            libro::class,
        ]);
    }
}
