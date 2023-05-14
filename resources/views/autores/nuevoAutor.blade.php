@extends('header')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4">Crear nuevo autor</h1>
            </div>
        </div>

        <form action="{{ route('nuevoAutor') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label" for="nombre">Nombre del autor*:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del autor">
                @error('nombre')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
@endsection
