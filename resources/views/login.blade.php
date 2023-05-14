<!Doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inicio de sesión</title>
</head>

<body>
    <h1>Inicio de sesión</h1>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <label for="email">Nombre de usuario</label><br>
        <input type="text" name="nombre_usuario" id="nombre_usuario" value="{{ old('nombre_usuario') }}"><br>
        @error('nombre_usuario')
            <small>{{ $message }}</small><br>
        @enderror
        <label for="password">Contraseña</label><br>
        <input type="password" name="password" id="password"><br>
        @error('password')
            <small>{{ $message }}</small><br>
        @enderror

        <small>{{ $error ?? '' }}</small><br>

        <input type="submit" value="Iniciar sesión">
    </form>
</body>

@if ( session('usuario'))
    <script>
        window.location = "{{ route('dashboard') }}";
    </script>
@endif

</html>
