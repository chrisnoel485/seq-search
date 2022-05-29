<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\LetakController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;


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




Route::get('/', function() {
    return redirect(route('login'));
});

Auth::routes();
Route::group(['middleware' => 'auth'], function() {
    Route::resource('role', RoleController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('jenis', JenisController::class);
    Route::resource('merek', MerekController::class);
    Route::resource('letak', LetakController::class);
    Route::resource('aset', AsetController::class);
    Route::resource('user', UserController::class);
    Route::get('/user/{user}/role', 'UserController@role')->name('user.role');
    //Route::get('/user/role/{id}', 'UserController@role')->name('user.role');
    Route::get('/search', [KategoriController::class, 'search'])->name('search');
    Route::get('/search', [LetakController::class, 'search'])->name('search');
    Route::get('/search', [AsetController::class, 'search'])->name('search'); 
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});