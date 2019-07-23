@extends('master')
@section('css')
  <?php $CSS = ['carrito'];?>
@endsection
@section('content')
    <h2 id="titulo-carrito">Carrito</h2>
  {{-- COMENTARIOS:
      Faltaria ver como se va a ver el carrito, como se pone cada producto, que botones tiene que tener (modificar la cantidad, sacar del carrito), un boton para ejecutar la compra, donde irian los mensajes, que pasa si no tiene nada en el carrito,--}}
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
                    <input type="text" hidden name="" value="">
                    <input type="text" hidden name="producto_id" value="{{$item['id']}}">
                    {{-- Estaria genial que cuando sepamos javascript, en vez de tener que darle a un boton, que nos lleve a otra pagina y luego nos vuelva a traer, para que se cambie en la base de datos, que con darle a los numeros y a un tilde o algo, se haga la modificacion. Ni idea de si se puede. Actualmente estos botones estan de decoracion, no funcionan--}}
                </form>
            </li>
            <li>Sub-total:  {{$item['cantidad']*$item['precio']}}</li>
            <li><a href="/eliminar/{{$item['id']}}">Eliminar</a></li>
        </ul>
    </article>
  @empty
      <p>Su carrito esta vacio</p>
  @endforelse

  @if($total != '')
      <h3>Total: {{$total}}</h3>

      <form class="editar-button-amarillo" action="/closecart" method="post">
        @csrf
          <button type="submit" name="button">Comprar</button>
      </form>
  @endif

  <a href="/historial">Ver Historial de Compras</a>
@endsection
