@extends('master')
@section('css')
  <?php $CSS = ['carrito'];?>
@endsection
@section('content')
  <div class="carrito-container">
      <div class="compraRealizada">
        <p>Tu compra ha sido realizada con éxito. Te hemos mandado un mail a tu correo electrónico con todos los datos para que hagas el seguimiento de tu compra!!</p>
         <img class="caras-Dechicas" src="/img/icons/smiling-girl.png" alt="">
        <br>
        <a class="btn-volver" href="/">Seguir comprando</a>
   </div>
</div>
@endsection
