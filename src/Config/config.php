<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Connection type to WorldPay Online
    |--------------------------------------------------------------------------
    |
    | Set whether your connection is to the sandbox or live account
    | Default = sandbox
    |
    */

    'server' => env('WORLDPAY_STATUS'),

    /*
    |--------------------------------------------------------------------------
    | Sandbox Credentials
    |--------------------------------------------------------------------------
    |
    | Sandbox credentials from https://online.worldpay.com
    |
    */

    'sandbox' => array(
        'service' => env('WORLDPAY_TEST_SERVICE_KEY'), // secret key
        'client'  => env('WORLDPAY_TEST_CLIENT_KEY'), // client key
    ),

    /*
    |--------------------------------------------------------------------------
    | Live Credentials
    |--------------------------------------------------------------------------
    |
    | Live credentials from https://online.worldpay.com
    |
    */

    'live' => array(
        'service' => env('WORLDPAY_LIVE_SERVICE_KEY'), // secret key
        'client'  => env('WORLDPAY_LIVE_CLIENT_KEY'), // client key
    ),

];
