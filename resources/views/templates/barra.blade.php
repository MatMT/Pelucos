<div class="barra">
    <p>Hola {{ $auth->nombre }}</p>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <a href="#" class="boton" onclick="this.closest('form').submit()">Cerrar sesión</a>
    </form>
</div>

@if ($auth->admin)
    <div class="barra-servicios">
        <a href="{{ route('citas') }}" class="boton">Ver Citas</a>
        <a href="{{ route('servicios') }}" class="boton">Ver Servicios</a>
        <a href="{{}}" class="boton">Nuevo Servicio</a>
    </div>
@endif
