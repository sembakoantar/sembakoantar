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

//Route Web e gak admin
Route::get('/home', [BerandaController::class, 'index']);
Route::get('/shopdetail', [BerandaController::class, 'detail']);
Route::get('/shopcategory', [BerandaController::class, 'category']);
Route::get('/template', [BerandaController::class, 'template']);
Route::get('/cobacontent', [BerandaController::class, 'cobacontent']);

//Route::get('category', 'App/Http/Controllers/BerandaController@index');
Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function(){
    Route::get('dashboard',[App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');
    Route::resource('category',App\Http\Controllers\CategoryController::class);
    Route::resource('product',App\Http\Controllers\ProductController::class);
    Route::get('transaction',[App\Http\Controllers\TransactionController::class, 'index'])->name('admin.transaction');
    Route::get('detail',[App\Http\Controllers\TransactionController::class, 'detail'])->name('transaction.detail');
    Route::get('transaction/{code}/{status}',[App\Http\Controllers\TransactionController::class, 'status']);
    Route::get('transaction/{code}',[App\Http\Controllers\TransactionController::class, 'detail']);
});