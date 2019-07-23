@extends('master')
@section('css')
    <?php $CSS = ['faq']; ?>
@endsection
@section('content')
    <div class="faq-body">
        <h1 class="faq-title">Preguntas Frecuentes</h1>
        <div class="ayuda">
            @foreach ($listaDePreguntas as $pregunta)
            <section class="cajaDePregunta">
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
        </div>
    </div>
@endsection
