use App\Http\Controllers\TemperatureController;

Route::post('/temperature', [TemperatureController::class, 'store']);
Route::get('/temperature', [TemperatureController::class, 'index']);