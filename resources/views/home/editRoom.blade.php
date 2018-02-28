<?php
if(nullValue(old('room-number')))
    $roomNumber = $room->room_number;
else
    $roomNumber = old('room-number');

if(nullValue(old('room-type')))
    $roomType = $room->room_type;
else
    $roomType = old('room-type');

if(nullValue(old('name')))
    $name = $room->name;
else
    $name = old('name');

if(nullValue(old('phone')))
    $phone = $room->phone;
else
    $phone = old('phone');

if(nullValue(old('email')))
    $email = $room->email;
else
    $email = old('email');

if(nullValue(old('vk-url')))
    $vkUrl = $room->vk_url;
else
    $vkUrl = old('vk-url');

if(nullValue(old('room-boss')))
    $roomBoss = $room->room_boss;
else
    $roomBoss = old('room-boss');

if(nullValue(old('passport')))
    $passport = $room->passport;
else
    $passport = old('passport');

if(nullValue(old('receipt')))
    $receipt = $room->receipt;
else
    $receipt = old('receipt');


if(nullValue(old('guests')))
    $guests = $room->guests;
else
    $guests = old('guests');

if(nullValue(old('bums')))
    $bums = $room->bums;
else
    $bums = old('bums');

if(nullValue(old('food')))
    $food = $room->food;
else
    $food = old('food');

if(nullValue(old('transfer')))
    $transfer = $room->transfer;
else
    $transfer = old('transfer');


if(nullValue(old('paid-main')))
    $paidMain = $room->paid_main;
else
    $paidMain = old('paid-main');

if(nullValue(old('debt-main')))
    $debtMain = $room->debt_main;
else
    $debtMain = old('debt-main');

if(nullValue(old('all-main')))
    $allMain = $room->all_main;
else
    $allMain = old('all-main');


if(nullValue(old('paid-bums')))
    $paidBums = $room->paid_bums;
else
    $paidBums = old('paid-bums');

if(nullValue(old('debt-bums')))
    $debtBums = $room->debt_bums;
else
    $debtBums = old('debt-bums');

if(nullValue(old('all-bums')))
    $allBums = $room->all_bums;
else
    $allBums = old('all-bums');

if(nullValue(old('comments')))
    $comments = $room->comments;
else
    $comments = old('comments');
?>

@extends('layouts.homeLayout')

