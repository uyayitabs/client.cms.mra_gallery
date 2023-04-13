<?php

use App\Http\Controllers\IndexController;
use App\Mail\VerifyAccountMail;
use App\Models\Event;
use App\Models\Photo;
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

Route::group(['prefix' => 'gallery'], function () {
    Voyager::routes();
});

Route::get('/event_id?', '\App\Http\Controllers\IndexController@index');

// Route::get('/test', function()
// {	
// 	Mail::to('foo@example.com', 'John Smith')
// 		->send(new VerifyAccountMail());
// });