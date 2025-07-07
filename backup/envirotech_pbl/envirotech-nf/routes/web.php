<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemperatureController;
use App\Http\Controllers\TdsController;
use App\Http\Controllers\PhController;


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


// Route::get('/temperature', [TemperatureController::class, 'index']);
// Route::get('/temperature/{id}', [TemperatureController::class, 'show']);
// Route::post('/temperature', [TemperatureController::class, 'store']);
// Route::put('/temperature/{id}', [TemperatureController::class, 'update']);
// Route::delete('/temperature/{id}', [TemperatureController::class, 'destroy']);

// Route::get('/tds', [TdsController::class, 'index']);
// Route::get('/tds/{id}', [TdsController::class, 'show']);
// Route::post('/tds', [TdsController::class, 'store']);
// Route::put('/tds/{id}', [TdsController::class, 'update']);
// Route::delete('/tds/{id}', [TdsController::class, 'destroy']);

Route::resource('temperature', TemperatureController::class)->only([
    'index', 'show', 'store', 'update', 'destroy'
]);


Route::prefix('ph')->group(function () {
    Route::get('/', [PhController::class, 'index'])->name('ph.index');
});
Route::prefix('tds')->group(function () {
    Route::get('/', [TdsController::class, 'index'])->name('tds.index');
});

Route::get('/temperature/chart', [TemperatureController::class, 'chartData']);
Route::get('/ph/chart', [PhController::class, 'chartData']);
Route::get('/tds/chart', [TdsController::class, 'chartData']);

Route::get('/readings/history', [DashboardController::class, 'getRecentReadings']);



