<?php

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

use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('frontend.home');
});

Route::get('profil', 'FrontController@userProfile')->name('profile');

Route::get('szukaj', 'FrontController@getGamesBySearch')->name('search');
Route::get('tag/{tag}', 'FrontController@getGamesWithTag')->name('tag');
Route::get('{category}', 'FrontController@getCategory')->name('category');
Route::get('{category}/{game}', 'FrontController@getGame')->name('game');
Route::post('{category}/{game}/ocen-gre', 'FrontController@setRate')->name('rate');

//Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('{category}/{game}/rezerwuj', 'FrontController@reservateView')->name('reservateView');
    Route::post('{category}/{game}/rezerwuj/{user}', 'FrontController@reservate')->name('reservate');
//});

