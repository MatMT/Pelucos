{{-- Layaout Principal --}}
@extends('app')

@section('titulo')
    Panel de Administración
@endsection

@section('contenido')
    @include('templates.barra')
    <h2>Buscar Citas</h2>

    <div class="busqueda">
        <form action="" class="formulario">
            <div class="campo">
                <label for="fecha">Fecha</label>
                <input type="date" id="fecha" name="fecha" value="{{ $fecha }}" />
            </div>
        </form>
    </div>

    @if ($citas->count() == 0)
        <h2>No Hay Citas para esta Fecha</h2>
    @endif

    <div class="citas-admin">
        <ul class="citas">

            @foreach ($citas as $key => $cita)
                @if ($idCita !== $cita->id)
                    {{ $total = 0 }}
                    <li>
                        <p>ID: <span> {{ $cita->id }}</span></p>
                        <p>Hora: <span> {{ $cita->hora }} </span></p>
                        <p>Cliente: <span> {{ $cita->cliente }} </span></p>
                        <p>Email: <span> {{ $cita->email }} </span></p>
                        <p>Telefono: <span> {{ $cita->telefono }} </span></p>
                        <h3>Servicios</h3>

                        {{ $idCita = $cita->id }}
                @endif
                {{ $total += $cita->precio }}

                <p class="servicio">
                    {{ $cita->servicio }} ${{ $cita->precio }}
                </p>

                {{ $actual = $cita->id }};
                {{ $proximo = $citas[$key + 1]->id ?? 0 }}

                @if (Last($actual, $proximo))
                    <p class="total">Total: <span> <?php echo '$' . $total; ?></span></p>

                    <form action="/api/eliminar" method="POST">
                        <input type="hidden" name="id" value="<?php echo $cita->id; ?>">
                        <input type="submit" class="boton-eliminar" value="Eliminar">
                    </form>
                @endif
            @endforeach // Fin de foreach
        </ul>
    </div>
@endsection

@section('js')
    @vite(['resources/js/buscador.js'])
@endsection
