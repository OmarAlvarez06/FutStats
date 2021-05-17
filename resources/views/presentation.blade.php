<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Fut-Stats Page" />
        <meta name="author" content="Brian Gaytan & Omar Alvarez" />
        <title>FutStats - Tu Página Relativa A Partidos De Tu Colonia.</title>
        <!-- Favicon-->
        <link rel="icon" type="image/png" href="{{asset('images/icon.png')}}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" type="text/css" href="{{asset('css/presentation.css')}}" >
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <img class="img-fluid" src="{{asset('images/logo_icon.png')}}" alt="FutStats Logo Icon">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Acerca</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Servicios</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Portafolio</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contacto</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="login">Iniciar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end">
                        <h1 class="text-uppercase text-white font-weight-bold">Múltiples Encuentros.<br>Un Solo Resultado</h1>
                        <hr class="divider my-4" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 font-weight-light mb-5">Disfruta De Información Y Estadística De Los Partidos De Tu Colonia</p>
                        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Descubre Más</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section bg-primary" id="about">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">Conoce Información Relevante<br>De Los Partidos Más Destacados<br>De Tu Colonia.</h2>
                        <hr class="divider light my-4" />
                        <p class="text-white-50 mb-4">Conoce A Detalle Información Respectiva A Encuentros, Fechas, Horarios, Jugadores, Equipos y Más.</p>
                        <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">!Vamos A Ello!</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <h2 class="text-center mt-0">Algunos De Los Servicios Que Ofrecemos</h2>
                <hr class="divider my-4" />
                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-futbol text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Goleadores</h3>
                            <p class="text-muted mb-0">Descubre Y Sigue A Los Goleadores Del Torneo!</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-user-friends fa-4x text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Equipos</h3>
                            <p class="text-muted mb-0">Revisa La Información Más Importante De Tus Equipos Favoritos.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-child fa-4x text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Jugadores</h3>
                            <p class="text-muted mb-0">Infórmate Sobre Lo Más Relevante De Tus Jugadores Estrellas!</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fab fa-etsy fa-4x text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Estadísticas</h3>
                            <p class="text-muted mb-0">Conoce Todas Las Estadísticas De Los Juegos De Tu Colonia.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio-->
        <div id="portfolio">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-lg-4 col-sm-6 background-color-portfolio">
                        <a class="portfolio-box" href="{{asset('images/abigail-keenan-8-s5QuUBtyM-unsplash.jpg')}}">
                            <img class="img-fluid" src="{{asset('images/abigail-keenan-8-s5QuUBtyM-unsplash.jpg')}}" alt="Unsplash Reference Image" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Unsplash</div>
                                <div class="project-name">Imagen De Referencia Por Abigail Keenan</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="{{asset('images/alexander-londono-SVbzaCT_Jbc-unsplash.jpg')}}">
                            <img class="img-fluid" src="{{asset('images/alexander-londono-SVbzaCT_Jbc-unsplash.jpg')}}" alt="Unsplash Reference Image" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Unsplash</div>
                                <div class="project-name">Imagen De Referencia Por Alexander Londono</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6 background-color-portfolio">
                        <a class="portfolio-box" href="{{asset('images/thomas-serer-r-xKieMqL34-unsplash.jpg')}}">
                            <img class="img-fluid" src="{{asset('images/thomas-serer-r-xKieMqL34-unsplash.jpg')}}" alt="Unsplash Reference Image" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Unsplash</div>
                                <div class="project-name">Imagen De Referencia Por Thomas Serer</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6 background-color-portfolio">
                        <a class="portfolio-box" href="{{asset('images//donnycocacola--3pxa1O1zoI-unsplash.jpg')}}">
                            <img class="img-fluid" src="{{asset('images//donnycocacola--3pxa1O1zoI-unsplash.jpg')}}" alt="Unsplash Reference Image" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Unsplash</div>
                                <div class="project-name">Imagen De Referencia Por Donny CocaCola</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="{{asset('images/khamkeo-vilaysing-_kBrDn-Oir0-unsplash.jpg')}}">
                            <img class="img-fluid" src="{{asset('images/khamkeo-vilaysing-_kBrDn-Oir0-unsplash.jpg')}}" alt="Unsplash Reference Image" />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Unsplash</div>
                                <div class="project-name">Imagen De Referencia Por Khamkeo Vilaysing</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6 background-color-portfolio">
                        <a class="portfolio-box" href="{{asset('images/jannes-glas-cuhQcfp3By4-unsplash.jpg')}}">
                            <img class="img-fluid" src="{{asset('images/jannes-glas-cuhQcfp3By4-unsplash.jpg')}}" alt="Unsplash Reference Image" />
                            <div class="portfolio-box-caption p-3">
                                <div class="project-category text-white-50">Unsplash</div>
                                <div class="project-name">Imagen De Referencia Por Jannes Glas</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">Estemos En Contacto!</h2>
                        <hr class="divider my-4" />
                        <p class="text-muted mb-5">Si tienes dudas acerca de los servicios que ofrecemos puedes enviarnos un correo electrónico o llamarnos al teléfono a continuación.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div>+1 (555) 301 2019 1021</div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                        <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                        <a class="d-block" href="mailto:contacto@futstats.com">contacto@futstats.com</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted">Copyright © 2021 - FutStats (Con Ayuda De Bootstrap)</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('js/scripts.js')}}"></script>
    </body>
</html>
