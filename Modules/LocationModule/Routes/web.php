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

use Illuminate\Support\Facades\Route;
Route::group(['prefix' => 'admin/cities', 
// 'middleware' => ['auth:admin'],
 'namespace' => 'Admin'], function () {
    Route::get('/', 'CityAdminController@index')->name('admin.cities');
    Route::get('/index', 'CityAdminController@indexCities')->name('admin.cities.index');
    Route::get('/create', 'CityAdminController@create')->name('admin.cities.create');
    Route::post('/store', 'CityAdminController@store')->name('admin.cities.store');
    Route::get('/edit/{id}', 'CityAdminController@edit')->name('admin.cities.edit');
    Route::post('/update', 'CityAdminController@update')->name('admin.cities.update');

});
