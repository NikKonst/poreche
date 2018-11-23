<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap-select/css/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/vendor/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}" />

    <title>Poreche 35</title>
</head>
<body>
<div class="register-form text-uppercase">
    @if($success)
        <div class="col-lg-8 col-lg-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2 text-center">
            <h1>Вы зарегистрировались!</h1>
            <h1>Проверьте почту</h1>
        </div>
    @else
    <div class="col-lg-8 col-lg-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2 text-center">
        <h1>Регистрация</h1>
    </div>
    <div class="col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('room-register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('first-name') || $errors->has('second-name') ? ' has-error' : '' }}">
                <label for="first-name" class="col-md-2 control-label">Имя</label>

                <div class="col-md-4">
                    <input id="first-name" type="text" class="form-control" name="first-name" value="{{ old('first-name') }}" required autofocus>

                    @if ($errors->has('first-name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('first-name') }}</strong>
                        </span>
                    @endif
                </div>

                <label for="second-name" class="col-md-2 control-label">Фамилия</label>

                <div class="col-md-4">
                    <input id="second-name" type="text" class="form-control" name="second-name" value="{{ old('second-name') }}" required>

                    @if ($errors->has('second-name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('second-name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="main-block" style="display: none">
                
                @if(!$isMainReg)
                    <div class="form-group{{ $errors->has('room-boss') ? ' has-error' : '' }}">
                        <label for="room-boss" class="col-md-4 control-label">Ответственный</label>

                        <div class="col-md-8">
                            <input id="room-boss" type="text" class="form-control" name="room-boss" value="{{ old('room-boss') }}" required>

                            @if ($errors->has('room-boss'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('room-boss') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                @endif
                
                <div class="form-group">
                    <div class="col-lg-12">
                        <span class="button-checkbox col-lg-6 col-xs-12">
                            <button type="button" class="btn btn-lg btn-hot" style="width: 100%" data-color="fresh">Питание</button>
                            <input type="checkbox" class="hidden" name="food" />
                            <input id="fix" type="hidden" name="food" value="off" />
                        </span>
                        <span class="button-checkbox col-lg-6 col-xs-12">
                            <button type="button" class="btn btn-lg btn-hot" style="width: 100%"  data-color="fresh">Трансфер</button>
                            <input type="checkbox" class="hidden" name="transfer" />
                            <input id="fix" type="hidden" name="transfer" value="off" />
                        </span>
                    </div>
                </div>


                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    <label for="phone" class="col-md-4 control-label">Телефон</label>

                    <div class="col-md-8">
                        <input id="phone" type="tel" class="form-control" name="phone" value="{{ old('phone') }}" required>

                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Адрес</label>

                    <div class="col-md-8">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('vk-url') ? ' has-error' : '' }}">
                    <label for="vk-url" class="col-md-4 control-label">Ссылка VK</label>

                    <div class="col-md-8">
                        <input id="vk-url" type="text" class="form-control" name="vk-url" value="{{ old('vk-url') }}" required>

                        @if ($errors->has('vk-url'))
                            <span class="help-block">
                                <strong>{{ $errors->first('vk-url') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('room-type') ? ' has-error' : '' }}">
                    <label for="room-type" class="col-md-4 control-label">Тип номера</label>

                    <div class="col-md-6">
                        <select class="selectpicker" name="room-type" id="room-type" onchange="roomTypeChanged()">
                            @foreach($roomTypes as $roomType)
                                <option guestscount="{{ $roomType->number_of_guests }}" value="{{ $roomType->id }}">{{ $roomType->name . ' ' . $roomType->price .'/с чел'}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="guests-block">
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-lg btn-sunny" onclick="this.disabled=true; console.log($(this.form).serializeArray())">
                            Зарегистрироваться
                        </button>
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
                    `<div class="form-group">
                            <label for="first-name" class="col-md-4 control-label">Имя и фамилия гостя</label>
                            <div class="col-md-8">
                                <input id="guests[]" type="text" class="form-control" name="guests[]" value="" required>
                            </div>
                        </div>

                     <div class="form-group">
                            <label for="vk-url" class="col-md-4 control-label">Ссылка VK гостя</label>
                            <div class="col-md-8">
                                <input id="vk-guests[]" type="text" class="form-control" name="vk-guests[]" value="" required>
                            </div>
                     </div>

                     <div class="form-group">
                            <label for="phone" class="col-md-4 control-label">Телефон гостя</label>
                            <div class="col-md-8">
                                <input id="phone-guests[]" type="tel" class="form-control" name="phone-guests[]" value=""  required>
                            </div>
                     </div>

                        <div class="form-group">
                            <div class="col-lg-12">
                                <span class="button-checkbox col-lg-6 col-xs-12">
                                    <button type="button" class="btn btn-lg btn-hot" style="width: 100%" data-color="fresh">Питание</button>
                                    <input type="checkbox" class="hidden" name="guests-food[]" />
                                    <input id="fix" type="hidden" name="guests-food[]" value="off" />
                                </span>
                                <span class="button-checkbox col-lg-6 col-xs-12">
                                    <button type="button" class="btn btn-lg btn-hot" style="width: 100%"  data-color="fresh">Трансфер</button>
                                    <input type="checkbox" class="hidden" name="guests-transfer[]" />
                                    <input id="fix" type="hidden" name="guests-transfer[]" value="off" />
                                </span>
                            </div>
                        </div>`;
            }
            $("div.guests-block").html(content);

            $('.button-checkbox').each(function () {

                // Settings
                var $widget = $(this),
                    $button = $widget.find('button'),
                    $checkbox = $widget.find('input:checkbox'),
                    $boolFix = $widget.find('input#fix'),
                    color = $button.data('color'),
                    settings = {
                        on: {
                            icon: 'glyphicon glyphicon-check'
                        },
                        off: {
                            icon: 'glyphicon glyphicon-unchecked'
                        }
                    };

                $button.unbind();

                // Event Handlers
                $button.on('click', function () {
                    $checkbox.prop('checked', !$checkbox.is(':checked'));
                    if($checkbox.is(':checked')){
                        $boolFix.prop("disabled", true);
                        console.log($boolFix.is(':disabled'));
                    }
                    else {
                        $boolFix.prop("disabled", false);
                        console.log($boolFix.is(':disabled'));
                    }
                    $checkbox.triggerHandler('change');
                    updateDisplay();
                });
                $checkbox.on('change', function () {
                    updateDisplay();
                });

                // Actions
                function updateDisplay() {
                    var isChecked = $checkbox.is(':checked');

                    // Set the button's state
                    $button.data('state', (isChecked) ? "on" : "off");

                    // Set the button's icon
                    $button.find('.state-icon')
                        .removeClass()
                        .addClass('state-icon ' + settings[$button.data('state')].icon);

                    // Update the button's color
                    if (isChecked) {
                        $button
                            .removeClass('btn-hot')
                            .addClass('btn-' + color + ' active');
                    }
                    else {
                        $button
                            .removeClass('btn-' + color + ' active')
                            .addClass('btn-hot');
                    }
                }

                // Initialization
                function init() {

                    updateDisplay();

                    // Inject the icon if applicable
                    if ($button.find('.state-icon').length == 0) {
                        $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
                    }
                }
                init();
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
