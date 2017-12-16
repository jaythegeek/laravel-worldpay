<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jtg\WorldPay\lib\Worldpay;
use Jtg\WorldPay\lib\WorldpayException;
use App\Http\Controllers\Controller;

class WorldPayController extends Controller {
    public function charge(Request $request) {
// Setup the WorldPay Online Connection
        $token    = $request->input( 'token' );
        $total    = 50;
        $key      = config('worldpay.sandbox.client');
        $worldPay = new Worldpay($key);

        $billing_address = array(
            'address1'    => 'Address 1 here',
            'address2'    => 'Address 2 here',
            'address3'    => 'Address 3 here',
            'postalCode'  => 'postal code here',
            'city'        => 'city here',
            'state'       => 'state here',
            'countryCode' => 'GB',
        );

        try {
            $response = $worldPay->createOrder(array(
                'token'             => $token,
                'amount'            => (int)($total . "00"),
                'currencyCode'      => 'GBP',
                'name'              => "Name on Card",
                'billingAddress'    => $billing_address,
                'orderDescription'  => 'Order description',
                'customerOrderCode' => 'Order code'
            ));
            if ($response['paymentStatus'] === 'SUCCESS') {
                $worldpayOrderCode = $response['orderCode'];

                echo "<pre>";
                print_r($response);
            } else {
// The card has been declined
                throw new WorldpayException(print_r($response, true));
            }
        } catch (WorldpayException $e) {
            echo 'Error code: ' . $e->getCustomCode() . '
            HTTP status code:' . $e->getHttpStatusCode() . '
            Error description: ' . $e->getDescription() . '
            Error message: ' . $e->getMessage();

// The card has been declined
        } catch (\Exception $e) {
// The card has been declined
            echo 'Error message: ' . $e->getMessage();
        }
    }
}
