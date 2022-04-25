{{-- <h1>Hello {{ $user->name }}</h1> --}}

<p>Haz click en el botón para continuar con la recuperación de contraseña.

    <a href="{{ url('reset_password/' . $token) }}" target="_blank">Recuperar mi contraseña</a>
</p>
