@extends('master')
@section('css')
  <?php $CSS = ['carrito'];?>
@endsection
@section('content')
    <article class="carrito-container">
    @forelse($carts as $cart)
            <h4 id="titulo-carrito">Número de Orden Compra: {{$cart[0]->getOrderNoAttribute()}}</h4>
            <ul class="item">
                @foreach ($cart as $item)
                    @if($item['nombre'] != '')
                        <div id="lista">
                            <li><img class="fotoproducto" src="/storage/productos/{{$item['foto']}}" alt="Foto Producto"></li>
                            <li class='nombre-del-producto'> {{$item['nombre']}}</li>
                            <li> ${{$item['precio']}}</li>
                            <li>Cantidad: {{$item['cantidad']}}</li>
                            <li>Subtotal: ${{$item['subtotal']}}</li>
                        </div>
                    @endif
                @endforeach
                <li><h3 id='total'>Total: ${{$cart['total']}}</h3></li>
            </ul>
    @empty
        {{-- <div class="carrito-container"> --}}
            <div class="historial-container">
                <h2>Historia de Compras</h2>
                <p>No tiene compras realizadas</p>
                <img class="caras-Dechicas" src="/img/icons/sad-girl.png" alt="Sad Face">
                <a class="btn-volver" href="/catalogo">
                    Comprar Productos
                </a>
            </div>
        {{-- </div> --}}
    @endforelse
    @if($carts)
        <a class="btn-volver" href="/catalogo">
            Seguir comprando
        </a>
    @endif
    </article>
@endsection
