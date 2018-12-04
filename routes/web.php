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

Route::get('/deblock', 'AdministrationsDeblockController@deblock')->name('deblock');
Route::post('/deblock', 'AdministrationsDeblockController@deblockAdministrations')->name('deblock');

Route::get('/', 'HomeController@welcome')->name('welcome');