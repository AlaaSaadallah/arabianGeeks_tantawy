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

// Route::prefix('customermodule')->group(function() {

use Illuminate\Support\Facades\Route;
Route::group(['prefix' => 'admin/customers', 
// 'middleware' => ['auth:admin'],
 'namespace' => 'Admin'], function () {
    Route::get('/', 'CustomerAdminController@index')->name('admin.customers');
    Route::get('/index', 'CustomerAdminController@indexCustomers')->name('admin.customers.index');
    Route::get('/create', 'CustomerAdminController@create')->name('admin.customers.create');
    Route::post('/store', 'CustomerAdminController@store')->name('admin.customers.store');
    Route::get('/edit/{id}', 'CustomerAdminController@edit')->name('admin.customers.edit');
    Route::post('/update', 'CustomerAdminController@update')->name('admin.customers.update');

});
