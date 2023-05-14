@extends('header')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Nuevo libro</h1>
            </div>
        </div>
        <form action="{{ route('guardarLibro') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titulo">Título:*</label>
                <input type="text" class="form-control" id="titulo" name="nombre" placeholder="Título">
                @error('nombre')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="autor">Autor:*</label>
                <select class="form-control" id="autor" name="autor">
                    <option value="">Selecciona un autor</option>
                    @foreach ($autores as $autor)
                        <option value="{{ $autor->id }}">{{ $autor->nombre }}</option>
                    @endforeach
                </select>
                @error('autor')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="editorial">Editorial:*</label>
                <select class="form-control" id="editorial" name="editorial">
                    <option value="">Selecciona una editorial</option>
                    @foreach ($editoriales as $editorial)
                        <option value="{{ $editorial->id }}">{{ $editorial->nombre }}</option>
                    @endforeach
                </select>
                @error('editorial')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="genero">Género:*</label>
                <select class="form-control" id="genero" name="genero">
                    <option value="">Selecciona un género</option>
                    @foreach ($generos as $genero)
                        <option value="{{ $genero->id }}">{{ $genero->nombre }}</option>
                    @endforeach
                </select>
                @error('genero')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="paginas">Stock:*</label>
                <input type="number" class="form-control" id="stock" name="stock" placeholder="Stock">
                @error('stock')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="foto">Foto:* </label>
                <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto" accept="image/x-png,image/gif,image/jpeg">
                @error('foto')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Guardar">
            </div>

        </form>
    </div>
@endsection
