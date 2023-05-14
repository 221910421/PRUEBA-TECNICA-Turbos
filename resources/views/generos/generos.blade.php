@extends('header')
@section('content')
@include('sweetalert::alert')
    <div class='container'>
        <div class='row'>
            <div class='col-12'>
                <h1>Géneros</h1>
            </div>
        </div>
        <div class='row'>
            <div class=''>
                <div class='button'>
                    <a href=' {{ route('nuevoGenero') }} ' >Nuevo género</a>
                </div>
            </div>
            <form action=' {{ route('buscarGenero') }} ' method='POST'>
                <div class='buscar'>
                    <input type='text' id='buscar' placeholder='Buscar género' name='buscar'>
                    <input type='submit' class='btn btn-primary' value='Buscar'>
                </div>
            </form>
        </div>
        <div class='container-table'>
            @if ($generos->isEmpty())
                <h2>No hay géneros registrados</h2>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id género</th>
                            <th>Nombre</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($generos as $genero )

                        <tr>
                            <td>{{ $genero->id }}</td>
                            <td>{{ $genero->nombre }}</td>
                            <td>
                                <div class="button">
                                    <a href=' {{ route('editarGenero', $genero->id) }} '>Editar</a>
                                </div>

                                <div class="button-danger">
                                    <a href=' {{ route('eliminarGenero', $genero->id) }} '>Eliminar</a>
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
