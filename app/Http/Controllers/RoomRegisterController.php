<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Room;
use App\RoomType;

class RoomRegisterController extends Controller
{
    public function index() {
        $isMainReg = True;
        $success = False;

        $roomTypes = RoomType::all();
        $maxGuestsRoom = RoomType::where('number_of_guests', '>', 0)
            ->orderBy('number_of_guests', 'desc')->first();

        $maxGuestsCount = $maxGuestsRoom->number_of_guests;

        return view('roomRegister', compact(['roomTypes', 'maxGuestsCount', 'isMainReg', 'success']));
    }

    public function indexSuccess() {
        $success = True;
        return view('roomRegister', compact(['roomTypes', 'maxGuestsCount', 'isMainReg', 'success']));
    }

    protected function validator(array $data) {
        return Validator::make($data, [
            'first-name' => 'required|string|max:255',
            'second-name' => 'required|string|max:255',
            'food' => 'required|string|max:3',
            'transfer' => 'required|string|max:3',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255',
            'vk-url' => 'required|string|max:255',
            //'room-boss' => 'required|string|max:255',
            'room-type' => 'required|integer',
            'guests' => 'required|array',
            'guests-food' => 'required|array',
            'guests-transfer' => 'required|array',
        ]);
    }

    public function registerRoom(Request $request) {
        $this->validator($request->all())->validate();
        $data = $request->all();

        $room = new Room;
        $room->room_type = $data['room-type'];
        $room->name = $data['first-name'] . ' ' . $data['second-name'];
        $room->vk_url = $data['vk-url'];
        $room->room_boss = ''; //$data['room-boss'];
        $room->email = $data['email'];
        $room->phone = $data['phone'];

        $allGuests = '';
        $allFood = '';
        $allTransfer = '';
        $allVKGuests = '';
        $allPhoneGuests = '';
        

        if(isset($data['food']) && $data['food'] == 'on')
            $allFood = $room->name . '&#13;&#10;';
        if(isset($data['transfer']) && $data['transfer'] == 'on')
            $allTransfer = $room->name . '&#13;&#10;';

        foreach ($data['guests'] as $guestNO=>$guest){
            $allGuests = $allGuests . $guest . '&#13;&#10;';
            if(isset($data['guests-food']) && $data['guests-food'][$guestNO] == 'on')
                $allFood = $allFood . $guest . '&#13;&#10;';
            if(isset($data['guests-transfer']) && $data['guests-transfer'][$guestNO] == 'on')
                $allTransfer = $allTransfer . $guest . '&#13;&#10;';
        }

        foreach ($data['vk-guests'] as $vkguestNO=>$vkguest) {
            $allVKGuests = $allVKGuests . $vkguest . '&#13;&#10;';
        }

        foreach ($data['phone-guests'] as $phoneguestNO=>$phoneguest) {
            $allPhoneGuests = $allPhoneGuests . $phoneguest . '&#13;&#10;';
        }

        $room->guests = $allGuests;
        $room->food = $allFood;
        $room->transfer = $allTransfer;
        $room->vk_guests = $allVKGuests;
        $room->phone_guests = $allPhoneGuests;

        $room->save();

        $emailData = [
            'first_name' => $data['first-name'],
            'second_name' => $data['second-name'],
            'room_type' => $room->room_type_model->name . ' (' . $room->room_type_model->price . ' руб) ',
            'guests' => $room->guests,
        ];

        Mail::send('emails.successReg', $emailData, function ($message) use ($data) {
            $message->from('poreche34@yandex.ru', 'Poreche');
            $message->to($data['email']);

            $message->subject('Успешная регистрация');
        });

        return redirect(route('room-register-success'));

    }
}
