<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'updated_by',	'website_name',	'slogan',	'logo',	'favicon',	'feature_image',	'address',	'email',	'phone1',	'phone2',	'branch1','branch2','branch3',	'facebook_link',	'insta_link',	'twitter_link',	'desc_heading',	'description'

    ];
}
