@extends('master')
@section('css')
    @php
        // $errorPrincipal = "";
        // $mensajePrincipal = "";
        $CSS = ['editor-productos'];
    @endphp
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

      <form action="/nuevo" method="post" enctype="multipart/form-data">
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
            <textarea name="descripcion" rows="8" cols="80">{{old('descripcion')}}</textarea>
            <span class="error-form">{{$errors->first('descripcion')}}</span>
        </div>

        <div class="form-editar">
            <label for="nombre">Precio</label>
            <input id="nombre" step="0.01" type="number" name="precio" value="{{old('precio')}}">
            <span class="error-form">{{$errors->first('precio')}}</span>
        </div>

        <section class="form-editar">
            <label for="estado">Estado:</label>
            <div class="check-product">
                @foreach($estados as $estado)
                    @if(old('estado_id') == $estado['id'])
                    <div class="check-box">
                        <input type="radio" name="estado_id" value="{{$estado['id']}}" checked><span>{{$estado['nombre']}}</span>
                    </div>
                    @else
                    <div class="check-box">
                        <input type="radio" name="estado_id" value="{{$estado['id']}}"><span>{{$estado['nombre']}}</span>
                    </div>
                    @endif
                @endforeach
            </div>
            <span class="error-form">{{$errors->first('estado_id')}}</span>
        </section>

        <section class="form-editar">
            <label for="categoria">Categoria:</label>
            <div class="check-product">
                @foreach ($categorias as $categoria)
                    @if(old('categoria_id') == $categoria['id'])
                    <div class="check-box">
                        <input type="radio" name="categoria_id" value="{{$categoria['id']}}" checked><span>{{$categoria['nombre']}}</span>
                    </div>
                    @else
                    <div class="check-box">
                        <input type="radio" name="categoria_id" value="{{$categoria['id']}}"><span>{{$categoria['nombre']}}</span>
                    </div>
                    @endif
                @endforeach
            </div>
            <span class="error-form">{{$errors->first('categoria_id')}}</span>
        </section>

        <section class="form-editar">
            <label for="tipoProducto">Tipo de Producto:</label>
            <select name="tipoProducto_id">
                @if(old('tipoProducto_id') == "")
                    <option hidden value=""> <i>Seleccionar</i> </option>
                @endif
                @foreach($tipoProductos as $tipoProducto)
                    @if(old('tipoProducto_id') == $tipoProducto['id'])
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

        <div class="login-button">
            <button type="submit" name="">ENVIAR</button>
        </div>
    </form>
    <a href="/lista">
        <button class="return" type="button">Volver</button>
    </a>
</div>
@endsection
