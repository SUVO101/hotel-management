<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roomtype extends Model
{
    protected $fillable=[
        'name',
        'cover_image',
        'description',
        'price_per_room',
        'terms_and_conditions',
        'is_active',
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    // public function ratings()
    // {
    //     return $this->hasMany(Rating::class);
    // }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class);
    }
}
