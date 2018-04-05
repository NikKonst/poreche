
@extends('layouts.homeLayout')

@section('content')
    <div class="row col-md-12">
        <table class="table table-striped custab">
            <thead>
            <div class="form-group form-inline pull-left">
                <form action="{{ route('home.searchRoom') }}" method="get">
                    <input placeholder="Номер комнаты" type="number" class="form-control" id="room-number-search"
                           name="room-number-search" value="{{ app('request')->input('room-number-search') }}">

                    <input placeholder="Имя" type="text" class="form-control" id="keywords" name="keywords"
                           value="{{ app('request')->input('keywords') }}">

                    {{--<input placeholder="Тип" type="number" class="form-control" id="room-type" name="room-type"--}}
                           {{--value="{{ app('request')->input('room-type') }}">--}}

                    <select class="form-control" name="room-type" id="room-type">
                        <option value="0">не выбрано</option>
                        <option value="1">2 местный</option>
                        <option value="2">3 местный</option>
                        <option value="3">4 местный</option>
                        <option value="4">люкс</option>
                    </select>

                    <input type="submit" class="btn btn-md btn-primary" value="Поиск">
                </form>
                <a href="#" id="clear-search" class="btn btn-primary btn-md">Очистить поиск</a>
            </div>
            <a href="{{ route('room-register') }}" class="btn btn-primary btn-md pull-right"><b>+</b> Добавить</a>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
               class="btn btn-primary btn-md pull-right">Выйти</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form></select>
            <tr>
                <th class="text-center">Номер комнаты</th>
                <th class="text-center">Тип номера</th>
                <th class="text-center">Имя</th>
                <th class="text-center">Паспорт</th>
                <th class="text-center">Нет долга</th>
                <th class="text-center">Действия</th>
            </tr>
            </thead>
            @foreach($rooms as $room)
                <tr id="{{ $room->id }}">
                    <td><a href="#" id="room_number">{{ $room->room_number }}</a></td>
                    <td>{{ $room->room_type_model->name }}</td>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->passport }}</td>
                    <td>
                        @if($room->debt_main == 0 && $room->debt_bums == 0)
                            <span class="glyphicon glyphicon-ok" style="color: #00ff00;"></span>
                        @else
                            <span class="glyphicon glyphicon-remove" style="color: #ff0000;"></span>
                        @endif
                    </td>
                    <td class="text-center"><a title="Изменить" class="btn btn-info btn-xs" href="{{ route('home.editRoom', $room->id) }}"><span class="glyphicon glyphicon-edit"></span></a> <a title="Удалить" href="#" onclick="removeRoom({{ $room->id }});" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a></td>
                </tr>
            @endforeach
        </table>
        {{ $rooms->links() }}
        <script>
            function removeRoom(id) {
                $.ajax({
                    url: '{{ route('home.removeRoom') }}',
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id,
                    },
                    dataType: 'JSON',
                    success: function(result){
                        console.log(result);
                        if(result['success']){
                            $('tr#'+id).fadeOut(function () {
                                this.remove();
                            });
                        }
                    },
                    error: function (result) {
                        alert('Error: '+result);
                    }
                });
            }

            $(document).ready(function() {
                $('a#room_number').each(function () {
                    $(this).editable({
                        type: 'text',
                        pk: 1,
                        url: '{{ route('home.changeRoomNumber') }}',
                        params: function (params) {
                            params._token = '{{ csrf_token() }}';
                            params.id = $(this).parent().parent().attr('id');
                            return params;
                        },
                        title: 'Номер комнаты',
                        ajaxOptions: {
                            type: 'post',
                            dataType: 'json'
                        },
                    });
                });
            });

            $('#clear-search').click(function () {
                $('#room-number-search').val('');
                $('#keywords').val('');
                window.location.href = '{{ route('home') }}';
            });
        </script>
    </div>
@endsection
