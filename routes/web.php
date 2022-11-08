<?php

use App\Http\Controllers\DishController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware(['auth'])->group(function (){
    Route::resources([
        'restaurants'=> RestaurantController::class,
        'dishes'=> DishController::class
    ]);
    Route::get('restaurants/{id}/dishes', [DishController::class, 'restaurantDishes'])->name('restaurantDishes');
});






Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
