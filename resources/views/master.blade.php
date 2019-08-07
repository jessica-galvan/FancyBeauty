<?php
  if(Auth::check()){
    $nombre_usuario  = "";
    $user_id = Auth::user()->id;
    $linkUsuario = "/perfil";
    $textoBienvenida = "Hola ".Auth::user()->name;
    $textoHamburguesa = "Perfil";
    $textoHamburguesaMOBILE = "MI CUENTA";
    $textoLogout = "Cerrar Sesión";
  } else {
    $user_id = "";
    $textoBienvenida = "Ingresar";
    $textoHamburguesa = "Ingresar";
    $textoHamburguesaMOBILE = "INGRESAR";
    $linkUsuario = '/login';
    $nombre_usuario = "";
    $textoLogout = "";
  }

  /* OJO $categorias, hasta que no logre conectarme con la base de datos, para traer la info de categorias y eso.., cree esta basura para safar y no tener que volver a modificar todo de nuevo.*/
  $categorias = [
      ['id' => '1', 'link' => 'rostro', 'nombre' => 'Rostro'],
      ['id' => '2', 'link' => 'labios', 'nombre' => 'Labios'],
      ['id' => '3', 'link' => 'ojos', 'nombre' => 'Ojos'],
      ['id' => '4', 'link' => 'accesorios', 'nombre' => 'Accesorios'],
  ];

  /*El yield('css') de aca abajo es para que se pueda definir el $CSS que teniamos antes.*/
