@extends('master')
@section('css')
  <?php $CSS = ['perfil'];?>
@endsection
@section('content')
  <div class="perfil-container">
      <h2>Mi Perfil</h2>
      @if(isset($mensajePrincipal))
          <span style="color:blue;" class = "mensajeConfirmar">{{$mensajePrincipal}}</span>
      @endif
      <div class="fotoPerfil">
          <img src="/storage/user-avatar/{{$usuario['foto']}}" alt="Foto Perfil">
      </div>

      <div class="nombreUsuario">
          <h3 id="nombreUsuario">{{$usuario['name']." ".$usuario['surname']}}</h3>
      </div>

      <div class="datosBasicos">
          <h4>Email: </h4><span>{{$usuario['email']}}</span>
          <h4>Genero: </h4><span>{{$usuario['generoDato']}}</span>
          <h4>Edad: </h4><span>{{$usuario['edad']}}</span>
          <h4>Fecha de Nacimiento: </h4><span>{{$usuario['fechaNacimiento']}}</span>
          <h4>Provincia: </h4><span>{{$usuario['provinciaDato']}}</span>
          <h4>Tipo de Piel: </h4><span>{{$usuario['tipoPielDato']}}</span>
          <h4>Tono de Piel: </h4><span>{{$usuario['tonoPielDato']}}</span>
      </div>

      <div class="caja-botones">
          <div class="editar-button-violeta">
              <a href="/perfil/editar">
                  <button type="button" name="">Editar Perfil</button>
              </a>
          </div>
          {{-- <div class="editar-button-amarillo">
              <a href="/perfil/password">
                  <button type="button" name="">Cambiar Contraseña</button>
              </a>
          </div> --}}
          <div class="editar-button-rosa">
              {{-- <a href="/perfil/logout">
                  <button type="button" name="">Cerrar Sesión</button>
              </a> --}}
              <form id="logout-form" action="{{ route('logout') }}" method="POST">
                  @csrf
                <button type="submit" name="button">Cerrar sesión</button>
              </form>
          </div>
      </div>
  </div>
@endsection
