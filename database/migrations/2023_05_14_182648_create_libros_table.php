<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table -> string('nombre');
            $table -> unsignedBigInteger('autor_id');
            $table -> foreign('autor_id')->references('id')->on('autores');
            $table -> unsignedBigInteger('editorial_id');
            $table -> foreign('editorial_id')->references('id')->on('editoriales');
            $table -> unsignedBigInteger('genero_id');
            $table -> foreign('genero_id')->references('id')->on('generos');
            $table -> integer('stock');
            $table -> string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros');
    }
}
