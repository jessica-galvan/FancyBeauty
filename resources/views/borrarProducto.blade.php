@extends('master')
@section('css')
  <?php $CSS = ['lista-productos'];?>
@endsection
@section('content')
    <section class="productos">
        {{-- <span class="error-form">{{$error}}</span> --}}
        <div class="titulo-seccion">
            <h2>¿Realmente queres borrar este producto?</h2>
        </div>

        <article class="producto">
            <div class="p-imagen">
                <img src="/storage/productos/{{$producto["foto"]}}" alt="Foto Producto">
            </div>
            <div class="producto-texto">
                <h3>{{$producto["nombre"]}}</h3>
                <p>{{$producto['descripcion']}}</p>
            </div>
            <div class="producto-texto">
                <h4>Estado:</h4><p>{{$producto['estado']['nombre']}}</p>
                <h4>Categoria:</h4><p>{{$producto['categoria']['nombre']}}</p>
                <h4>Tipo de Producto:</h4><p>{{$producto['tipoProducto']['nombre']}}</p>
            </div>
            <div class="producto-boton">
                <h4>Precio:</h4><p>
                <p class="precio">${{$producto["precio"]}}</p>
                <form action="/borrar" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$producto['id']}}">
                    <button class="borrar-button" type="submit" name="" value="">Borrar</button>
                </form>
                <a href="/lista">
                    <button class="cancelar-button" type="button">Volver</button>
                </a>
            </div>
        </article>
    </section>
@endsection
