<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CoffeeDrink extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title',	
        'price'	,
        'rank'	,
        'description',
        'discount',	
        'image',
        'created_by'
    ];
}