?>
@yield('css')
<!DOCTYPE html>
<html>
    <head>

        <title>Fancy Beauty</title>
        <meta charset="utf-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link rel="shortcut icon" href="{{ asset('logoDeTitel.png') }}" />
        <link rel="stylesheet" href="/css/master.css">
        @foreach($CSS as $variable => $valor)
          <link rel="stylesheet" href="/css/{{$valor}}.css">
        @endforeach
    </head>
    <body>
        <div class="xl-screen">
            <div class="body-container">
                <header>
                    <?php /*MENU MOBILE*/?>
                    <nav class="menu-mobile">
                        <nav role="navigation">
                            <div id="menuToggle">
                                <input type="checkbox" />

                                <?php /*Los spans actuan como el icono de hamburgersa y se transforman en la cruz*/?>
                                <span></span>
                                <span></span>
                                <span></span>

                                <?php /*Lo que va dentro del menu desplegable*/?>
                                <ul id="menu">
                                    <a href="/"><li>Inicio</li></a>
                                    <a href="#"><li>Categorias</li></a>
                                    <a href="/catalogo"><li>Catálogo</li></a>
                                    <a href="/faq"><li>Preguntas Frecuentes</li></a>
                                    <a href="{{$linkUsuario}}"><li>{{$textoHamburguesa}}</li></a>
                                    @if (Auth::check())
                                        <a href="/logout"><li>{{$textoLogout}}</li></a>
                                    @endif

                                </ul>
                            </div>
                        </nav>

                        <a href="/"><img class="logo" src="/img/icons/LogoMobile.png" alt="Logo"></a>

                        <div class="icons">
                            <a id="user-icon" href="{{$linkUsuario}}">
                                <img id="icon-img" class="icon-img" src="/img/icons/logInRegister.png" alt="User">
                            </a>

                            <a href="/carrito">
                                <?php /*total de items del carrito en el header*/?>
                                @if(Auth::check())
                                        <span class="totalItems"></span>
                                @endif
                                <img class="icon-img" src="/img/icons/BolsaDeCompra.png" alt="Carrito">
                            </a>
                        </div>
                    </nav>

                    <?php /*MENU DESKTOP*/?>
                    <nav class="menu-desktop">
                        <?php /*Primera Linea del Menu*/ ?>
                        <div class="menu-top">
                            <div class="icons">
                                <a href="#">
                                    <div id="box-buscador" class="icon-box">
                                        <div>
                                            <img id="lupa" class="icon-img" src="/img/icons/LupaDeBusqueda.png" alt="Busqueda">
                                            <p>Buscar</p>
                                        </div>
                                        <div class="buscador">
                                            <form action="/buscar" method="get">
                                                <input class="input-buscador" type="text" name="query" value="">
                                                <button class="button-buscador"  type="submit" name="">Enviar</button>
                                            </form>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <a href="/">
                                <img class="logo" src="/img/icons/LogoComputadora.png" alt="Logo">
                            </a>

                            <div class="icons">
                                <a href="{{$linkUsuario}}">
                                    <div id="user-box" data-userID="{{$user_id}}" class="icon-box">
                                        <img id="user" class="icon-img" src="/img/icons/logInRegister.png" alt="User">
                                        <p>{{$textoBienvenida}}</p>
                                    </div>
                                </a>
                                @if(Auth::check())
                                <div class="dropdown">
                                    <button class="dropbtn">
                                    <i class="fa fa-caret-down"></i>
                                    </button>
                                    <div class="dropdown-content">
                                     
                                        <a href="/perfil">Perfil</a>
                                        <a href="/perfil/editar">Editar Perfil</a>
                                        <a href="/logout">Cerrar Sesión</a>
                            
                                    </div>
                                </div>
                                @endif

                                <a href="/carrito">
                                    <div id='bag-box' class="icon-box">
                                              <?php /*total de items del carrito en el header*/?>
                                              @if(Auth::check())
                                                      <span class="totalItems"></span>
                                              @endif
                                        <img id="bag" class="icon-img" src="/img/icons/BolsaDeCompra.png" alt="Carrito">
                                        <p>Carrito</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        {{-- /*Segunda Linea del Menu*/ --}}
                        <div class="menu-bottom">
                            <ul>
                                <li><a href="/">INICIO</a></li>
                                <li>|</li>
                                <li class="dropdown">
                                    <a href="#">CATEGORIAS</a>
                                    <div class="dropdown-category">
                                        @foreach($categorias as $categoria)
                                        <a class="dropdown-category-a" href="/categoria/{{$categoria['id']}}/{{$categoria['link']}}">
                                        {{$categoria['nombre']}}
                                        </a>
                                        @endforeach
                                    </div>
                                </li>
                                <li>|</li>
                                <li><a href="/catalogo">CATÁLOGO</a></li>
                                <li>|</li>
                                <li><a href="/faq">PREGUNTAS FRECUENTES</a></li>
                            </ul>
                        </div>
                    </nav>
            </header>
            <main class="main-container">
                @yield('content')
            </main>
            <footer class="footer-info">
                <?php /*MOBILE VERSION*/?>
                <section class="links-mobile">
                    <article class="footer-info-mobile">
                        <h3 class="h3-social">SOCIAL MEDIA +</h3>
                        <div class="social-links-mobile">
                            <a href="http://facebook.com"><i class="fab fa-facebook-f"></i></a>
                            <a href="http://instagram.com"><i class="fab fa-instagram"></i></a>
                            <a href="http://youtube.com"><i class="fab fa-youtube"></i></a>
                            <a href="http://twitter.com"><i class="fab fa-twitter"></i></a>
                        </div>
                    </article>

                    <article class="footer-info-mobile">
                        <a href="{{$linkUsuario}}"><h3>{{$textoHamburguesaMOBILE}}</h3></a>
                    </article>

                    <article class="footer-info-mobile">
                        <a href="/carrito"><h3>VER CARRITO</h3></a>
                    </article>

                    <article class="footer-info-mobile">
                        <a href="/faq"><h3>PREGUNTAS FRECUENTES</h3></a>
                    </article>

                    <article class="footer-info-mobile">
                        <a href="/catalogo"><h3>CATÁLOGO</h3></a>
                    </article>

                    <div class="suscribe">
                        <h3>SUSCRIBITE</h3>
                        <form class="suscribe-form" action="" method="post">
                            <input class="email-suscribe" type="email" name="email" value="">
                            <button id="suscribe-button-mobile" class='btn-suscribe' type="click" name="button">ENVIAR</button>
                        </form>
                        <span class='suscribe-error'></span>
                    </div>

                    <div class="copyright">
                        <p>Copyright 2019</p>
                    </div>
                </section>

                <?php /*DESKTOP VERSION*/?>
                <section class="links-desktop">
                    <article class="cuenta">
                        <a href="{{$linkUsuario}}"><h3>{{$textoHamburguesa}}</h3></a>
                        <a href="/carrito"><h3>VER CARRITO</h3></a>
                        <a href="/faq"><h3>PREGUNTAS FRECUENTES</h3></a>
                        <a href="/catalogo"><h3>CATÁLOGO</h3></a>
                    </article>

                    <article class="social-media">
                        <h3>SOCIAL MEDIA</h3>
                        <div class="social-links-desktop">
                            <a href="http://facebook.com"><i class="fab fa-facebook-f"></i></a>
                            <a href="http://instagram.com"><i class="fab fa-instagram"></i></a>
                            <a href="http://youtube.com"><i class="fab fa-youtube"></i></a>
                            <a href="http://twitter.com"><i class="fab fa-twitter"></i></a>
                        </div>
                    </article>

                    <div class="suscribe">
                        <h3>SUSCRIBITE</h3>
                        <form class="suscribe-form" action="" method="post">
                            <input class="email-suscribe" type="email" name="email" value="">
                            <button id="suscribe-button-desktop" class='btn-suscribe' type="button" name="button">ENVIAR</button>
                        </form>
                        <span class='suscribe-error'></span>
                    </div>

                    <div class="copyright">
                        <p>Copyright 2019</p>
                    </div>
                </section>
            </footer>
        </div>
    </div>
    <script src="/js/master.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
  $("#lupa").click(function(){
    $(".buscador").slideToggle("slow");
  });
   
    $(".dropdown-category").click(function(){
    $(".dropdown-category-a").slideToggle("slow");
  });
  
      $("#user").click(function(){
    $(".dropdown-content").slideToggle("slow");
  });
     $(".h3-social").click(function(){
    $(".social-links-mobile").slideToggle("slow");
  });
    
});
</script>

</body>
</html>
