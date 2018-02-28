<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="{{ asset('/vendor/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/vendor/bootstrap3-editable/js/bootstrap-editable.min.js') }}"></script>
    <script src="{{ asset('/vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap3-editable/css/bootstrap-editable.css') }}" />
    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap-select/css/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/vendor/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/cover.css') }}" />

    <title>Poreche Home</title>
</head>

<body>

    <div class="site-wrapper">

        <div class="site-wrapper-inner">

            <div class="cover-container">

                <div class="inner">
                    <h3 class="masthead-brand">Poreche REG</h3>
                    <nav>
                        <ul class="nav masthead-nav">
                            <li class="active"><a href="{{ route('home') }}">Главная</a></li>
                            {{--<li><a href="#">Типы номеров</a></li>--}}
                            {{--<li><a href="#">Почта</a></li>--}}
                        </ul>
                    </nav>
                </div>

                <div class="inner cover">
                    @yield('content')
                </div>

                <div class="inner">
                    <p>Especially for Poreche, by <a href="https://vk.com/smirnov_cpp">Maxim Smirnov</a>.</p>
                </div>

            </div>

        </div>

    </div>
</body>
</html>

