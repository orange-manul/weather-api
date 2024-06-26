<?php

use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/weather', [WeatherController::class, 'showForm']);
Route::post('/weather', [WeatherController::class, 'getWeather']);
Route::get('/weather/{city}', [WeatherController::class, 'getWeather']);
