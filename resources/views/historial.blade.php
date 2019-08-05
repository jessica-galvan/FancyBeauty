@extends('master')
@section('css')
  <?php $CSS = ['carrito'];?>
@endsection
@section('content')
    @forelse($carts as $cart)
        <article class="carrito-container">
          
          <h4 id="titulo-carrito">Número de Compra: {{$cart[0]->num_carrito}}</h4>
          {{-- <p>Fecha de Compra:??? </p> --}}
          <ul class="item">
            @foreach ($cart as $item)
            <div id="lista">
              <li><img class="fotoproducto" src="/storage/productos/{{$item['foto']}}" alt="Foto Producto"></li>
              <li> {{$item['nombre']}}</li>
              <li> ${{$item['precio']}}</li>
              <li>Cantidad: {{$item['cantidad']}}</li>
              <li>Subtotal: {{$item->subtotal()}}</li>
            </div>
            @endforeach
          </ul>
          <span>Total: ???</span>
         
        </article>
    @empty
        <p>No tiene compras realizadas</p>
        <img class="caras-Dechicas" src="/img/icons/sad-girl.png" alt="">
    @endforelse
@endsection
