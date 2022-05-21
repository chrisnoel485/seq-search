<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\LetakController;

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

Route::resource('kategori', KategoriController::class);
Route::resource('jenis', JenisController::class);
Route::resource('merek', MerekController::class);
Route::resource('letak', LetakController::class);
Route::resource('aset', AsetController::class);
Route::get('/search', [KategoriController::class, 'search'])->name('search');
Route::get('/search', [LetakController::class, 'search'])->name('search');
Route::get('/search', [AsetController::class, 'search'])->name('search');

Route::get('/', function () {
    return view('welcome');
});

