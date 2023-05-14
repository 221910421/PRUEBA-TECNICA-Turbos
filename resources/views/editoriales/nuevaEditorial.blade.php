@extends('header')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4">Nueva editorial</h1>
            </div>
        </div>

        <form action="{{ route('nuevaEditorial') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label" for="nombre">Nombre de la editorial*:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de la editorial">
                @error('nombre')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
@endsection
