<html>
<p>
    <strong>Hola " {{ $nombre }} ".</strong><br>
    Has solicitado reestablecer tu password, sigue el siguiente enlace para hacerlo.
</p>
<p>Presion aquí:
    <a href='{{ route('recuperar', ['token' => $token]) }}'>
        Reestablecer Password
    </a>
</p>
<p>Si tu no solicitaste este cambio, puedes ignorar este correo</p>

</html>
