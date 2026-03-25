<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquery extends Model
{
    protected $fillable=[
        'name',
        'email',
        'phone',
        'address',
        'checkin_date',
        'checkout_date',
        'roomtype_id',
        'number_of_rooms',
        'number_of_adults',
        'number_of_children',
        'message',
        'status',
    ];

    public function roomtype()
    {
        return $this->belongsTo(Roomtype::class);
    }
    public function booking()
    {
        return $this->hasOne(Booking::class);
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
