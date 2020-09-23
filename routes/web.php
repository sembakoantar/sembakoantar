<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;

//use App\Http\Controllers;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', [BerandaController::class, 'index']);
Route::get('/shopdetail', [BerandaController::class, 'detail']);
Route::get('/shopcategory', [BerandaController::class, 'category']);

//Route::get('category', 'App/Http/Controllers/BerandaController@index');
Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function(){
    Route::get('dashboard',[App\Http\Controllers\HomeController::class, 'index']);
});