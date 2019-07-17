@extends('master')
@section('css')
    <?php $CSS = ['form'];?>
@endsection
@section('content')
    <div class="form-container">
        <div class="login-text">
            <h2>Ingresá a tu cuenta</h2>
        </div>

        <form class="login-form" action="login" method="post">
            @csrf
            <div class="form">
                <input type="text" id="email" name="email" value="{{old('email')}}" placeholder="Email">
                <span class="error-form">{{$errors->first('email')}}</span>
            </div>
            <div class="form">
                <input type="password" id="contrasenia" name="password" value="" placeholder="Contraseña">
                <span class="error-form">{{$errors->first('password')}}</span>
            </div>
            <div class="remember">
                <input id="recordar" type="checkbox" name="remember" value="" {{ old('remember') ? 'checked' : '' }}>
                <label for="recordar">Recordarme</label>
            </div>
            <div class="login-button">
                <button type="submit" name="login">Ingresar</button>
            </div>
        </form>

        <div class="form-links">
            <a href="/recupero">¿Olvidó su contraseña?</a>
        </div>
    </div>

    <div class="register-container">
        <div class="login-text">
            <h2>¿No tenés una cuenta?</h2>
            <p>Completa este formulario y crea tu cuenta para obtener varios beneficios.</p>
        </div>
        <a class='login-button' href="/register">
          <button type="button" name="">Registrarse</button>
        </a>
    </div>
@endsection
