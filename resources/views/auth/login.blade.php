{{-- Layaout Principal --}}
@extends('app')

@section('titulo')
    Login
@endsection

@section('descrip')
    Inicia sesión con tus datos
@endsection

{{-- Contenido de la página --}}
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

    <form action="{{ route('login.store') }}" method="post" class="formulario">
        @csrf

        <div class="campo">
            <label for="email">Email</label>
            <input type="email" id="email" placeholder="Tu Email" name="email" value="{{ old('email') }}" />
        </div>

        <div class="campo">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Tu Password" />
        </div>

        <input type="submit" value="Inciar Sesión" class="boton" />
    </form>

    <div class="acciones">
        <a href="{{ route('crear_cuenta') }}">¿Aún no tienes una cuenta? Crear una</a>
        <a href="{{ route('olvide') }}">¿Olvidaste tu password?</a>
    </div>
@endsection
