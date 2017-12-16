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

    'server' => "sandbox",

    /*
    |--------------------------------------------------------------------------
    | Sandbox Credentials
    |--------------------------------------------------------------------------
    |
    | Sandbox credentials from https://online.worldpay.com
    |
    */

    'sandbox' => array(
        'service' => 'T_S_73a95087-8916-4e8e-bbe1-ip349hu93333', // secret key
        'client'  => 'T_C_475fb1ec-99ab-4a24-8f80-ip349hu93333', // client key
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
        'service' => 'T_S_73a95087-8916-4e8e-bbe1-ip349hu93333', // secret key
        'client'  => 'T_C_475fb1ec-99ab-4a24-8f80-ip349hu93333', // client key
    ),

];
