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

// admin stuff
Route::get('burtgel','App\Http\Controllers\sailorController@registerForm')->middleware('auth', 'role:admin')->name('burtgel');
Route::post('burtgel','App\Http\Controllers\sailorController@register')->middleware('auth', 'role:admin', 'XSS');

Route::get('history','App\Http\Controllers\sailorController@showServiceHistory')->middleware('auth', 'role:admin')->name('history');

Route::get('sailors/{sailor_id}','App\Http\Controllers\sailorController@editSailor')->middleware('auth', 'role:admin');
Route::post('sailors/{sailor_id}','App\Http\Controllers\sailorController@updateSailor')->middleware('auth', 'role:admin', 'XSS');

Route::get('sailors', 'App\Http\Controllers\userController@sailorList')->middleware('auth', 'role:admin')->name('sailors');
Route::get('ajluud','App\Http\Controllers\userController@jobOffers')->middleware('auth', 'role:admin')->name('ajluud');
Route::get('ajluud/{id}','App\Http\Controllers\userController@jobOffer')->middleware('auth', 'role:admin');
Route::post('ajluud/{id}','App\Http\Controllers\userController@assignOffer')->middleware('auth', 'role:admin', 'XSS');

// company route

Route::get('mycompany', 'App\Http\Controllers\companyController@getSailors')->middleware('auth', 'role:company')->name('mycompany');

//sailor route

Route::get('company', 'App\Http\Controllers\sailController@getCompany')->middleware('auth', 'role:sailor')->name('company');


require __DIR__.'/auth.php';
