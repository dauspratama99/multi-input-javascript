<?php

use App\Http\Controllers\BarangController;
use Database\Seeders\KategroiSeeder;
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

Route::get('/', [BarangController::class, 'index']);
Route::get('/tampil', [BarangController::class, 'tampil']);

Route::post('/prosestambah', [BarangController::class, 'prosesTambah'])->name('proses.tambah');

// Route::get('editbarang/{id}', [BarangController::])
