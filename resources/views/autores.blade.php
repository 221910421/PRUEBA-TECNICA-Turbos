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
            <div class="">
            <div class="button">
                <a href='{{ route('nuevoAutor') }}'>Nuevo autor</a>
            </div>
            </div>
            <form action=" {{ route('buscarAutor') }}" method="Post">
                @csrf
                <div class="buscar">
                    <input type="text" id="buscar" placeholder="Buscar autor">
                    <input type="submit" class="btn btn-primary" value="Buscar">
                </div>
            </form>
        </div>
        <div class="containerTable">
            @if ($autores->isEmpty())
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
                                        <a href='{{ route('eliminarAutor', ['id' => $autor->id]) }}'>Eliminar</a>
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
