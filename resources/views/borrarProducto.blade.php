@extends('master')
@section('css')
  <?php
    // $errorPrincipal = "";
    $CSS = ['lista-productos'];?>
@endsection
@section('contenido')
    <section class="productos">
        {{-- <span class="error-form">{{$errorPrincipal}}</span> --}}
        <div class="titulo-seccion">
            <h2>¿Realmente queres borrar este producto?</h2>
        </div>

        <article class="producto">
            <div class="p-imagen">
                <img src="img/productos/{{$producto["foto"]}}" alt="{{$producto["nombre"]}}">
            </div>
            <div class="producto-texto">
                <h3>{{$producto["nombre"]}}</h3>
                <p>{{$producto['descripcion']}}</p>
            </div>
            <div class="producto-texto">
                <h4>Estado:</h4><p>{{$producto['estado']}}</p>
                <h4>Categoria:</h4><p>{{$producto['categoria']}}</p>
                <h4>Tipo de Producto:</h4><p>{{$producto['tipoProducto']}}</p>
            </div>
            <div class="producto-boton">
                <h4>Precio:</h4><p>
                <p class="precio">${{$producto["precio"]}}></p>
                <form action="/borrarProducto" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$producto['id']}}">
                    <button class="borrar-button" type="submit" name="" value="">Borrar</button>
                </form>
                <a href="/lista-productos">
                    <button class="cancelar-button" type="button">Volver</button>
                </a>
            </div>
        </article>
    </section>
@endsection
