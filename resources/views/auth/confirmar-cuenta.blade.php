{{-- Layaout Principal --}}
@extends('app')

@section('titulo')
    Confirmar Cuenta
@endsection

@section('contenido')
    {{-- Alertas --}}
    {{-- @include('templates.alertas') --}}

    <div class="alerta {{ $tipo }}">
        {{ $alerta }}
    </div>

    <div class="acciones">
        <a href="{{ route('login') }}">Inciar sesión</a>
    </div>
@endsection
