<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller{

    public function __construct(){
        //$this->middleware('auth');
    }


    public function index(){
        return redirect('/');
    }

	public function faq(){

		$listaDePreguntas = [
          [
            "pregunta" => "¿Dónde puedo encontrar sus productos?",
            "respuesta" => "Actualmente nuestros productos se consiguen solo de forma online en nuestra página oficial.",
            "imagen" => "img/faqs/lugar.png",
          ],
          [
            "pregunta" => "¿Su marca testea en animales?",
            "respuesta" => "No, estamos orgullosos de decir que desde el inicio nunca testeamos ninguno de nuestros productos en animales.",
             "imagen" => "img/faqs/conejo.png",
          ],
          [
            "pregunta" => "¿Sus productos son libres de gluten?",
            "respuesta" => "Sí, es importante para nosotros cuidar de la salud de nuestras clientas y sabemos que muchas tienen alergias relacionadas a este por lo que todos nuestros productos son libres de gluten.",
            "imagen" => "img/faqs/trigo.png",
          ],
          [
            "pregunta" => "¿Hacen envíos internacionales?",
            "respuesta" => "No, por el momento hacemos envíos dentro de Argentina.",
            "imagen" => "img/faqs/mundo.png",
          ],
          [
            "pregunta" => "¿Dónde fabrican y crean sus productos?",
            "respuesta" => "Se diseñan y fabrican dentro de Argentina.",
            "imagen" => "img/faqs/fabrica.png",
          ],
          [
            "pregunta" => "¿Cómo hago para hacer el seguimiento de mi orden de compras?",
            "respuesta" => "En la página oficial de Correo Argentino vas a poder hacer el seguimiento con tu orden de compra.",
            "imagen" => "img/faqs/mapa.png",
          ],
          [
            "pregunta" => "¿Qué hago si mi orden llega con productos rotos?",
            "respuesta" => "¡Escribinos a nuestro mail y te daremos una solucion!",
            "imagen" => "img/faqs/mirror.png",
          ],
          [
            "pregunta" => "¿Puedo comprar sombras individuales específicas que vengan en sus paletas de ojos?",
            "respuesta" => "No, por el momento las sombras que se encuentran dentro de las paletas de ojos no se venden de forma individual. Actualmente nuestros productos se consiguen solo de forma online en nuestra página oficial.",
            "imagen" => "img/faqs/sombra.png",
          ],
        ];

        return view('faq', compact('listaDePreguntas'));
    }

	public function congrats(){
        return view('congrats');
    }

	public function confirmacion(){
        return view('confirmacion');
    }
}
