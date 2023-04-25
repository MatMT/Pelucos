{{-- Layaout Principal --}}
@extends('app')

@section('titulo')
    Olvide Password
@endsection
@section('descrip')
    Reestablece tu password escribiendo tu email a continuación
@endsection

@section('contenido')
    {{-- Alertas --}}
    {{-- @include('templates.alertas') --}}

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alerta error">
                {{ $error }}
            </div>
        @endforeach
    @endif

    <form action="{{ route('olvide.store') }}" class="formulario" method="POST">
        @csrf

        <div class="campo">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Tu Email" />
        </div>

        <input type="submit" class="boton" value="Enviar Instrucciones">
    </form>

    <div class="acciones">
        <a href="{{ route('login') }}">¿Ya tienes una cuenta? Inicia Sesión</a>
        <a href="{{ route('crear_cuenta') }}">¿Aún no tienes una cuenta? Crear una</a>
    </div>

@endsection
