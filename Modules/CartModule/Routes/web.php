<?php

use Illuminate\Support\Facades\Route;

// Route::get('cart/add', 'CartModuleController@addCartAjax');
// Route::get('cart/removeItem/{product_id}', 'CartModuleController@removeProductFromCartAjax');

// Route::group(['middleware' => ['auth:customer']], function () {
//     Route::get('cart/myCart', 'CartModuleController@showCart')->name('cart.show');
// });

Route::group(['prefix' => 'cart'], function () {

    /*************************views route ************************************** */
    Route::post('addBrouchureToCart', 'CartModuleController@addBrochureToCart')->name('user.cart.addBrochure'); // add new cartaction
    Route::post('addFolderToCart', 'CartModuleController@addLargeFolderToCart')->name('user.cart.addFolder'); // add new cartaction
    // Route::post('addSmallFolder', 'cartUserController@addSmallFolder')->name('user.cart.addFolder'); // add new cartaction
    Route::post('addFlyeToCart', 'CartModuleController@addFlyerToCart')->name('user.cart.addFlyer'); // add new cartaction
    Route::post('addLetterheadToCart', 'CartModuleController@addLetterheadToCart')->name('user.cart.addLetterhead'); // add new cartaction
    Route::post('addStickerToCart', 'CartModuleController@addStickerToCart')->name('user.cart.addSticker'); // add new cartaction
    Route::post('addBlocknoteToCart', 'CartModuleController@addBlocknoteToCart')->name('user.cart.addBlocknote'); // add new cartaction
    Route::post('addPrescriptionToCart', 'CartModuleController@addPrescriptionToCart')->name('user.cart.addPrescription'); // add new cartaction
    Route::post('addEnvelopeToCart', 'CartModuleController@addEnvelopeToCart')->name('user.cart.addEnvelope'); // add new cartaction
    Route::post('addCopybookToCart', 'CartModuleController@addCopybookToCart')->name('user.cart.addCopybook'); // add new cartaction
    Route::post('addMagazineToCart', 'CartModuleController@addMagazineToCart')->name('user.cart.addMagazine'); // add new cartaction

    Route::get('/','CartModuleController@index')->name('user.cart');
    Route::post('filterPaperTypes/{cat_id}/{size_id}', 'CartModuleController@filterPaperTypes')->name('user.cart.filterPaperTypes'); // add new cartaction
});
