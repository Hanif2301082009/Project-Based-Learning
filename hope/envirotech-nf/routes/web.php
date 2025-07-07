<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemperatureController;


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
    return view('dashboard');
})->name('dashboard');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');

Route::get('/about', function () {
    return view('about');
})->name('about');



Route::post('/temperature', [TemperatureController::class, 'store']);
Route::get('/temperature', [TemperatureController::class, 'index']);
