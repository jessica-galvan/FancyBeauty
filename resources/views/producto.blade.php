@extends('master')
@section('css')
  <?php $CSS = ['infoProducto'];?>
@endsection
@section('content')
      @if(\Session::has('mensaje'))
        <div class="">
          <span>{{\Session::get('mensaje')}}</span>
        </div>
      @endif
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
              <div class="precio">
                  <p>${{$producto['precio']}}</p>
              </div>
              <form class="formulario-cantidad" action="/addtocart" method="post">
                @csrf
                  <div class="cantidad">
                      <i class='less'>-</i>
                      <input id="cantidad" type="int" name="cantidad" value="1">
                      <i class='more'>+</i>
                  </div>
                  <input type="text" hidden name="producto_id" value="{{$producto['id']}}">
                  <button class="agregar" type="submit" name="button">Agregar a carrito</button>
              </form>
              <a class="link-button" href="/">
                  <button class="return" type="button">Volver</button>
              </a>
          </div>
@endsection
