<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable=[
        'name',
        'rating',
        'review',
        'is_approved',
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function roomtype()
    {
        return $this->belongsTo(Roomtype::class);
    }
}
