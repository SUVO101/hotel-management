<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable=[
        'enquery_id',
        'checkin_date',
        'checkout_date',
        'total_amount',
        'paid_amount',
        'remaining_amount',
        'is_checkin',
        'is_checkout',
        'status',
    ];

    // --off kore diyechi
    // public function roomtype()
    // {
    //     return $this->belongsTo(Roomtype::class);
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    public function enquery()
    {
        return $this->belongsTo(Enquery::class);
    }
    public function rooms()
{
    return $this->belongsToMany(Room::class);
}

}
