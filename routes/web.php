<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CoffeeDrinkController;
use App\Http\Controllers\Frontend\CoffeeController;
use App\Http\Controllers\Backend\CustomerReviewController;
use App\Http\Controllers\Backend\ReservationController;


//login route start
Route::get('/login',function (){
    return view('user.login');
})->name('login');

Route::post('login/verify',[\App\Http\Controllers\UserController::class,'verifyUser'])->name('login.verification');
Route::get('logout',[\App\Http\Controllers\UserController::class,'logout'])->name('logout');

Route::get('/backend/dashboard',function (){
    return view('backend.dashboard');
})->name('backend.dashboard')->middleware('auth');
//login route end


//coffee
Route::get('backend/coffee/create',[CoffeeDrinkController::class,'create'])->name('backend.coffee.create')->middleware('auth');
Route::post('backend/coffee',[CoffeeDrinkController::class,'store'])->name('backend.coffee.store')->middleware('auth');

Route::get('backend/coffee',[CoffeeDrinkController::class,'index'])->name('backend.coffee.index');


Route::get('backend/coffee/{id}',[CoffeeDrinkController::class,'show'])->name('backend.coffee.show');
Route::delete('backend/coffee/{id}',[CoffeeDrinkController::class,'destroy'])->name('backend.coffee.destroy');
Route::get('backend/coffee/{id}/edit',[CoffeeDrinkController::class,'edit'])->name('backend.coffee.edit');
Route::put('backend/coffee/{id}',[CoffeeDrinkController::class,'update'])->name('backend.coffee.update');


//frontend
Route::get('/', [CoffeeController::class, 'index'])->name('frontend.coffee');

//review
Route::get('backend/review/create',[CustomerReviewController::class,'create'])->name('backend.review.create')->middleware('auth');
Route::post('backend/review',[CustomerReviewController::class,'store'])->name('backend.review.store')->middleware('auth');
Route::get('backend/review',[CustomerReviewController::class,'index'])->name('backend.review.index');
Route::delete('backend/review/{id}',[CustomerReviewController::class,'destroy'])->name('backend.review.destroy');
Route::get('backend/review/{id}/edit',[CustomerReviewController::class,'edit'])->name('backend.review.edit');
Route::put('backend/review/{id}',[CustomerReviewController::class,'update'])->name('backend.review.update');


//reservations
Route::get('reservations/create', [ReservationController::class, 'create'])->name('backend.reservation.create');
Route::post('reservations', [ReservationController::class, 'store'])->name('backend.reservation.store');
Route::get('reservations',[ReservationController::class,'index'])->name('backend.reservation.index');
Route::delete('backend/reserve/{id}',[ReservationController::class,'destroy'])->name('backend.reservation.destroy');

//setting
Route::get('setting',[ReservationController::class,'index'])->name('backend.setting.index');
