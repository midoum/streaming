<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Thumbnails;
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

Route::get('/', function (){
    return view('welcome');
});
Route::get('/streaming/streaming/public/shows', [HomeController::class,'__construct']);
Route::get('/streaming/streaming/public/play', [HomeController::class,'play']);
Route::get('/streaming/streaming/public/season', [HomeController::class,'show_season']);
Route::get('/streaming/streaming/public/thumb', [Thumbnails::class,'__construct']);