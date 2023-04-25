<html>
<p>
    <strong>Hola " {{ $nombre }} ".</strong><br>
    Has creado tu cuenta en Pelucos, solo debes confirmarla presionando el siguiente enlace.
</p>
<p>Presion aquí:
    <a href='{{ route('confirmar.store', ['token' => $token]) }}'>
        Confirmar Cuenta
    </a>
</p>
<p>Si tu no solicitaste esta cuenta, puedes ignorar este correo</p>

</html>
