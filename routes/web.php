<?php

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



Auth::routes(['register' => false]);

Route::middleware('auth')
    ->namespace('Admin')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', 'HomeController@index');
        Route::resource('/customers/offers', 'OfferController');
        Route::resource('/customers/files', 'FileController');
        Route::put('/customers/updatetags/{customer}', 'CustomerController@updateTags')->name('customers.updatetags');
        Route::resource('/customers', 'CustomerController');
    });

Route::get('{any?}', function () {
    return view('guests.home');
})->where('any', '.*');
