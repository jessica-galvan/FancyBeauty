@extends('master')
@section('css')
  <?php
    $CSS = ['index', 'producto'];
    $descripcion = [
      'Rostro' => 'Chamuyo rostro',
      'Accesorios' => 'Chamuyo 2',
    ]

  ?>

@endsection
@section('content')
  <section class="productos">
      <div class="titulo-seccion">
          <h2>{{$categoria['nombre']}}</h2>
          <p>{{$categoria['descripcion']}}</p>
      </div>
      @foreach ($productos as $producto)
          @if($producto['estado_id'] == '1')
          <article class="producto">
              <a style="text-decoration:none;" href="producto/{{$producto['id']}}">
                  <div class="p-imagen">
                      <img src="/storage/productos/{{$producto["foto"]}}" alt="{{$producto["nombre"]}}">
                  </div>
                  <div class="producto-texto">
                      <h3>{{$producto["nombre"]}}</h3>
                  </div>
              </a>
              <div class="producto-boton">
                  <p class="precio">${{$producto["precio"]}}</p>
                  <form class="" action="/addtocart" method="post">
                    @csrf
                      <input type="text" hidden name="id" value="{{$producto['id']}}">
                      <button class="comprar" type="submit" name="button">Comprar</button>
                  </form>
              </div>
          </article>
          @endif
      @endforeach

      {{$productos->links()}}
  </section>
@endsection
