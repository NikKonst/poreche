<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#1d1d1d">
        <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/css/bootstrap.css') }}" />
        <link rel="stylesheet" href="{{ asset('/vendor/animate.css') }}" />
        <!--link rel="stylesheet" href="{{ asset('/css/styles.css') }}" /-->
        <link rel="stylesheet" href="{{ asset('/css/default.css') }}" />
        <title>Poreche 35</title>
        <style>
            .jumbotron {
                position: absolute;
                background:none!important;
                top: 50%;
                left:50%;
                transform: translate(-50%,-50%);
            }
        </style>
    </head>
    <body>
        
        <div class="container-fluid">
            <div class="jumbotron text-center">
                    <div class="col-md animated fadeIn -vendor-animation-duration: 2s">
                        <img src="{{ asset('/assets/img/logo.png') }}" class="logo">
                        <h1>Поречье 35</h1>
                        <h2>Ждали?</h2>
                    </div>
            </div>
        </div>

    <script src="{{ asset('/vendor/bootstrap/js/bootstrap.js') }}"></script>
    </body>
</html>
