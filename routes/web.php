<?php

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


Auth::routes();
//
Route::get('/', 'HomeController@index')->name('home');
// Owner route
Route::resource('/owner', 'OwnerController');
//Route::resource('/owner/image', 'OwnerController@image');
Route::get('/search/owner', 'OwnerController@search');

//for update owner image
Route::post('/image/owner/{id}', 'OwnerController@image')->name('owner.image');




//// Driver route
Route::resource('/driver', 'DriverController');
Route::get('/search/driver', 'DriverController@search');




//for printer

Route::resource('/printer', 'PrintController');

// owner informations for card print
Route::get('/print/new/owners', 'PrintController@newPrintAbleOwners')->name('print.new.owner');
Route::get('/print/renew/owners', 'PrintController@renewAbleOwners')->name('print.renew.owner');
Route::get('/print/owner/{id}', 'PrintController@printOwnerCard')->name('owner.print');



