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

Route::group(['prefix' => 'admin/paperTypes', 
// 'middleware' => ['auth:admin'],
 'namespace' => 'Admin'], function () {
    Route::get('/', 'MaterialAdminController@viewPaperType')->name('admin.material.paperType'); // page view which include datatable
    Route::get('/indexPaperType', 'MaterialAdminController@indexPaperType')->name('admin.material.paperType.index'); // page view which include datatable
    Route::get('/edit/{id}', 'MaterialAdminController@editPaperType')->name('admin.material.paperType.edit'); // page view which include datatable
    Route::post('/update', 'MaterialAdminController@updatePaperType')->name('admin.material.paperType.update'); // page view which include datatable

   });
