@extends('master')
@section('css')
  <?php $CSS = ['carrito'];?>
@endsection
@section('content')
    @forelse($carts as $cart)
        <article class="">
          <h4>Número de Carrito: {{$cart[0]->num_carrito}}</h4>
          <p>Fecha de Compra:??? </p>
          <ul>
            @foreach ($cart as $item)
              <li><img src="/storage/productos/{{$item['foto']}}" alt="Foto Producto"></li>
              <li>Nombre: {{$item['nombre']}}</li>
              <li>Precio: ${{$item['precio']}}</li>
              <li>Cantidad: {{$item['cantidad']}}</li>
              <li>Subtotal: {{$item->subtotal()}}</li>
            @endforeach
          </ul>
          <span>Total: ???</span>
        </article>
    @empty
        <p>Todavia no compraste nada</p>
    @endforelse
@endsection
