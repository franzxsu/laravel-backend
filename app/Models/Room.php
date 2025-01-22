<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';

    protected $primaryKey = 'room_id';

    protected $fillable = [
        'reservation_id', 
        'room_type', //enum (Fan Room, Dormitory, Standard)
        'room_subtype', //enum (Twin, Triple, Family)
        'bed_capacity',
        'rate', //rate in what? per night?
        'room_status' //enum (occupied, vacant)
    ];
}
