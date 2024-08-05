<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoffeeDrink extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',	
        'price'	,
        'rank'	,
        'description',	
        'image',
        'created_by'
    ];
}
