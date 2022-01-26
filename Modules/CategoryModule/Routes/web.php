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
    Route::group(['prefix' => 'category', 'namespace' => 'User'], function () {

    /*************************views route ************************************** */
    Route::get('/brochure', 'CategoryUserController@createBrochure')->name('user.create.brochure');
    Route::get('/largeFolder', 'CategoryUserController@createLargeFolder')->name('user.create.large.folder');
    Route::get('/smallFolder', 'CategoryUserController@createSmallFolder')->name('user.create.small.folder');

});
