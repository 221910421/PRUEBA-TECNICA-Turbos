@extends('header')
@section('content')
    @include('sweetalert::alert')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4">Editoriales</h1>
            </div>
        </div>
        <div class="row">
            <div class="">
                <div class="button">
                    <a href=' {{ route('nuevaEditorial') }}'>Nueva editorial</a>
                </div>
            </div>
            <form action="{{ route('buscarEditorial') }}" method="POST">
                @csrf
                <div class="buscar">
                    <input type="text" id="buscar" placeholder="Buscar editorial" name="buscar">
                    <input type="submit" class="btn btn-primary" value="Buscar">
                </div>
            </form>
        </div>

        <div class="containerTable">
            @if ($editoriales->isEmpty())
                <h2>No hay editoriales registradas</h2>
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
                        @foreach ($editoriales as $editorial)
                            <tr>

                                <td>{{ $editorial->id }}</td>

                                <td>{{ $editorial->nombre }}</td>

                                <td>
                                    <div class="button">
                                        <a href=' {{ route('editarEditorial', ['id' => $editorial->id]) }}'>Editar</a>
                                    </div>

                                    <div class="button-danger">
                                        <a href=' {{ route('eliminarEditorial', ['id' => $editorial->id]) }}'>Eliminar</a>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    @endsection
