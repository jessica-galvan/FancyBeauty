@extends('master')
@section('css')
  <?php $CSS = ['index', 'producto'];?>
@endsection
@section('content')
    <section class="intro">
        <div class="intro-imagen">
            <img src="/img/fotoinicio.jpeg" alt="Swatches">
        </div>
        <div class="intro-texto">
            <h1>Para todas</h1>
            <p>Fancy Beauty  fue creada para que las mujeres del mundo se sientan incluidas, enfocándonos  en la variedad y cantidad de tonos de piel y creando fórmulas que funcionen de la mejor forma para todos los tipos de pieles. Nuestros productos fueron creados para que te inspires, para que te diviertas, para que crees algo nuevo y diferente. </p>
        </div>
    </section>

    <section class="p-mobile">
        <img src="/img/banners/PUno.png" alt="Publicidad">
    </section>

    <section class="p-desktop">
        <img src="/img/banners/BannerUno.png" alt="Publicidad">
    </section>

    <section class="productos">
        <div class="titulo-seccion">
            <h2>Nuestros productos más populares</h2>
        </div>
        @foreach ($listaProductos as $producto)
            @if($producto['estado_id'] == '1')
            <article class="producto">
                <a style="text-decoration:none;" href="/producto/{{$producto['id']}}">
                    <div class="p-imagen">
                        <img src="/storage/productos/{{$producto["foto"]}}" alt="{{$producto["nombre"]}}">
                    </div>
                    <div class="producto-texto">
                        <h3>{{$producto["nombre"]}}</h3>
                    </div>
                </a>
                <div class="producto-boton">
                    <p class="precio">${{$producto["precio"]}}</p>
                    <form class="form-agregar" action="/addtocart" method="post">
                      @csrf
                        <input type="hidden" name="id" value="{{$producto['id']}}">
                        <button class="comprar" type="submit" name="button">Comprar</button>
                    </form>
                </div>
            </article>
            @endif
        @endforeach

    </section>

    <section class="ofertas-mobile">
        <img class="foto" src="/img/ofertaUno.png" alt="oferta">
    </section>

    <section class="ofertas">
        <img class="foto" src="/img/ofertaUno.png" alt="oferta">
        <img class="foto" src="/img/ofertaDos.png" alt="Oferta">
        <img class="foto" src="/img/ofertaTres.png" alt="Oferta">
        <img class="foto" src="/img/ofertaCuatro.png" alt="Oferta">
    </section>

    <section class="productos">
        <div class="titulo-seccion">
            <h2>Lo más nuevo</h2>
        </div>
        @foreach ($listaProductos as $producto)
            @if($producto['estado_id'] == '2')
                <article class="producto">
                    <a href="/producto/{{$producto['id']}}">
                        <div class="etiqueta-nuevo">
                            <img src="/img/new/NewRosa.png" alt="Nuevo">
                        </div>
                        <div class="p-imagen">
                            <img src="/storage/productos/{{$producto["foto"]}}" alt="{{$producto["nombre"]}}">
                        </div>
                        <div class="producto-texto">
                            <h3>{{$producto["nombre"]}}</h3>
                        </div>
                    </a>
                    <div class="producto-boton">
                        <p class="precio">${{$producto["precio"]}}</p>
                        <form class="form-agregar" action="/addtocart" method="post">
                          @csrf
                            <input type="text" hidden name="id" value="{{$producto['id']}}">
                            <button class="comprar" type="submit" name="button">Comprar</button>
                        </form>
                    </div>
                </article>
            @endif
        @endforeach

    </section>
@endsection
