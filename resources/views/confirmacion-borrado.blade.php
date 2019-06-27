@extends('master')
@section('css')
  <?php $CSS = ['lista-productos'];?>
@endsection
@section('content')
    <section class="productos">
        <div class="titulo-seccion">
            <h2>El producto ha sido borrado correctamente</h2>
        </div>
        <a href="lista-productos.php">
            <button class="cancelar-button" type="button" name="">Volver</button>
        </a>
    </section>
@endsection
