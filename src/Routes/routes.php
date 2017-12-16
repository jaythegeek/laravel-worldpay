<?php

// Custom routes for WorldPay Online
Route::get('/worldpay', function () {
    return view('worldpay::worldpay');
});

Route::post('/worldpay/complete', 'Jtg\WorldPay\Controllers\WorldPayController@charge');

Route::get('/worldpay/complete', function () {
    return view('worldpay::complete');
});




