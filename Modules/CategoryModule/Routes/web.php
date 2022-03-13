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

// Route::prefix('category')->group(function() {
    Route::group(['prefix' => 'category', 'middleware'=>['auth:customer'],'namespace' => 'User'], function () {

    /*************************views route ************************************** */
    Route::get('/blocknote', 'CategoryUserController@createBlocknote')->name('user.create.blocknote');
    Route::get('/book', 'CategoryUserController@createBook')->name('user.create.book');
    Route::get('/brochure', 'CategoryUserController@createBrochure')->name('user.create.brochure');
    Route::get('/calender', 'CategoryUserController@createCalender')->name('user.create.calender');
    Route::get('/copybook', 'CategoryUserController@createCopybook')->name('user.create.copybook');
    Route::get('/envelope', 'CategoryUserController@createEnvelope')->name('user.create.envelope');
    Route::get('/flyer', 'CategoryUserController@createFlyer')->name('user.create.flyer');
    Route::get('/largeFolder', 'CategoryUserController@createLargeFolder')->name('user.create.large.folder');
    Route::get('/letterhead', 'CategoryUserController@createLetterhead')->name('user.create.letterhead');
    Route::get('/magazine', 'CategoryUserController@createMagazine')->name('user.create.magazine');
    Route::get('/prescription', 'CategoryUserController@createPrescription')->name('user.create.prescription');
    Route::get('/ramadan', 'CategoryUserController@createRamadan')->name('user.create.ramadan');
    Route::get('/smallFolder', 'CategoryUserController@createSmallFolder')->name('user.create.small.folder');
    Route::get('/sticker', 'CategoryUserController@createSticker')->name('user.create.sticker');

});
