<?php /*Aca es para que se pueda definir el $CSS que teniamos antes.*/
  $textoBienvenida = "Ingresar";
  $textoHamburguesa = "Ingresar";
  $linkUsuario = 'login.php';
  $nombre_usuario = "";
  $textoLogout = "";
  $categorias = [ ['id' => 1, 'nombre' =>'Rostro'], ['id' => 2,'nombre' =>'Accesorios'] ];
?>
@yield('css')
<!DOCTYPE html>
<html>
    <head>
        <title>Fancy Beauty</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
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
                                    <a href="index"><li>Inicio</li></a>
                                    <a href="#"><li>Categorias</li></a>
                                    <a href="#"><li>Contacto</li></a>
                                    <a href="faq"><li>Preguntas Frecuentes</li></a>
                                    <a href="{{$linkUsuario}}"><li>{{$textoHamburguesa}}</li></a>
                                    {{-- <a href="actions/logout.php"><li>{{$textoLogout}}</li></a> --}}
                                </ul>
                            </div>
                        </nav>

                        <a href="index"><img class="logo" src="img/icons/LogoMobile.png" alt="Logo"></a>

                        <div class="icons">
                            <a id="user-icon" href="{{$linkUsuario}}">
                                <img id="icon-img" class="icon-img" src="img/icons/logInRegister.png" alt="User">
                            </a>

                            <a href="#">
                                <img class="icon-img" src="img/icons/BolsaDeCompra.png" alt="Carrito">
                            </a>
                        </div>
                    </nav>

                    <?php /*MENU DESKTOP*/?>
                    <nav class="menu-desktop">
                        <?php /*Primera Linea del Menu*/ ?>
                        <div class="menu-top">
                            <div class="icons">
                                <a href="#">
                                    <div class="icon-box">
                                        <img id="lupa" class="icon-img" src="img/icons/LupaDeBusqueda.png" alt="Busqueda">
                                        <p>Buscar</p>
                                    </div>
                                </a>
                            </div>

                            <a href="index">
                                <img class="logo" src="img/icons/LogoComputadora.png" alt="Logo">
                            </a>

                            <div class="icons">
                                <a href="{{$linkUsuario}}">
                                    <div id="user-box" class="icon-box">
                                        <img id="user" class="icon-img" src="img/icons/logInRegister.png" alt="User">
                                        <p>{{$textoBienvenida}}</p>
                                    </div>
                                </a>
                                @if(isset($_SESSION['email_usuario']))
                                <div class="dropdown">
                                    <button class="dropbtn">
                                    <i class="fa fa-caret-down"></i>
                                    </button>
                                    <div class="dropdown-content">
                                        <a href="perfilUsuario">Perfil</a>
                                        <a href="editarPerfil">Editar Perfil</a>
                                        <a href="actions/logout">Cerrar Sesión</a>
                                    </div>
                                </div>
                                @endif

                                <a href="#">
                                    <div id='bag-box' class="icon-box">
                                        <img id="bag" class="icon-img" src="img/icons/BolsaDeCompra.png" alt="Carrito">
                                        <p>Carrito</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php/*Segunda Linea del Menu*/ ?>
                        <div class="menu-bottom">
                            <ul>
                                <li><a href="index">INICIO</a></li>
                                <li>|</li>
                                <li class="dropdown">
                                    <a href="#">CATEGORIAS</a>
                                    <div class="dropdown-category">
                                        @foreach($categorias as $categoria)
                                        <a href="filtro?id={{$categoria['id']}}&tabla=categorias">
                                        {{$categoria['nombre']}}
                                        </a>
                                        @endforeach
                                    </div>
                                </li>
                                <li>|</li>
                                <li><a href="#">CONTACTO</a></li>
                                <li>|</li>
                                <li><a href="faq">PREGUNTAS FRECUENTES</a></li>
                            </ul>
                        </div>
                    </nav>
            </header>
            <main class="main-container">

                <?php /*Aca va al contenido que quiero que varie en cada página*/?>
                @yield('content')


            </main>
            <footer class="footer-info">
                <?php /*MOBILE VERSION*/?>
                <section class="links-mobile">
                    <article class="footer-info-mobile">
                        <h3>SOCIAL MEDIA</h3>
                        <h3>+</h3>
                    </article>

                    <article class="footer-info-mobile">
                        <a href="login"><h3>MI CUENTA</h3></a>
                    </article>

                    <article class="footer-info-mobile">
                        <a href="#"><h3>VER CARRITO</h3></a>
                    </article>

                    <article class="footer-info-mobile">
                        <a href="faq"><h3>PREGUNTAS FRECUENTES</h3></a>
                    </article>

                    <article class="footer-info-mobile">
                        <a href="#"><h3>SOBRE NOSOTROS</h3></a>
                    </article>

                    <div class="suscribe">
                        <h3>SUSCRIBITE</h3>
                        <form class="suscribe-form" action="#suscribe-button" method="post">
                            <input class="email-suscribe" type="email" name="email" value="">
                            <button id="suscribe-button" type="submit" name="button">ENVIAR</button>
                        </form>
                    </div>

                    <div class="copyright">
                        <p>Copyright 2019</p>
                    </div>
                </section>

                <?php /*DESKTOP VERSION*/?>
                <section class="links-desktop">
                    <article class="cuenta">
                        <a href="{{$linkUsuario}}"><h3>{{$textoHamburguesa}}</h3></a>
                        <a href="#"><h3>VER CARRITO</h3></a>
                        <a href="faq"><h3>PREGUNTAS FRECUENTES</h3></a>
                        <a href="#"><h3>SOBRE NOSOTROS</h3> </a>
                        <a href="#"><h3>CONTACTO</h3> </a>
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
                        <form class="suscribe-form" action="#" method="post">
                            <input class="email-suscribe" type="email" name="email" value="">
                            <button id="suscribe-button" type="submit" name="button">ENVIAR</button>
                        </form>
                    </div>

                    <div class="copyright">
                        <p>Copyright 2019</p>
                    </div>
                </section>
            </footer>
        </div>
    </div>
</body>
</html>
