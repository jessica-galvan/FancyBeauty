@extends('master')
@section('css')
  <?php

    $CSS = ['perfil'];?>
@endsection
@section('content')
  <div class="perfil-container">
      <h2>Mi Perfil</h2>

      <div class="fotoPerfil">
          <img src="/storage/user-avatar/{{$usuario['foto']}}" alt="Foto Perfil">
      </div>

      <div class="nombreUsuario">
          <h3 id="nombreUsuario">{{$usuario['name']." ".$usuario['surname']}}</h3>
      </div>

      <div class="datosBasicos">
          <h4>Email: </h4><span>{{$usuario['email']}}</span>
          <h4>Genero: </h4> <span>{{$usuario['genero']}}</span>
          <h4>Edad: </h4> <span>{{$usuario['edad']}}</span>
          <h4>Fecha de Nacimiento: </h4><span>{{$usuario['fechaNacimiento']}}</span>
          <h4>Provincia: </h4><span>{{$usuario['provincia']}}</span>
          <h4>Tipo de Piel: </h4><span>{{$usuario['tipoPiel']}}</span>
          <h4>Tono de Piel: </h4><span>{{$usuario['tonoPiel']}}</span>
      </div>

      <div class="caja-botones">
          <form class="editar-button-violeta " action="/perfil/editar" method="post">
              <button type="submit" name="">Editar Perfil</button>
          </form>
          <form class="editar-button-amarillo" action="/perfil/password" method="post">
              <button type="submit" name="">Cambiar Contraseña</button>
          </form>
          <form class="editar-button-rosa" action="/logout" method="post">
              <button type="submit" name="logout">Cerra sesión</button>
          </form>
      </div>
  </div>
@endsection
