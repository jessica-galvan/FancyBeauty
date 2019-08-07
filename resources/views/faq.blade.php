@extends('master')
@section('css')
    <?php $CSS = ['faq']; ?>
@endsection
@section('content')
    <div class="faq-body">
        <h1 class="faq-title">Preguntas Frecuentes</h1>
        <div class="ayuda">
            
  @foreach ($listaDePreguntas as $pregunta)
          <section class="cajaDePreguntaMobile">
              <div class="imagenDePreguntas">
                  <img src="/{{$pregunta["imagen"]}}" alt="icono">
              </div>
              <div class="preguntaYRespuesta">
                  <div class="preguntas">
                      <h2>{{$pregunta["pregunta"]}}</h2>
                  </div>
                  <div class="respuestas">
                      <p>{{$pregunta["respuesta"]}}</p>
                  </div>
              </div>
          </section>
           @endforeach
           
             @foreach ($listaDePreguntas as $pregunta)
          <section class="cajaDePreguntaDestopk">
              <div class="imagenDePreguntas">
                  <img src="/{{$pregunta["imagen"]}}" alt="icono">
              </div>
              <div class="preguntaYRespuesta">
                  <div class="preguntas2">
                      <h2>{{$pregunta["pregunta"]}}</h2>
                  </div>
                  <div class="respuestas2">
                      <p>{{$pregunta["respuesta"]}}</p>
                  </div>
              </div>
          </section>
           @endforeach
            
            
            
           
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    
  $('.preguntas').click(function(){
        $(this).next('.respuestas').slideToggle();
        $(this).parent().toggleClass('active');
        $(this).parent().siblings().children('.respuestas').slideUp();
        $(this).parent().siblings().removeClass('active');
    });
  
});
    </script>
    </div>
@endsection
