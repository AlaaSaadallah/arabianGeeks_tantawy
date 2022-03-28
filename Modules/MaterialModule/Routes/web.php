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

Route::group([
   'prefix' => 'admin/paperTypes',
   // 'middleware' => ['auth:admin'],
   'namespace' => 'Admin'
], function () {
   Route::get('/', 'MaterialAdminController@viewPaperType')->name('admin.material.paperType'); // page view which include datatable
   Route::get('/indexPaperType', 'MaterialAdminController@indexPaperType')->name('admin.material.paperType.index'); // page view which include datatable
   Route::get('/edit/{id}', 'MaterialAdminController@editPaperType')->name('admin.material.paperType.edit'); // page view which include datatable
   Route::post('/update', 'MaterialAdminController@updatePaperType')->name('admin.material.paperType.update'); // page view which include datatable
});
Route::group([
   'prefix' => 'admin/paperSizes',
   // 'middleware' => ['auth:admin'],
   'namespace' => 'Admin'
], function () {
   Route::get('/', 'MaterialAdminController@viewPaperSize')->name('admin.material.paperSize'); // page view which include datatable
   Route::get('/indexPaperSize', 'MaterialAdminController@indexPaperSize')->name('admin.material.paperSize.index'); // page view which include datatable
   Route::get('/edit/{id}', 'MaterialAdminController@editPaperSize')->name('admin.material.paperSize.edit'); // page view which include datatable
   Route::post('/update', 'MaterialAdminController@updatePaperSize')->name('admin.material.paperSize.update'); // page view which include datatable
});

Route::group([
   'prefix' => 'admin/printOption',
   // 'middleware' => ['auth:admin'],
   'namespace' => 'Admin'
], function () {
   Route::get('/', 'MaterialAdminController@viewPrintOption')->name('admin.material.printOption'); // page view which include datatable
   Route::get('/indexPrintOption', 'MaterialAdminController@indexPrintOption')->name('admin.material.printOption.index'); // page view which include datatable
   Route::get('/edit/{id}', 'MaterialAdminController@editPrintOption')->name('admin.material.printOption.edit'); // page view which include datatable
   Route::post('/update', 'MaterialAdminController@updatePrintOption')->name('admin.material.printOption.update'); // page view which include datatable
});

Route::group([
   'prefix' => 'admin/colors',
   // 'middleware' => ['auth:admin'],
   'namespace' => 'Admin'
], function () {
   Route::get('/', 'MaterialAdminController@viewColors')->name('admin.material.colors'); // page view which include datatable
   Route::get('/indexColors', 'MaterialAdminController@indexColors')->name('admin.material.colors.index'); // page view which include datatable
   Route::get('/edit/{id}', 'MaterialAdminController@editColors')->name('admin.material.colors.edit'); // page view which include datatable
   Route::post('/update', 'MaterialAdminController@updateColors')->name('admin.material.colors.update'); // page view which include datatable
});

Route::group([
   'prefix' => 'admin/finishOptions',
   // 'middleware' => ['auth:admin'],
   'namespace' => 'Admin'
], function () {
   Route::get('/', 'MaterialAdminController@viewFinishOptions')->name('admin.material.finishOptions'); // page view which include datatable
   Route::get('/indexFinishOptions', 'MaterialAdminController@indexFinishOptions')->name('admin.material.finishOptions.index'); // page view which include datatable
   Route::get('/edit/{id}', 'MaterialAdminController@editFinishOptions')->name('admin.material.finishOptions.edit'); // page view which include datatable
   Route::post('/update', 'MaterialAdminController@updateFinishOptions')->name('admin.material.finishOptions.update'); // page view which include datatable
});

Route::group([
   'prefix' => 'admin/finishDirections',
   // 'middleware' => ['auth:admin'],
   'namespace' => 'Admin'
], function () {
   Route::get('/', 'MaterialAdminController@viewFinishDirections')->name('admin.material.finishDirections'); // page view which include datatable
   Route::get('/indexFinishDirections', 'MaterialAdminController@indexFinishDirections')->name('admin.material.finishDirections.index'); // page view which include datatable
   Route::get('/edit/{id}', 'MaterialAdminController@editFinishDirections')->name('admin.material.finishDirections.edit'); // page view which include datatable
   Route::post('/update', 'MaterialAdminController@updateFinishDirections')->name('admin.material.finishDirections.update'); // page view which include datatable
});

Route::group([
   'prefix' => 'admin/cuts',
   // 'middleware' => ['auth:admin'],
   'namespace' => 'Admin'
], function () {
   Route::get('/', 'MaterialAdminController@viewCutStyle')->name('admin.material.cutStyle'); // page view which include datatable
   Route::get('/indexCutStyle', 'MaterialAdminController@indexCutStyle')->name('admin.material.cutStyle.index'); // page view which include datatable
   Route::get('/edit/{id}', 'MaterialAdminController@editCutStyle')->name('admin.material.cutStyle.edit'); // page view which include datatable
   Route::post('/update', 'MaterialAdminController@updateCutStyle')->name('admin.material.cutStyle.update'); // page view which include datatable
});

Route::group([
   'prefix' => 'admin/rega',
   // 'middleware' => ['auth:admin'],
   'namespace' => 'Admin'
], function () {
   Route::get('/', 'MaterialAdminController@viewRega')->name('admin.material.rega'); // page view which include datatable
   Route::get('/indexRega', 'MaterialAdminController@indexRega')->name('admin.material.rega.index'); // page view which include datatable
   Route::get('/edit/{id}', 'MaterialAdminController@editRega')->name('admin.material.rega.edit'); // page view which include datatable
   Route::post('/update', 'MaterialAdminController@updateRega')->name('admin.material.rega.update'); // page view which include datatable
});

Route::group([
   'prefix' => 'admin/glue',
   // 'middleware' => ['auth:admin'],
   'namespace' => 'Admin'
], function () {
   Route::get('/', 'MaterialAdminController@viewGlue')->name('admin.material.glue'); // page view which include datatable
   Route::get('/indexGlue', 'MaterialAdminController@indexGlue')->name('admin.material.glue.index'); // page view which include datatable
   Route::get('/edit/{id}', 'MaterialAdminController@editGlue')->name('admin.material.glue.edit'); // page view which include datatable
   Route::post('/update', 'MaterialAdminController@updateGlue')->name('admin.material.glue.update'); // page view which include datatable
});

Route::group([
   'prefix' => 'admin/constants',
   // 'middleware' => ['auth:admin'],
   'namespace' => 'Admin'
], function () {
   Route::get('/', 'MaterialAdminController@viewConstant')->name('admin.material.constants'); // page view which include datatable
   Route::get('/indexGlue', 'MaterialAdminController@indexConstant')->name('admin.material.constants.index'); // page view which include datatable
   Route::get('/edit/{id}', 'MaterialAdminController@editConstant')->name('admin.material.constants.edit'); // page view which include datatable
   Route::post('/update', 'MaterialAdminController@updateConstant')->name('admin.material.constants.update'); // page view which include datatable
});