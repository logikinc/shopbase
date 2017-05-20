<?php

Route::get('/shopbase/install','Anurag\Controllers\ShopbaseController@Index');
Route::post('/shopbase/install','Anurag\Controllers\ShopbaseController@Install');

Route::get('/shopbase/initialize','Anurag\Controllers\ShopbaseController@Initialize');
Route::get('/shopbase/dashboard','Anurag\Controllers\ShopbaseController@Dashboard');