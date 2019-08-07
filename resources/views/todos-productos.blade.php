@extends('master')
@section('css')
  <?php $CSS = ['index', 'producto'];?>
@endsection
@section('content')
  <div class="carrito-container" >
     <section class="productos">
      <div class="titulo-seccion">
          <h2 id="titulo-categoria">Todos los productos</h2>
      </div>
      @foreach ($productos as $producto)
          <article class="producto">
              <a style="text-decoration:none;" href="/producto/{{$producto->id}}">
                  <div class="p-imagen">
                      <img src="/storage/productos/{{$producto->foto}}" alt="{{$producto->nombre}}">
                  </div>
                  <div class="producto-texto">
                      <h3>{{$producto->nombre}}</h3>
                  </div>
              </a>
              <div class="producto-boton">
                  <p class="precio">${{$producto->precio}}</p>
                  <form class="form-agregar" action="/addtocart" method="post">
                    @csrf
                      <input type="text" hidden name="id" value="{{$producto->id}}">
                      <button class="comprar" type="submit" name="button">Comprar</button>
                  </form>
              </div>
          </article>
      @endforeach
  </section>
  <section class='paginar'>
      {{$productos->links()}}
  </section>
  </div>
@endsection
