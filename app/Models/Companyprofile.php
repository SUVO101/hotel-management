<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Companyprofile extends Model
{
   protected $fillable=[
    'name',
    'phone1',
    'phone2',
    'email',
    'logo',
    'favicon',
    'gst_number',
    'location',
    'fb_link',
    'insta_link',
    'twitter_link',
    'youtube_link',
    'whatsapp_link',
    'meta_title',
    'meta_description',
    'meta_keywords',
    'terms_and_conditions',
   ];
}
