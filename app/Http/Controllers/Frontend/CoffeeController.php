<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CoffeeDrink;
use App\Models\CustomerReview;

class CoffeeController extends Controller
{
    public function index()
    {
        $coffees = CoffeeDrink::orderBy('rank')->get();
        $reviews = CustomerReview::orderBy('rank')->get();
        return view('frontend.coffee', compact('coffees','reviews')); 
    }
}
