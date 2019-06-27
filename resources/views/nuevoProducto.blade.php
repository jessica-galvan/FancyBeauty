@extends('master')
@section('css')
  <?php
    // $nombre = "";
    // $precio = "";
    // $descripcion = "";
    // $categoria = "";
    // $estado = "";
    // $tipoProducto = "";
    // $errorNombre = "";
    // $errorDescripcion = "";
    // $errorPrecio = "";
    // $errorFoto = "";
    // $errorEstado = "";
    // $errorTipoProducto = "";
    // $errorCategoria = "";
    $errorPrincipal = "";
    $mensajePrincipal = "";

    $CSS = ['editor-productos'];?>
@endsection
@section('content')
<div class="editar-form">
      <div class="login-text">
          <h2>Nuevo Producto</h2>
      </div>
      {{-- <span class="error-form">{{$errorPrincipal}}</span> --}}
      @if(isset($mensajePrincipal))
        <span style="color:blue;" class = "mensajeConfirmar">{{$mensajePrincipal}}</span>
      @endif

      <form action="nuevoProducto.php" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-editar">
              <label for="foto">Foto Producto:</label>
              <input type="file" name="foto" value="">
              <span class="error-form">{{$errors->first('foto')}}</span>
          </div>


        <div class="form-editar">
            <label for="nombre">Nombre</label>
            <input id="nombre" type="text" name="nombre" value="{{old('nombre')}}">
            <span class="error-form">{{$errors->first('nombre')}}</span>
        </div>

        <div class="form-editar">
            <label for="nombre">Descripcion</label>
            <textarea name="descripcion" rows="8" cols="80">{{old('descripcion')}}></textarea>
            <span class="error-form">{{$errors->first('descripcion')}}</span>
        </div>

        <div class="form-editar">
            <label for="nombre">Precio</label>
            <input id="nombre" step="0.01" type="number" name="precio" value="{{old('precio')}}">
            <span class="error-form">{{$errors->first('precio')}}</span>
        </div>

        {{-- Estado --}}
        <section class="form-editar">
            <label for="estado">Estado:</label>
            <div class="check-product">
                @foreach($listaEstados as $estados)
                    @if({{old('estado_id')}} == $estados['id'])
                    <div class="check-box">
                        <input type="radio" name="estado_id" value="<?=$estados['id']?>" checked><span><?=$estados['nombre']?></span>
                    </div>
                @else:
                    <div class="check-box">
                        <input type="radio" name="estado_id" value="<?=$estados['id']?>"><span><?=$estados['nombre']?></span>
                    </div>
                @endif
            </div>
            <span class="error-form">{{$errors->first('estado_id')}}</span>
        </section>

        {{-- Categoria --}}
        <section class="form-editar">
            <label for="categoria">Categoria:</label>
            <div class="check-product">
                @foreach ($categorias as $opcion)
                    @if ({{old('categoria_id')}} == $opcion['id'])
                    <div class="check-box">
                        <input type="radio" name="categoria_id" value="<?=$opcion['id']?>" checked><span><?=$opcion['nombre']?></span>
                    </div>
                    @else
                    <div class="check-box">
                        <input type="radio" name="categoria_id" value="<?=$opcion['id']?>"><span><?=$opcion['nombre']?></span>
                    </div>
                    @endif
                @endforeach
            </div>
            <span class="error-form">{{$errors->first('categoria_id')}}</span>
        </section>

        {{-- Tipo de producto --}}
        <section class="form-editar">
            <label for="tipoProducto">Tipo de Producto:</label>
            <select name="tipoProducto_id">
                @if({{old('tipoProducto_id')}}  == "")
                    <option hidden value=""> <i>Seleccionar</i> </option>
                @endif
                @foreach($listaTiposProductos as $tipoProducto)
                    @if({{old('tipoProducto_id')}} == $tipoProducto['id'])
                        <option value='{{$tipoProducto['id']}}' selected>
                            {{$tipoProducto['nombre']}}
                        </option>
                    @else
                        <option value='{{$tipoProducto['id']}}'>
                            {{$tipoProducto['nombre']}}
                        </option>
                    @endif
                @endforeach
            </select>
            <span class="error-form">{{$errors->first('tipoProducto_id')}}</span>
        </section>

        <div class="/login-button">
            <button type="submit" name="crearProducto">ENVIAR</button>
        </div>
    </form>
    <a href="/lista-productos">
        <button class="return" type="button">Volver</button>
    </a>
</div>
@endsection
