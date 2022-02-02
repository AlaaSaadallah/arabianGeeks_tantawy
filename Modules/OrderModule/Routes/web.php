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


Route::group(['prefix' => 'order', 'namespace' => 'User'], function () {

    /*************************views route ************************************** */
    Route::post('store', 'OrderUserController@storeBrochure')->name('user.order.store'); // add new orderaction
    Route::post('storeFolder', 'OrderUserController@storeLargeFolder')->name('user.order.storeFolder'); // add new orderaction
    Route::post('filterPaperTypes/{id}', 'OrderUserController@filterPaperTypes')->name('user.order.filterPaperTypes'); // add new orderaction
});