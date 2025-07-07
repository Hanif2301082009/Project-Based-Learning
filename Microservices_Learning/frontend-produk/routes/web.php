<?php

use Illuminate\Support\Facades\Route; 
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\ProdukController;

Route::get('/', function () {
    return view('welcome');
});

// Route ambil semua produk dari microservice
// Route::get('/produk', function () {
//     $response = Http::get(env('PRODUCT_SERVICE_URL') . '/api/produk');

//     // Jika gagal, tampilkan error
//     if ($response->failed()) {
//         abort(500, 'Gagal mengakses produk service');
//     }

//     // Kirim data ke view
//     $produk = $response->json();
//     return view('produk.index', compact('produk'));
// });
// Route::get('/produk', [ProdukController::class, 'index']);
// Route::get('/produk/create', [ProdukController::class, 'create']);
// Route::post('/produk', [ProdukController::class, 'store']);
// Route::get('/produk/{id}/edit', [ProdukController::class, 'edit']);
// Route::put('/produk/{id}', [ProdukController::class, 'update']);
// Route::delete('/produk/{id}', [ProdukController::class, 'destroy']);


Route::get('produk/create',[ProdukController::class,'create'])
->name('produks.create');
Route::post('produk',[ProdukController::class,'store'])
->name('produks.store');
Route::get('produk',[ProdukController::class,'index'])
->name('produks.index');
Route::get('produk/{id}/edit',[ProdukController::class,'edit'])
->name('produks.edit');
Route::put('produk/{id}',[ProdukController::class,'update'])
->name('produks.update');
Route::delete('produk/{id}',[ProdukController::class,'destroy'])
->name('produks.destroy');