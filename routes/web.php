<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\sailorController;
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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// 
Route::get('burtgel','App\Http\Controllers\sailorController@registerForm');
Route::post('burtgel','App\Http\Controllers\sailorController@register');

Route::get('history','App\Http\Controllers\sailorController@showServiceHistory');
Route::get('sailors/{sailor_id}','App\Http\Controllers\sailorController@signOffSailor');


Route::get('ajluud','App\Http\Controllers\userController@jobOffers');
Route::get('ajluud/{id}','App\Http\Controllers\userController@jobOffer');
Route::post('ajluud/{id}','App\Http\Controllers\userController@assignOffer');

require __DIR__.'/auth.php';
