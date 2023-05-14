@extends('header')
@section('content')
    @include('sweetalert::alert')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4">Libros</h1>
            </div>
        </div>

        <div class="row">
            <div class="">
                <div class="button">
                    <a href="{{ route('nuevoLibro') }}">Nuevo libro</a>
                </div>
            </div>
            <form action="{{ route('buscarLibro') }}" method="POST">
                @csrf
                <div class="buscar">
                    <input type="text" id="buscar" placeholder="Buscar libro" name="buscar">
                    <input type="submit" class="btn btn-primary" value="Buscar">
                </div>
            </form>
        </div>

        <div class="container-cards">
        @foreach ($libros as $libro)
            <div class="card">
                <img class="card-img" src="{{ asset('img/libros/' . $libro->foto) }}" alt="{{ $libro->titulo }}">
                <a href="{{ route('verLibro', $libro->id) }}"><h2 class="card-title">{{ $libro->nombre }}</h2></a>
                @foreach ( $autores as $autor)
                    @if ($autor->id == $libro->autor_id)
                        <p class="card-text">{{ $autor->nombre }}</p>
                    @endif
                @endforeach
            </div>
        @endforeach
        </div>

        </div>
    @endsection
