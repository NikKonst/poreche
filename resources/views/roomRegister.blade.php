<!doctype html>
<!-- New version -->
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#1d1d1d">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap-select/css/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/vendor/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/default.css') }}?v=2" />

    <title>Poreche 35</title>
</head>
<body>
<div class="register-form">
    @if($success)
        <div class="container-fluid">
            <div class="col-md-4 col-md-offset-4 text-center">
                <div class="form-booking row">
                    <div class="col-md">
                        <img src="{{ asset('/assets/img/logo.png') }}" class="logo">
                        <h1>Все хорошо!</h1>
                        <h1>Проверьте почту</h1>
                    </div>
                </div>
            </div>
        </div>
    @else
    <div class="container-fluid">
	<div class="col-md-4 col-md-offset-4 text-center">
        <div class="col-md">
            <img src="{{ asset('/assets/img/logo.png') }}" class="logo">
            <h1>Регистрация</h1>
            <h2>Поречье 35</h2>
        </div>
        <form class="form-booking" role="form" method="POST" action="{{ route('room-register') }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md{{ $errors->has('first-name') ? ' has-error' : '' }}">
                    <input id="first-name" type="text" class="form-input" placeholder="Имя" name="first-name" value="{{ old('first-name') }}" required autofocus>
                    @if ($errors->has('first-name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('first-name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md{{ $errors->has('second-name') ? ' has-error' : '' }}">
                    <input id="second-name" type="text" class="form-input" placeholder="Фамилия"  class="form-control" name="second-name" value="{{ old('second-name') }}" required>
                    @if ($errors->has('second-name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('second-name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            
            <div class="main-block" style="display: none">
            @if(!$isMainReg)
                <div class="row">
                    <div class="col-md{{ $errors->has('room-boss') ? ' has-error' : '' }}">
                        <input id="room-boss" type="text" class="form-input" placeholder="Ответственный"  name="room-boss" value="{{ old('room-boss') }}" required>
                        @if ($errors->has('room-boss'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('room-boss') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
            @endif

            
            <div class="row">
                <div class="col-md">
                    <div class="checkboxes">
                        <div class="form-check">
                            <label>
                                <input type="checkbox" name="food"> <span class="label-text">питание</span>
                                <input type="hidden" name="food" value="off">
                            </label>
                        </div>
                        <div class="form-check">
                            <label>
                                <input type="checkbox" name="transfer"> <span class="label-text">трансфер</span>
                                <input type="hidden" name="transfer" value="off">
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md{{ $errors->has('phone') ? ' has-error' : '' }}">
                    <input id="phone" type="tel" class="form-input" placeholder="Телефон" name="phone" value="{{ old('phone') }}" required>
                    @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-input" placeholder="Email-адрес" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md{{ $errors->has('vk-url') ? ' has-error' : '' }}">
                    <input id="vk-url" type="text" class="form-input" placeholder="Ссылка VK" name="vk-url" value="{{ old('vk-url') }}" required>
                    @if ($errors->has('vk-url'))
                            <span class="help-block">
                                <strong>{{ $errors->first('vk-url') }}</strong>
                            </span>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md{{ $errors->has('room-type') ? ' has-error' : '' }}">
                    <select data-style="form-input" class="selectpicker" name="room-type" id="room-type" onchange="roomTypeChanged()">
                        @foreach($roomTypes as $roomType)
                                <option guestscount="{{ $roomType->number_of_guests }}" value="{{ $roomType->id }}" class="select-chosen">{{ $roomType->name . ' ' . $roomType->price .'р/чел'}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="guests-block">
            </div>

            <div class="row">
                <div class="col-md">
                    <button type="submit" class="send-button" onclick="this.disabled = true; this.form.submit()">Зарегистрироваться</button>
                </div>
            </div>
            </div>
        </form>
    </div>
     @endif
</div>

<script src="{{ asset('/vendor/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('/vendor/jquery.maskedinput.min.js') }}"></script>
<script src="{{ asset('/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
<script>
    jQuery(function($){
        $("#phone").mask("+7 (999) 999-99-99");
        $("#phone-guests[]").mask("+7 (999) 999-99-99");
    });

    function roomTypeChanged() {

        $('div.guests-block').fadeOut('slow', function () {
            var guestsCount = $( "#room-type option:selected" ).attr('guestscount');

            var content = "";

            for(var i=0; i<guestsCount; i++){
                content = content +
                    ` <h1 style="    font-size:5rem;
    margin-top:-12px;">. . .</h1>
                    <div class="row">
                        <div class="col-md">
                            <input id="guests[]' type="text" class="form-input" placeholder="Имя и фамилия гостя" name="guests[]" value="" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md">
                            <input id="vk-guests[]" type="text" class="form-input" name="vk-guests[]" placeholder="Ссылка VK гостя" value="" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md">
                            <input id="phone-guests[]" type="tel" name="phone-guests[]" class="form-input" placeholder="Телефон гостя" value="" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md">
                            <div class="checkboxes">
                                <div class="form-check">
                                    <label>
                                        <input type="checkbox" name="guests-food[]"> <span class="label-text">питание</span>
                                        <input type="hidden" name="guests-food[]" value="off">
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label>
                                        <input type="checkbox" name="guests-transfer[]"> <span class="label-text">трансфер</span>
                                        <input type="hidden" name="guests-transfer[]" value="off">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>`;
            }
            $("div.guests-block").html(content);
            
            $('input:checkbox').on('change', function () {
                if($(this).prop('checked')){
                    $('input:hidden[name="'+$(this).attr('name')+'"]').prop('disabled',true);
                } else {
                    $('input:hidden[name="'+$(this).attr('name')+'"]').prop('disabled',false);
                }
            });
            
            $('div.guests-block').fadeIn();
            $('.main-block').fadeIn();
        });

        jQuery(function($){
            $("#phone").mask("+7 (999) 999-99-99");
            $("#phone-guests").mask("+7 (999) 999-99-99");
        });
    }

    roomTypeChanged();
</script>
</body>
</html>