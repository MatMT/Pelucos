<div class="barra">
    <p>Hola {{ $auth->nombre }}</p>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <a href="#" class="boton" onclick="this.closest('form').submit()">Cerrar sesión</a>
    </form>
</div>

@if ($auth->admin)
    <div class="barra-servicios">
        <a href="/admin" class="boton">Ver Citas</a>
        <a href="/servicios" class="boton">Ver Servicios</a>
        <a href="/servicios/crear" class="boton">Nuevo Servicio</a>
    </div>
@endif
