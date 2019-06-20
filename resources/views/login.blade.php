@extends('master')
@section('css')
    <?php
      $email = "";
      $contrasenia = "";
      $recordar = "";
      $errorEmail = "";
      $errorContrasenia = "";

      $CSS = ['form'];
     ?>
@endsection
@section('content')
    <div class="form-container">
        <div class="login-text">
            <h2>Ingresá a tu cuenta</h2>
        </div>

        <form class="login-form" action="login" method="post">
            <div class="form">
                <input type="text" id="email" name="email" value="{{$email}}" placeholder="Email">
                <span class="error-form">{{$errorEmail}}</span>
            </div>
            <div class="form">
                <input type="password" id="contrasenia" name="contrasenia" value="" placeholder="Contraseña">
                <span class="error-form">{{$errorContrasenia}}</span>
            </div>
            <div class="remember">
                <label for="recordar">Recordarme</label>
                <input id="recordar" type="checkbox" name="recordar" value="si" {{$recordar}}>
            </div>
            <div class="login-button">
                <button type="submit" name="login">Ingresar</button>
            </div>
        </form>

        <div class="form-links">
            <a href="recupero">¿Olvidó su contraseña?</a>
        </div>
    </div>

    <div class="register-container">
        <div class="login-text">
            <h2>¿No tenés una cuenta?</h2>
            <p>Completa este formulario y crea tu cuenta para obtener varios beneficios.</p>
        </div>
        <form class="login-button" action="register" method="post">
            <button type="submit" name="">Registrarse</button>
        </form>
    </div>
@endsection
