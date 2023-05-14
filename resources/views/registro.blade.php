<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>

<body>
    <h1>Registro</h1>
    @if (session('usuario') === null)
        <script>
            window.location = "{{ route('login') }}";
        </script>
    @endif
    <form action="{{ route('registro') }}" method="POST">
        @csrf
        <label for="nombre_usuario">Nombre de usuario</label>
        <input type="text" name="nombre_usuario" id="nombre_usuario" value="{{ old('nombre_usuario') }}">
        @error('nombre_usuario')
            <small>{{ $message }}</small>
        @enderror
        <br>
        <label for="correo">Correo electrónico</label>
        <input type="email" name="correo" id="email" value="{{ old('correo') }}">
        @error('correo')
            <small>{{ $message }}</small>
        @enderror
        <br>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password">
        @error('password')
            <small>{{ $message }}</small>
        @enderror
        <br>
        <label for="password_confirmation">Confirmar contraseña</label>
        <input type="password" name="password_confirmation" id="password_confirmation">
        @error('password_confirmation')
            <small>{{ $message }}</small>
        @enderror
        <br>
        <input type="submit" value="Registrarse">
    </form>
</body>

</html>
