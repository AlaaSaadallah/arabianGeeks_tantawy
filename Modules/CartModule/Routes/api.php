<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customer/cart', 'middleware' => 'auth:api'], function () {

    Route::post('/add', 'Api\CartCustomerApiController@addItem');
    Route::post('/update', 'Api\CartCustomerApiController@updateItem');
    Route::post('/remove', 'Api\CartCustomerApiController@removeItem');
    Route::get('/listItems', 'Api\CartCustomerApiController@listItems');
});
