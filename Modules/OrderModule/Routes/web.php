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

//     /*************************views route ************************************** */
//     Route::post('store', 'OrderUserController@storeBrochure')->name('user.order.store'); // add new orderaction
//     Route::post('storeFolder', 'OrderUserController@storeLargeFolder')->name('user.order.storeFolder'); // add new orderaction
//     // Route::post('storeSmallFolder', 'OrderUserController@storeSmallFolder')->name('user.order.storeFolder'); // add new orderaction
//     Route::post('storeFlyer', 'OrderUserController@storeFlyer')->name('user.order.storeFlyer'); // add new orderaction
//     Route::post('storeLetterhead', 'OrderUserController@storeLetterhead')->name('user.order.storeLetterhead'); // add new orderaction
//     Route::post('storeSticker', 'OrderUserController@storeSticker')->name('user.order.storeSticker'); // add new orderaction
//     Route::post('storeBlocknote', 'OrderUserController@storeBlocknote')->name('user.order.storeBlocknote'); // add new orderaction
//     Route::post('storePrescription', 'OrderUserController@storePrescription')->name('user.order.storePrescription'); // add new orderaction
//     Route::post('storeEnvelope', 'OrderUserController@storeEnvelope')->name('user.order.storeEnvelope'); // add new orderaction
//     Route::post('storeCopybook', 'OrderUserController@storeCopybook')->name('user.order.storeCopybook'); // add new orderaction

    Route::post('filterPaperTypes/{cat_id}/{size_id}', 'OrderUserController@filterPaperTypes')->name('user.order.filterPaperTypes'); // add new orderaction
});