{{-- Layaout Principal --}}
@extends('app')

@section('titulo')
    Reestablecer Password
@endsection

@section('descrip')
    Coloca tu nuevo password a continuación.
@endsection

@section('contenido')
    {{-- Alertas --}}
    {{-- @include('templates.alertas') --}}

    <div class="alerta {{ $tipo }}">
        {{ $alerta }}
    </div>

    <form class="formulario" method="POST">
        @csrf
        <div class="campo">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Tu Nuevo Password" />
        </div>

        <input type="submit" value="Guardar Nuevo Password" class="boton">
    </form>

    <div class="acciones">
        <a href="{{ route('login') }}">¿Ya tienes cuenta? Iniciar Sesión</a>
        <a href="{{ route('crear_cuenta') }}">¿Aún no tienes una cuenta? Crear una</a>
    </div>
@endsection
