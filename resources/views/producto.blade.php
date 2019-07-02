@extends('master')
@section('css')
  <?php $CSS = ['infoProducto'];?>
@endsection
@section('content')
      <div class="caja-producto">
          <div class="fotoProducto">
              <img src="/storage/productos/{{$producto['foto']}}" alt="Foto Producto">
          </div>

          <div class="textoProducto">
              {{-- @if ($producto['estado_id'] == '2')
                  <!-- <img class="etiqueta-nuevo" src="img/new/NewRosa.png" alt="Nuevo"> -->
              @endif --}}
              <div class="nombreProducto">
                  <h2>{{$producto['nombre']}}</h2>
              </div>
              <div class="infoProducto">
                  <p>{{$producto['descripcion']}}</p>
              </div>
              <form class="formulario-cantidad" action="" method="post">
                  <div class="cantidad">
                      <i class='less'>-</i>
                      <input id="cantidad" type="int" name="cantidad" value="">
                      <i class='more'>+</i>
                  </div>
                  <div class="precio">
                      <p>${{$producto['precio']}}</p>
                  </div>
                  <button class="agregar" type="submit" name="button">Agregar a carrito</button>
              </form>
              <a class="link-button" href="/">
                  <button class="return" type="button">Volver</button>
              </a>
          </div>
@endsection
