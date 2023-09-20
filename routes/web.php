<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
})->middleware('guest');

Route::get('/transfer', function () {
    return view('transfer-history');
})->middleware('auth')->name('transfer.history');

Auth::routes(['register' => false ]);


Route::controller(\App\Http\Controllers\UserController::class)->middleware('auth')->group(function ()
{
   Route::get('/dashboard','index')->name('dashboard');
   Route::get('/show/{id}','show')->name('user.show');
   Route::get('/transfer/{id}','transfer')->name('transfer');
   Route::post('/transfer/{id}','transferPost')->name('transfer.amount');


});




