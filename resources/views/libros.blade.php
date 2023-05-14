@extends('header')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4">Libros</h1>
            </div>
        </div>

        <div class="row">
            <div class="">
                <div class="button">
                    <a href="">Nuevo libro</a>
                </div>
            </div>
            <form action="" method="POST">
                <div class="buscar">
                    <input type="text" id="buscar" placeholder="Buscar libro" name="buscar">
                    <input type="submit" class="btn btn-primary" value="Buscar">
                </div>
            </form>
        </div>


    </div>
@endsection
