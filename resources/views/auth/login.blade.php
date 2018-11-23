<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#1d1d1d">
    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('/vendor/animate.css') }}" />
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
    <div class="col-lg-8 col-lg-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2 text-center">
        <img src="{{ asset('/assets/img/logo.png') }}" class="logo">
    </div>
    <div class="jumbotron text-center">
        <div class="col-md">
                
                <h2 class="text-uppercase">Вход</h2>
        </div>
        <div class="register-form">
            <form role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-input" placeholder="Email-адрес админа"  name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="form-input" placeholder="Пароль админа"  name="password" required>
                        @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md">
                        <div class="checkboxes">
                            <div class="form-check">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> <span class="label-text">запомнить меня</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md">
                        <button type="submit" class="send-button">Войти</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>    

<script src="{{ asset('/vendor/bootstrap/js/bootstrap.js') }}"></script>
</body>
</html>

