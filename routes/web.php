<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\StokBarangController;

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

Route::get('/datakonsumen', [KonsumenController::class,'datakonsumen']);
Route::get('/datakonsumen/create', [KonsumenController::class,'create']);
Route::post('/datakonsumen/store', [KonsumenController::class,'store']);
Route::get('/datakonsumen/{id}/edit', [KonsumenController::class,'edit']);
Route::put('/datakonsumen/{id}', [KonsumenController::class,'update']);
Route::delete('/datakonsumen/{id}', [KonsumenController::class,'destroy']);

Route::get('/stok', [StokBarangController::class,'index'])->name('stok');
Route::get('/stok/create', [StokBarangController::class,'createbarang'])->name('createbarang');
Route::post('/stok/store', [StokBarangController::class,'storebarang'])->name('storebarang');

// Route::get('upload-image', [UploadImageController::class, 'index']);
// Route::post('save', [UploadImageController::class, 'save']);
