@extends('master')
@section('css')
  <?php $CSS = ['form'];?>
@endsection
@section('content')
    <div class="register-form">
        <div class="login-text">
            <h2>Cambiar Contraseña</h2>
        </div>
        @php
            var_dump($errors);
        @endphp
        @if(isset($errorPrincipal))
            <span class="error-form">{{$errorPrincipal}}</span>
        @endif
        <form class="cambiarContraseña" action="/perfil/password" method="post">
            @csrf
            <div class="form">
                <label for="oldPassword">Contraseña Original:</label>
                <input class="cambiarContrasenia" id="oldPassword" type="password" name="currentPassword" value="">
                @if(isset($errorContrasenia))
                    <span class="error-form">{{$errorContrasenia}}</span>
                @endif
            </div>

            <div class="form">
                <label for="newPassword">Contraseña Nueva</label>
                <input class="cambiarContrasenia" id="newPassword" type="password" name="password" value="">
                <span class="error-form">{{$errors->first('password')}}</span>
            </div>

            <div class="form">
                <label for="password-confirm">Confirmar Contraseña</label>
                <input class="cambiarContrasenia" id="password-confirm" type="password" name="password_confirmation" value="">
            </div>

            <div class="login-button">
                <button type="submit" name="cambiar">ENVIAR</button>
            </div>
        </form>
    </div>
@endsection
