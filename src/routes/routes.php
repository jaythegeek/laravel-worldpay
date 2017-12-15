<?php

// Custom routes for WorldPay Online
Route::get('/worldpay', function () {
    return view('worldpay.worldpay');
});

Route::post('/worldpay/charge', 'App\Http\Controllers\WorldPayController@charge');
