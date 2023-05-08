{{-- Layaout Principal --}}
@extends('app')

@section('titulo')
    Crear Nueva Cita
@endsection
@section('descrip')
    Elige tus servicios y coloca tus datos
@endsection

@section('contenido')
    @include('templates.barra')

    <div id="app">
        @if (!$auth->admin)
            <nav class="tabs">
                <!-- Atributo personalizado -->
                <button type="button" data-paso="1" class="actual">Servicios</button>
                <button type="button" data-paso="2">Información Cita</button>
                <button type="button" data-paso="3">Resumen</button>
            </nav>

            <div id="paso-1" class="seccion">
                <h2>Servicios</h2>
                <p class="text-center">Elige tus servicios a continuación</p>
                <div id="servicios" class="listado-servicios">

                </div>
            </div>
            <div id="paso-2" class="seccion">
                <h2>Tus datos y cita</h2>
                <p class="text-center">Coloca tus datos y fecha de tu cita</p>
                <form class="formulario">
                    <div class="campo">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" placeholder="Tu Nombre" name="nombre"
                            value="{{ $auth->nombre }}" disabled>
                    </div>
                    <div class="campo">
                        <label for="fecha">Fecha</label>
                        <input type="date" id="fecha" name="fecha" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">
                    </div>
                    <div class="campo">
                        <label for="hora">Hora</label>
                        <input type="time" id="hora" name="hora">
                    </div>
                    <input type="hidden" id="id" value="{{ $auth->id }}">
                </form>
            </div>
            <div id="paso-3" class="seccion contenido-resumen">
                <h2>Resumen</h2>
                <p class="text-center">Verifica que la información sea correcta</p>
            </div>

            <div class="paginacion">
                <button id="anterior" class="boton">
                    &laquo; Anterior
                </button>
                <button id="siguiente" class="boton">
                    Siguiente &raquo;
                </button>
            </div>
    </div>
    @endif
@endsection

@section('js')
    <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    @vite(['resources/js/app.js'])
@endsection
