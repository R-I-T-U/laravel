<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'updated_by',
        'website_name',
        'slogan',
        'logo',
        'favicon',
        'header_logo',
        'footer_logo',
        'address',
        'facebook_link',	
        'insta_link',
        'twitter_link',	
        'about_website'
    ];
}
