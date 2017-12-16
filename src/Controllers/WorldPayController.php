<?php

namespace Jtg\WorldPay\Controllers;

use Illuminate\Http\Request;
use Jtg\WorldPay\Tools\Worldpay;
use Jtg\WorldPay\Tools\WorldpayException;
use App\Http\Controllers\Controller;

class WorldPayController extends Controller {
    public function charge(Request $request) {
// Setup the WorldPay Online Connection
        $token    = $request->token;
        $total    = 50;
        $service_key      = env('WORLDPAY_TEST_SERVICE_KEY'); // Change TEST to LIVE when ready
        $worldPay = new Worldpay($service_key);

        // Build the Address Array
        $billing_address = array(
            'address1'    => 'Address 1 here',
            'address2'    => 'Address 2 here',
            'address3'    => 'Address 3 here',
            'postalCode'  => 'postal code here',
            'city'        => 'city here',
            'state'       => 'state here',
            'countryCode' => 'GB',
        );
        // Ok, Lets try it out!
        try {
            $response = $worldPay->createOrder(array(
                'token'             => $token,
                'amount'            => (int)($total . "00"),
                'currencyCode'      => 'GBP',
                'name'              => "Name on Card",
                'billingAddress'    => $billing_address,
                'orderDescription'  => 'Order Description',
                'customerOrderCode' => 'Order Code'
            ));
            if ($response['paymentStatus'] === 'SUCCESS') {
                $worldpayOrderCode = $response['orderCode'];

                return view('worldpay::complete')->with('order', $response);
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


    public function test(Request $request) {
        dd($request->all());
    }
}
