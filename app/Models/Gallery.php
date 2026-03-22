<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable=[
        'image',
        'roomtype_id',
    ];

    public function roomtype()
    {
        return $this->belongsTo(Roomtype::class);
    }
}
