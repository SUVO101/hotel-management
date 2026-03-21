<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable=[
        'name',
        'icon',
        'is_active',
    ];

    public function roomtypes()
    {
        return $this->belongsToMany(Roomtype::class);
    }
}
