@extends('header')
@section('content')
    <div class="container">
        <div class="details">
            <h1>{{ $libro->nombre }}</h1>
            <img src="{{ asset('img/libros/' . $libro->foto) }}" alt="{{ $libro->nombre }}">
            @foreach ( $autores as $autor)
                @if ($autor->id == $libro->autor_id)
                    <h2> Autor: {{ $autor->nombre }}</h2>
                @endif
            @endforeach
            @foreach ( $editoriales as $editorial)
                @if ($editorial->id == $libro->editorial_id)
                    <h2> Editorial: {{ $editorial->nombre }}</h2>
                @endif
            @endforeach
            @foreach ( $generos as $genero)
                @if ($genero->id == $libro->genero_id)
                    <h2> Género: {{ $genero->nombre }}</h2>
                @endif
            @endforeach
            <h2> Stock: {{ $libro->stock }}</h2>
            <div class="button">
                <a href="{{ route('editarLibro', $libro->id) }}">Editar</a>
            </div><br>
            <div class="button-danger">
                <a href="{{ route('eliminarLibro', $libro->id) }}">Eliminar</a>
            </div>
            <br>
        </div>
    </div>
@endsection
