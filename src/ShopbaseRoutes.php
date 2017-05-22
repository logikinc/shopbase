<?php

Route::group(['middleware' => 'web'], function () {

    Route::get('/','Anurag\Controllers\ShopbaseController@Index');
    Route::post('/','Anurag\Controllers\ShopbaseController@Install');

    Route::get('/initialize','Anurag\Controllers\ShopbaseController@Initialize');
    Route::get('/app','Anurag\Controllers\ShopbaseController@FetchDetails');
    Route::get('/dashboard','Anurag\Controllers\ShopbaseController@Dashboard');

});