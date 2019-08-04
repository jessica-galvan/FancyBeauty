@extends('master')
@section('css')
  <?php $CSS = ['carrito'];?>
@endsection
@section('content')
    <h2 id="titulo-carrito">Carrito</h2>
  {{-- COMENTARIOS:
      Faltaria ver como se va a ver el carrito, como se pone cada producto, que botones tiene que tener (modificar la cantidad, sacar del carrito), un boton para ejecutar la compra, donde irian los mensajes, que pasa si no tiene nada en el carrito,--}}

<div class="carrito">
    @forelse($carrito as $item)
      <article class="item">
          <ul>
              <li><img src="/storage/productos/{{$item['foto']}}" alt="Foto Producto"></li>
              <li>Nombre: {{$item['nombre']}}</li>
              <li>Precio: ${{$item['precio']}}</li>
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
                  <button class = "btn-eliminar" type="button" name="{{$item['id']}}">Eliminar</button>
              </li>
          </ul>
      </article>
    @empty
      <div class="carrito-vacio">
          <p>Su carrito esta vacio</p>
      </div>
    @endforelse
</div>


  {{-- <div class="carrito">

  </div> --}}

  @if($total != '')
      <h3 id='total'>Total: {{$total}}</h3>

      <form class="editar-button-amarillo" action="/closecart" method="post">
        @csrf
          <button type="submit" name="button">Comprar</button>
      </form>
  @endif

  <a href="/historial">Ver Historial de Compras</a>
@endsection
