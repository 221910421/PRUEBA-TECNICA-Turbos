<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Aplicación biblioteca</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    <header>
        <div class="logo">
            <a href="{{ route('dashboard') }}">
                Aplicación biblioteca
            </a>
        </div>
        <nav class="menu">
            <ul class="menu-list">
                <li class="menu-item"> <a href="{{ route('dashboard') }}">Inicio</a> </li>
                <li class="menu-item"> <a href="{{ route('libros') }}">Libros</a> </li>
                <li class="menu-item"> <a href="{{ route('autores') }}">Autores</a> </li>
                <li class="menu-item"> <a href="{{ route('editoriales') }}">Editoriales</a> </li>
                <div class="dropdown">
                    <li class="menu-item"> <a>{{ session('usuario')->nombre_usuario }}</a> </li>
                    <div class="dropdown-content">
                        <a href="{{ route('login') }}">Cerrar sesión</a>
                    </div>
            </ul>
        </nav>
    </header>
    @yield('content')

</body>

</html>
