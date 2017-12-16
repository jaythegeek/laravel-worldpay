<?php

// Custom routes for WorldPay Online
Route::get('/worldpay', function () {
    return view('worldpay.worldpay');
});

Route::get('/worldpay/test', function () {
    return view('worldpay::test');
});

Route::post('/worldpay/charge', 'Jtg\WorldPay\Controllers\WorldPayController@charge');