@section('content')
    <div class="row col-md-12">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('home.saveRoom') }}">
            <input type="hidden" name="id" value="{{ $room->id }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('room-number') || $errors->has('room-type') ? ' has-error' : '' }}">
                <label for="room-number" class="col-md-2 col-sm-2 control-label">Номер комнаты</label>

                <div class="col-md-4 col-sm-4">
                    <input id="room-number" type="text" class="form-control" name="room-number" value="{{ $roomNumber }}" autofocus>

                    @if ($errors->has('room-number'))
                        <span class="help-block">
                        <strong>{{ $errors->first('room-number') }}</strong>
                    </span>
                    @endif
                </div>

                <label for="room-type" class="col-md-2 col-sm-2 control-label">Тип номера</label>

                <div class="col-md-4 col-sm-4">
                    <select class="selectpicker pull-left" name="room-type" id="room-type">
                        @foreach($roomTypes as $roomTypeF)
                            <option @if($roomTypeF->id == $roomType) selected="selected" @endif guestscount="{{ $roomTypeF->number_of_guests }}" value="{{ $roomTypeF->id }}">{{ $roomTypeF->name . ' (' . $roomTypeF->price . ' руб)'}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group{{ $errors->has('name') || $errors->has('phone') ? ' has-error' : '' }}">
                <label for="name" class="col-md-2 col-sm-2 control-label">Имя</label>

                <div class="col-md-4 col-sm-4">
                    <input id="name" type="text" class="form-control" name="name" value="{{ $name }}">

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>


                <label for="phone" class="col-md-2 col-sm-2 control-label">Телефон</label>

                <div class="col-md-4 col-sm-4">
                    <input id="phone" type="tel" class="form-control" name="phone" value="{{ $phone }}">

                    @if ($errors->has('phone'))
                        <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') || $errors->has('vk-url') ? ' has-error' : '' }}">
                <label for="email" class="col-md-2 col-sm-2 control-label">E-Mail Адрес</label>

                <div class="col-md-4 col-sm-4">
                    <input id="email" type="email" class="form-control" name="email" value="{{ $email }}">

                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>

                <label for="vk-url" class="col-md-2 col-sm-2 control-label">VK</label>

                <div class="col-md-4 col-sm-4">
                    <input id="vk-url" type="text" class="form-control" name="vk-url" value="{{ $vkUrl }}">

                    @if ($errors->has('vk-url'))
                        <span class="help-block">
                        <strong>{{ $errors->first('vk-url') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('room-boss') ? ' has-error' : '' }}">
                <label for="room-boss" class="col-md-2 col-sm-2 control-label">Ответственный</label>

                <div class="col-md-4 col-sm-4">
                    <input id="room-boss" type="text" class="form-control" name="room-boss" value="{{ $roomBoss }}">

                    @if ($errors->has('room-boss'))
                        <span class="help-block">
                        <strong>{{ $errors->first('room-boss') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('passport') || $errors->has('receipt') ? ' has-error' : '' }}">
                <label for="passport" class="col-md-2 col-sm-2 control-label">Паспорт</label>

                <div class="col-md-4 col-sm-4">
                    <input id="passport" type="text" class="form-control" name="passport" value="{{ $passport }}">

                    @if ($errors->has('passport'))
                        <span class="help-block">
                        <strong>{{ $errors->first('passport') }}</strong>
                    </span>
                    @endif
                </div>

                <label for="receipt" class="col-md-2 col-sm-2 control-label">Расписка</label>

                <div class="col-md-4 col-sm-4">
                    <input id="receipt" type="text" class="form-control" name="receipt" value="{{ $receipt }}">

                    @if ($errors->has('receipt'))
                        <span class="help-block">
                        <strong>{{ $errors->first('receipt') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('guests') || $errors->has('bums') ? ' has-error' : '' }}">
                <div class="col-md-6 col-sm-6">
                    <p class="text-uppercase pull-left"><b>Гости</b></p>
                    <textarea id="guests" class="form-control" name="guests">{!! $guests!!}</textarea>

                    @if ($errors->has('guests'))
                        <span class="help-block">
                        <strong>{{ $errors->first('guests') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="col-md-6 col-sm-6">
                    <p class="text-uppercase pull-left"><b>Бомжи</b></p>
                    <textarea id="bums" class="form-control" name="bums">{!! $bums !!}</textarea>

                    @if ($errors->has('bums'))
                        <span class="help-block">
                        <strong>{{ $errors->first('bums') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('food') || $errors->has('transfer') ? ' has-error' : '' }}">
                <div class="col-md-6 col-sm-6">
                    <p class="text-uppercase pull-left"><b>Еда</b></p>
                    <textarea id="food" class="form-control" name="food">{!! $food !!}</textarea>

                    @if ($errors->has('food'))
                        <span class="help-block">
                        <strong>{{ $errors->first('food') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="col-md-6 col-sm-6">
                    <p class="text-uppercase pull-left"><b>Трансфер</b></p>
                    <textarea id="transfer" class="form-control" name="transfer">{!! $transfer !!}</textarea>

                    @if ($errors->has('transfer'))
                        <span class="help-block">
                        <strong>{{ $errors->first('transfer') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="paid-main" class="col-md-2 col-sm-2 control-label">Оплачено</label>

                <div class="col-md-2 col-sm-2">
                    <input id="paid-main" type="text" class="form-control" name="paid-main" value="{{ $paidMain }}">

                    @if ($errors->has('paid-main'))
                        <span class="help-block">
                            <strong>{{ $errors->first('paid-main') }}</strong>
                        </span>
                    @endif
                </div>


                <label for="debt-main" class="col-md-2 col-sm-2 control-label">Долг</label>

                <div class="col-md-2 col-sm-2">
                    <input id="debt-main" type="text" class="form-control" name="debt-main" value="{{ $debtMain }}">

                    @if ($errors->has('debt-main'))
                        <span class="help-block">
                        <strong>{{ $errors->first('debt-main') }}</strong>
                    </span>
                    @endif
                </div>


                <label for="all-main" class="col-md-2 col-sm-2 control-label">Всего</label>

                <div class="col-md-2 col-sm-2">
                    <input id="all-main" type="text" class="form-control" name="all-main" value="{{ $allMain }}">

                    @if ($errors->has('all-main'))
                        <span class="help-block">
                        <strong>{{ $errors->first('all-main') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="paid-bums" class="col-md-2 col-sm-2 control-label">Оплачено Б</label>

                <div class="col-md-2 col-sm-2">
                    <input id="paid-bums" type="text" class="form-control" name="paid-bums" value="{{ $paidBums }}">

                    @if ($errors->has('paid-bums'))
                        <span class="help-block">
                            <strong>{{ $errors->first('paid-bums') }}</strong>
                        </span>
                    @endif
                </div>


                <label for="debt-bums" class="col-md-2 col-sm-2 control-label">Долг Б</label>

                <div class="col-md-2 col-sm-2">
                    <input id="debt-bums" type="text" class="form-control" name="debt-bums" value="{{ $debtBums }}">

                    @if ($errors->has('debt-bums'))
                        <span class="help-block">
                        <strong>{{ $errors->first('debt-bums') }}</strong>
                    </span>
                    @endif
                </div>


                <label for="all-bums" class="col-md-2 col-sm-2 control-label">Всего Б</label>

                <div class="col-md-2 col-sm-2">
                    <input id="all-bums" type="text" class="form-control" name="all-bums" value="{{ $allBums }}">

                    @if ($errors->has('all-bums'))
                        <span class="help-block">
                        <strong>{{ $errors->first('all-bums') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('comments') ? ' has-error' : '' }}">
                <div class="col-md-12 col-sm-12">
                    <p class="text-uppercase pull-left"><b>Коментарий</b></p>
                    <textarea id="comments" class="form-control" name="comments">{!! $comments !!}</textarea>

                    @if ($errors->has('comments'))
                        <span class="help-block">
                        <strong>{{ $errors->first('comments') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4 col-md-offset-4">
                    <button type="submit" class="btn btn-lg btn-danger">
                        Сохранить
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
