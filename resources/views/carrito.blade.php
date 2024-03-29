@extends('master')
@section('css')
  <?php $CSS = ['carrito'];?>
@endsection
@section('content')
<div class="carrito-container">
    <h2 id="titulo-carrito">Mi Carrito</h2>
    <div class="carrito">
        @forelse($carrito as $item)
          <article class="item">
              <ul id="lista" >
                  <li class="nombre-del-producto">{{$item['nombre']}}</li>
                  <li ><img class="fotoproducto" src="/storage/productos/{{$item['foto']}}" alt="Foto Producto"></li>
                  <li> ${{$item['precio']}}</li>
                  <li>
                      <!--Cantidad-->
                      <form class="formulario-cantidad" action="" method="post">
                        @csrf
                          <div class="cantidad">
                              <i class='less'>-</i>
                              <input id="cantidad" type="int" name="cantidad" value="{{$item['cantidad']}}">
                              <i class='more'>+</i>
                          </div>
                          <input type="text" hidden name="producto_id" value="{{$item['producto_id']}}">
                          <input type="text" hidden name="carrito_id" value="{{$item['id']}}">
                      </form>
                  </li>
                  <li>Sub-total:  {{$item['cantidad']*$item['precio']}}</li>
                  <li>
                      <button class ="btn-eliminar" type="button" name="{{$item['id']}}">Eliminar</button>
                  </li>
              </ul>
          </article>
        @empty
          <div class="carrito-vacio">
               <p>Su carrito esta vacío</p>
            <img class="caras-Dechicas" src="/img/icons/sad-girl.png" alt="">
          </div>
        @endforelse
    </div>

      @if($total != '')
          <div class="totalYcomprar" >
              <h3 id='total'>Total: ${{$total}}</h3>
              <form class="" action="/closecart" method="post">
                @csrf
                  <button class = "btn-comprar" type="submit" name="button">Comprar</button>
              </form>
          </div>
      @endif
    <div class="historial-caja">
        <a class="btn-historial" href="/historial">Ver Historial de Compras</a>
    </div>
  </div>
@endsection
