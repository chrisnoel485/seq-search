<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\KategoriController;
//use App\Http\Controllers\MerekController;
//use App\Http\Controllers\JenisController;
//use App\Http\Controllers\LetakController;
//use App\Http\Controllers\AsetController;
//use App\Http\Controllers\Auth\LoginController;
//use App\Http\Controllers\HomeController;
//use App\Http\Controllers\RoleController;
//use App\Http\Controllers\UserController;


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
    Route::resource('/role', 'RoleController');
    Route::resource('/kategori', 'KategoriController');
    Route::resource('/jenis', 'JenisController');
    Route::resource('/merek', 'MerekController');
    Route::resource('/letak', 'LetakController');
    Route::resource('/aset', 'AsetController');
    Route::resource('/users', 'UserController')->except([
        'show'
    ]);


    //Route::resource('role', RoleController::class);
    //Route::resource('kategori', KategoriController::class);
    //Route::resource('jenis', JenisController::class);
    //Route::resource('merek', MerekController::class);
    //Route::resource('letak', LetakController::class);
    //Route::resource('aset', AsetController::class);
    //Route::resource('users', UserController::class);

    Route::get('/users/roles/{id}', 'UserController@roles')->name('users.roles');
    Route::put('/users/roles/{id}', 'UserController@setRole')->name('users.set_role');
    Route::post('/users/permission', 'UserController@addPermission')->name('users.add_permission');
    Route::get('/users/role-permission', 'UserController@rolePermission')->name('users.roles_permission');
    Route::put('/users/permission/{role}', 'UserController@setRolePermission')->name('users.setRolePermission');
    
    Route::get('/search', 'KategoriController@search')->name('search');
    Route::get('/search', 'LetakController@search')->name('search');
    Route::get('/search', 'AsetController@search')->name('usearch');

    //Route::get('/search', [KategoriController::class, 'search'])->name('search');
    //Route::get('/search', [LetakController::class, 'search'])->name('search');
    //Route::get('/search', [AsetController::class, 'search'])->name('search'); 
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});