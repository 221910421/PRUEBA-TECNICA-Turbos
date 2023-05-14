@extends('header')
@section('content')
@include('sweetalert::alert')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4">Autores</h1>
            </div>
        </div>
        <div class="row">
            <div class="button">
                <a href='{{ route('nuevoAutor') }}'>Nuevo autor</a>
            </div>
        </div>
        <div class="containerTable">
            @if ( $autores->isEmpty() )
                <h2>No hay autores registrados</h2>
            @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Id autor</th>
                        <th>Nombre</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($autores as $autor)
                        <tr>

                            <td>{{ $autor->id }}</td>

                            <td>{{ $autor->nombre }}</td>

                            <td>
                                <div class="button">
                                    <a href='{{ route('editarAutor', ['id' => $autor->id]) }}'>Editar</a>
                                </div>

                                <div class="button-danger">
                                    <a href='' >Eliminar</a>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>

@endsection
