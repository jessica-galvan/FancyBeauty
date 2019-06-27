@extends('master')
@section('css')
  <?php
    /*Data vacia*/
    // $nombre = "";
    // $apellido = "";
    // $email = "";
    // $contrasenia = "";
    // $contraseniaConfirmar = "";
    // $preguntaSeguridad = "";
    // $respuestaSeguridad = "";
    $errorNombre = "";
    $errorApellido = "";
    $errorEmail = "";
    $errorContrasenia = "";
    $errorPregunta = "";
    $errorPrincial = "";
    $CSS = ['index'];
    ?>
@endsection
@section('content')
  <div class="register-form">
      <div class="login-text">
          <h2>Registrate</h2>
      </div>

      <form class="" action="/register" method="post">
        @csrf
          <div class="form">
              <label for="nombre">Nombre</label>
              <input id="nombre" type="text" name="nombre" value="{{old('nombre')}}">
              <span class="error-form"><?=$errorNombre?></span>
          </div>

          <div class="form">
              <label for="apellido">Apellido</label>
              <input id="apellido" type="text" name="apellido" value="{{old('apellido')}}">
              <span class="error-form"><?=$errorApellido?></span>
          </div>

          <div class="form">
              <label for="email">Email</label>
              <input id="email" type="text" name="email" value="{{old('email')}}">
              <span class="error-form"><?=$errorEmail?></span>
          </div>

          <div class="form">
              <label for="password">Contraseña</label>
              <input id="password" type="password" name="contrasenia" value="">
              <span class="error-form"><?=$errorContrasenia?></span>
          </div>

          <div class="form">
              <label for="confirm">Confirmar Contraseña</label>
              <input id="confirm" type="password" name="contraseniaConfirmar" value="">
          </div>

          <div class="form">
              <label for="preguntaSeguridad">Pregunta de Seguridad</label>
              <select name="preguntaSeguridad">
                  @if(({{old('preguntaSeguridad')}} == ""))
                      <option hidden value=""> <i>Seleccionar</i> </option>
                  @endif
                      @foreach($preguntas as $pregunta)
                          @if({{old('preguntaSeguridad')}} == $pregunta['valor']): ?>
                          <option value='{{$pregunta['valor']}}' selected>
                              {{$pregunta['pregunta']}}
                          </option>
                      @else
                          <option value='{{$pregunta['valor']}}'>
                              {{$pregunta['pregunta']}}
                          </option>
                      @endif
                  @endfor
              </select>
              <input type="text" name="respuestaSeguridad" placeholder="Respuesta" value="{{old('respuestaSeguridad')}}">
              <span class="error-form"><?=$errorPregunta?></span>
          </div>

          <span class="error-form"><?=$errorPrincial?></span>
          <div class="login-button">
              <button type="submit" name="registro">ENVIAR</button>
          </div>
      </form>
  </div>
@endsection
