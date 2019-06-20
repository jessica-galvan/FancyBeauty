@extends('master')
@section('css')
  <?php $CSS = ['form', 'perfil'];?>
@endsection
@section('content')
  <div class="register-form">
      <div class="login-text">
          <h2>¡Gracias por registrarte!</h2>
      </div>
      <div class="caja-botones">
          <form class="editar-button-amarillo" action="login" method="post">
              <button type="submit" name="">Iniciar Sesión</button>
          </form>
          <form class="editar-button-rosa" action="index" method="post">
              <button type="submit" name="">Volver al Index</button>
          </form>
      </div>
  </div>
@endsection
