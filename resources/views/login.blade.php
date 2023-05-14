<!Doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class=login-container>
    <h1>Inicio de sesión</h1>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-group">
        <label class="form-label" for="email">Nombre de usuario:</label>
        <input type="text" class="form-control" name="nombre_usuario" id="nombre_usuario" value="{{ old('nombre_usuario') }}">
        @error('nombre_usuario')
            <small class="error">{{ $message }}</small>
        @enderror
        <label class="form-label" for="password">Contraseña:</label>
        <input type="password" class="form-control" name="password" id="password">
        @error('password')
            <small class="error">{{ $message }}</small>
        @enderror

        <small class="error">{{ $error ?? '' }}</small>

        <input type="submit" value="Iniciar sesión" class="btn btn-primary">
        </div>
    </form>
    </div>
</body>

@if ( session('usuario'))
    <script>
        window.location = "{{ route('index') }}";
    </script>
@endif

</html>
