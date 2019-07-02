@extends('master')
@section('css')
  <?php $CSS = ['infoProducto'];?>
@endsection
@section('content')
<div class="editar-form">
    <div class="login-text">
        <h2>Editar Producto</h2>
    </div>
    {{-- <span class="error-form">{{$errorPrincipal}}</span> --}}
    <span style="color:blue;" class = "mensajeConfirmar" >{{$mensajePrincipal}}</span>

    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="fotoProducto">
            <img src="/storage/productos/{{$producto["foto"]}}" alt="Foto Producto">
        </div>

        <div class="form-editar">
            <label for="foto">Cambiar foto:</label>
            <input type="file" name="foto" value="">
            <span class="error-form">{{$errors->first('foto')}}</span>
        </div>

        <div class="form-editar">
            <label for="nombre">Nombre</label>
            <input id="nombre" type="text" name="nombre" value="{{$producto['nombre']}}">
            <span class="error-form">{{$errors->first('nombre')}}></span>
        </div>

        <div class="form-editar">
            <label for="nombre">Descripcion</label>
            <textarea name="descripcion" rows="8" cols="80">{{$producto['descripcion']}}</textarea>
            <span class="error-form">{{$errors->first('descripcion')}}</span>
        </div>

        <div class="form-editar">
            <label for="nombre">Precio</label>
            <input id="nombre" step="0.01" type="number" name="precio" value="{{$producto['precio']}}">
            <span class="error-form">{{$errors->first('precio')}}</span>
        </div>

        <section class="form-editar">
            <label for="estado">Estado:</label>
            <div class="check-product">
                @foreach ($estados as $estado)
                    @if ($producto->estado()->id == $estado['id'])
                    <div class="check-box">
                        <input type="radio" name="estado" value="{{$estado['id']}}" checked><span>{{$estado['nombre']}}</span>
                    </div>
                @else
                    <div class="check-box">
                        <input type="radio" name="estado" value="<?=$estado['id']?>"><span><?=$estado['nombre']?></span>
                    </div>
                @endif
            </div>
            <span class="error-form">{{$errors->first('estado')}}</span>
        </section>

        <!-- Categoria -->
        <section class="form-editar">
            <label for="categoria">Categoria:</label>
            <div class="check-product">
                @foreach ($categorias as $categoria)
                    @if ($producto->categoria()->nombre == $categoria['nombre'])
                    <div class="check-box">
                        <input type="radio" name="categoria" value="{{$categoria['id']}}" checked><span>{{$categoria['nombre']}}</span>
                    </div>
                @else
                    <div class="check-box">
                        <input type="radio" name="categoria" value="{{$categoria['id']}}"><span>{{$categoria['nombre']}}</span>
                    </div>
                @endif
            </div>
            <span class="error-form">{{$errors->first('categoria')}}</span>
        </section>

        <section class="form-editar">
            <label for="tipoProducto">Tipo de Producto:</label>
            <select name="tipoProducto">
                @foreach ($tiposProductos as $tipoProducto)
                    @if ($producto->tipoProducto()->id == $tipoProducto['id'])
                        <option value='{{$tipoProducto['id']}}' selected>
                            {{$tipoProducto['nombre']}}
                        </option>
                    @else
                        <option value='{{$tipoProducto['id']}}'>
                            {{$tipoProducto['nombre']}}
                        </option>
                    @endif
            </select>
            <span class="error-form">{{$errors->first('tipoProducto')}}</span>
        </section>

        <div class="login-button">
            <button type="submit" name="">ENVIAR</button>
        </div>
    </form>
    <a href="/lista">
        <button class="return" type="button">Volver</button>
    </a>
</div>
@endsection
