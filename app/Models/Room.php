<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable=[
        'roomtype_id',
        'room_number',
        'status',
    ];

    public function roomtype()
    {
        return $this->belongsTo(Roomtype::class);
    }
    public function bookings()
{
    return $this->belongsToMany(Booking::class);
}
}
