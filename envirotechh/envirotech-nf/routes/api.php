use App\Http\Controllers\TemperatureController;
use App\Http\Controllers\TdsController;

Route::get('/tds', [TdsController::class, 'index']);


Route::post('/temperature', [TemperatureController::class, 'store']);
Route::get('/temperature', [TemperatureController::class, 'index']);
Route::prefix('temperature')->group(function () {
    Route::get('/', [TemperatureController::class, 'index']);
    Route::get('/{id}', [TemperatureController::class, 'show']);
    Route::post('/', [TemperatureController::class, 'store']);
    Route::put('/{id}', [TemperatureController::class, 'update']);
    Route::delete('/{id}', [TemperatureController::class, 'destroy']);

});