<?php

namespace App\Http\Controllers;

use App\Room;
use App\RoomType;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $rooms = Room::orderBy('room_number')->paginate(10);

        return view('home.homePage', compact(['rooms']));
    }

    public function searchRoom(Request $request) {
        if(!$request->has('keywords') && !$request->has('room-number-search')){
            return redirect(route('home'));
        }

        $roomNumber ='';
        $keywords = '';

        if(!$request->has('room-number-search')) $roomNumber = 0;
        else $roomNumber = intval($request->get('room-number-search'));
        if(!$request->has('keywords')) $keywords = '%';
        else $keywords = $request->get('keywords');

        $rooms = Room::where(function ($query) use ($roomNumber, $keywords){
            $query->whereRaw('(room_number=? OR ?=0)', [$roomNumber, $roomNumber])
                ->where(function ($query) use ($keywords){
                    $query->where('name', 'like', '%'.$keywords.'%')
                        ->orWhere('guests', 'like', '%'.$keywords.'%')
                        ->orWhere('bums', 'like', '%'.$keywords.'%');
                });
            })
            ->orderBy('room_number')
            ->paginate(10);

        return view('home.homePage', ['rooms' => $rooms->appends(Input::except('page'))]);
    }

    public function removeRoom(Request $request) {
        if (!$request->has('id'))
            return response()->json([
                'success' => false
            ]);

        $room = Room::find(intval($request->get('id')));
        $room->delete();

        return response()->json([
            'success' => true
        ]);
    }

    public function changeRoomNumber(Request $request) {
        if (!$request->has('id') || !$request->has('name') || !$request->has('value'))
            return response()->json([
                'status' => 404,
                'message' => 'No id/name/value parameter',
                'success' => false
            ]);
        if(!$request->get('name') == 'room_number')
            return response()->json([
                'status' => 404,
                'message' => 'Unusual name value: ' . $request->get('name'),
                'success' => false
            ]);

        $room = Room::find(intval($request->get('id')));
        $room->room_number = intval($request->get('value'));
        $room->save();

        return response()->json([
            'status' => 200,
            'success' => true
        ]);
    }

    public function editRoom($id) {
        $room = Room::find(intval($id));
        $roomTypes = RoomType::all();

        return view('home.editRoom', compact(['room', 'roomTypes']));
    }

    public function saveRoom(Request $request){
        $data = $request->all();

        $room = Room::find(intval($data['id']));

        $room->room_number = $data['room-number'];
        $room->room_type = $data['room-type'];
        $room->name = $data['name'];
        $room->vk_url = $data['vk-url'];
        $room->room_boss = $data['room-boss'];
        $room->passport = $data['passport'];
        $room->receipt = $data['receipt'];
        $room->email = $data['email'];
        $room->phone = $data['phone'];

        $room->guests = $data['guests'];
        $room->bums = $data['bums'];
        $room->food = $data['food'];
        $room->transfer = $data['transfer'];

        $room->paid_main = $data['paid-main'];
        $room->debt_main = $data['debt-main'];
        $room->all_main = $data['all-main'];

        $room->paid_bums = $data['paid-bums'];
        $room->debt_bums = $data['debt-bums'];
        $room->all_bums = $data['all-bums'];

        $room->comments = $data['comments'];

        $room->save();

        return redirect()->home();
    }
}
