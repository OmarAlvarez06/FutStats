<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Brian Gaytan & Omar Alvarez">
        <link type="image/png" rel="icon" href="{{asset('images/icon.png')}}">
        
        <title>@yield('title')</title>

        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core themes CSS (includes Bootstrap)-->
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstraping.css')}}" >
        <link rel="stylesheet" type="text/css" href="{{asset('css/myStyle.css')}}">

    </head>
    <body>
        @section('principal')
		@show
    </body>
</html>