<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CoffeeDrink;
use App\Models\CustomerReview;


class CoffeeController extends Controller
{
    public function index()
    {
        $coffees = CoffeeDrink::all();
        $reviews = CustomerReview::all();
        return view('frontend.coffee', compact('coffees','reviews')); 
    }
}
