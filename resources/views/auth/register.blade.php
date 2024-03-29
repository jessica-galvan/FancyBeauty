@extends('master')
@section('css')
  <?php $CSS = ['form']; ?>
@endsection
@section('content')
  <div class="register-form">
      <div class="login-text">
          <h2>Registrate</h2>
      </div>

      <form id='registro' action="/register" method="post">
        @csrf
          <div class="form">
              <label for="name">Nombre</label>
              <input id="name" type="text" name="name" value="{{old('name')}}">
              <span id='error-name' class="error-form">{{$errors->first('name')}}</span>
          </div>

          <div class="form">
              <label for="surname">Apellido</label>
              <input id="surname" type="text" name="surname" value="{{old('surname')}}">
              <span id='error-surname'class="error-form">{{$errors->first('surname')}}</span>
          </div>

          <div class="form">
              <label for="email">Email</label>
              <input id="email" type="text" name="email" value="{{old('email')}}">
              <span id='error-email' class="error-form">{{$errors->first('email')}}</span>
          </div>

          <div class="form">
              <label for="password">Contraseña</label>
              <input id="password" type="password" name="password" value="">
              <span id='error-password' class="error-form">{{$errors->first('password')}}</span>
          </div>

          <div class="form">
              <label for="password-confirm">Confirmar Contraseña</label>
              <input id="password-confirm" type="password" name="password_confirmation" value="">
          </div>

          @if(isset($errorPrincipal))
              <span class="error-form"><?=$errorPrincial?></span>
          @endif
          <div class="login-button">
              <button type="submit" name="registro">ENVIAR</button>
          </div>
      </form>
  </div>
@endsection
