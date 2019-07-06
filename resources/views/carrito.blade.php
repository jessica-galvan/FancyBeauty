@extends('master')
@section('css')
  <?php $CSS = ['index'];?>
@endsection
@section('content')
  {{-- COMENTARIOS:
      Faltaria ver como se va a ver el carrito, como se pone cada producto, que botones tiene que tener (modificar la cantidad, sacar del carrito), un boton para ejecutar la compra, donde irian los mensajes, que pasa si no tiene nada en el carrito,--}}
  @foreach($carrito as $item)
    <article class="">
        <li> <img src="/storage/productos/{{$item['foto']}}" alt="Foto Producto"></li>
        <li>Nombre: {{$item['nombre']}}</li>
        <li>Precio: ${{$item['precio']}}</li>
        <li>Cantidad: {{$item['cantidad']}}</li>
    </article>
  @endforeach

@endsection
