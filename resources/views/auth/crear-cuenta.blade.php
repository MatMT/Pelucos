{{-- Layaout Principal --}}
@extends('app')

@section('titulo')
    Crear Cuenta
@endsection

@section('descrip')
    Llena el siguiente formulario con tus datos
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

    <form action="{{ route('crear_cuenta.store') }}" method="POST" class="formulario">
        @csrf

        <div class="campo">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Tu Nombre" value="{{ old('nombre') }}" />
        </div>

        <div class="campo">
            <label for="apellido">Apellido</label>
            <input type="text" id="apellido" name="apellido" placeholder="Tu Apellido" value="{{ old('apellido') }}" />
        </div>

        <div class="campo">
            <label for="telefono">Teléfono</label>
            <input type="tel" id="telefono" name="telefono" placeholder="Tu Teléfono" value="{{ old('telefono') }}" />
        </div>

        <div class="campo">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="Tu E-mail" value="{{ old('email') }}" />
        </div>

        <div class="campo">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Tu Password" />
        </div>

        <input type="submit" value="Crear Cuenta" class="boton" />

    </form>

    <div class="acciones">
        <a href="{{ route('login') }}">¿Ya tienes una cuenta? Inicia Sesión</a>
        <a href="{{ route('olvide') }}">¿Olvidaste tu password?</a>
    </div>

@endsection
