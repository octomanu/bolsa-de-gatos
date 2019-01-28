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

Route::get('/whitelist', 'AdministrationsDeblockController@whitelist')->name('whitelist');
Route::get('/whitelist/{id}', 'AdministrationsDeblockController@whitelistAdmin')->name('whitelist');
Route::post('/saveNoteWhitelist', 'AdministrationsDeblockController@saveNoteWhitelist')->name('saveNoteWhitelist');

Route::get('/administraciones', 'RemitoController@listadosAdministraciones')->name('listadosAdministraciones');
Route::get('/remito/{id}', 'RemitoController@armarRemito')->name('remito');
Route::post('/remito/{id}', 'RemitoController@printRemito')->name('remito');

Route::get('/usuarios', 'RoleController@usuarios')->name('usuarios');
Route::get('/roles/{id}', 'RoleController@roles')->name('roles');
Route::get('/roles/{id}/asignar/{idRol}', 'RoleController@asignRoles')->name('roles');
Route::get('/crearRol', 'RoleController@createRol')->name('crearRol');
Route::post('/crearRol', 'RoleController@storeRol')->name('crearRol');

Route::get('/report', 'ReportController@whitelistAdministrations')->name('report');
Route::get('/busqueda', 'ReportController@search')->name('report');
Route::post('/busqueda', 'ReportController@searchBy')->name('report');

Route::get('/administracion/{id}', 'ReportController@infoAdministration')->name('search');
Route::get('/consorcio/{id}', 'ReportController@infoConsortium')->name('search');

Route::get('/tags/{id}', 'TagsController@printTags')->name('tags');

Route::get('/heartbeat.php', function () {
    return 'OK';
});


//Testing Routes From API
Route::group(['prefix' => 'api', 'namespace' => 'Api'], function () {
    Route::post('login', 'AuthController@authenticate');
});
