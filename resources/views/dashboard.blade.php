@extends('header')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="display-4">Bienvenido {{ session('usuario')->nombre_usuario }}</h1>
        </div>
    </div>
</div>
 @endsection
