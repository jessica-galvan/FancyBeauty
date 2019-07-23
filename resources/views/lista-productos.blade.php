@extends('master')
@section('css')
  <?php $CSS = ['lista-productos'];?>
@endsection
@section('content')
    <section class="titulo-seccion">
        <h2>Lista de Productos</h2>
    </section>
    <section class="productos agregar">
        <a href="/nuevo">
            <button class="rosa-button" type="button" style='margin-bottom: 15px;' name="button">Agregar un nuevo producto</button>
        </a>
    </section>
    <section class="productos">
      @foreach ($productos as $producto)
          <article class="producto">
              <div class="p-imagen">
                  <img src="/storage/productos/{{$producto["foto"]}}" alt="{{$producto["nombre"]}}">
              </div>
              <div class="producto-texto">
                  <h3>{{$producto["nombre"]}}</h3>
                  <p>{{$producto['descripcion']}}</p>
              </div>
              <div class="producto-texto">
                  <h4>Estado:</h4><p>{{$producto['estado']['nombre']}}</p>
                  <h4>Categoria:</h4><p>{{$producto->categoria->nombre}}</p>
                  {{-- <h4>Tipo de Producto:</h4><p>{{$producto->tipoproducto->nombre}}></p> --}}
              </div>
              <div class="producto-boton">
                  <h4>Precio:</h4><p>
                  <p class="precio">${{$producto["precio"]}}</p>
                  <a href="/editar/{{$producto['id']}}">
                      <button class="editar-button" type="button" name="button">Editar</button>
                  </a>
                  <a href="/borrar/{{$producto['id']}}">
                      <button class="borrar-button" type="button" name="button">Borrar</button>
                  </a>
              </div>
          </article>
      @endforeach
    </section>

@endsection
