<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
//        'room_number',
//        'room_type',
//        'name',
//        'vk_url',
//        'room_boss',
//        'email',
//        'phone',
//        'guests',
//        'bums',
//        'food',
//        'transfer',
//        'paid_main',
//        'debt_main',
//        'all_main',
//        'paid_bums',
//        'debt_bums',
//        'all_bums',
    ];

    public function room_type_model() {
        return $this->belongsTo('App\RoomType', 'room_type', 'id');
    }
}
