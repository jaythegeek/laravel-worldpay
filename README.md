# Laravel WorldPay

Laravel WorldPay is a package that helps you to process WorldPay payments directly from credit or debit cards.
Though in beta, you may also create orders and fetch orders from the WorldPay REST API.

## Install

To install the Laravel WorldPay package you must use composer, simply add the following to your composer.json file

``` bash
"require": {
    "jaythegeek/worldpay": "@dev"
}
$ composer update
```

Or

``` bash
$ composer require jaythegeek/worldpay:@dev
```

Then add the service provider in `config/app.php`:

``` bash
Jtg\WorldPay\WorldPayServiceProvider::class,
```

Finally Publish the package configuration by running this CMD

``` bash
php artisan vendor:publish
```

## Configuration

Now go to `config/worldpay.php`.

Set your SDK configuration.

``` bash
server = sandbox or live

Account credentials from developer portal
[Test Account]
sandbox.service = T_C_8b253cda-26d5-4917-bc39-6224c07d63tc
sandbox.client = T_C_8b253cda-26d5-4917-bc39-6224c07d63tc

[Live Account]
live.service = T_C_8b253cda-26d5-4917-bc39-6224c07d63tc
live.client = T_C_8b253cda-26d5-4917-bc39-6224c07d63tc
```

## Usage
Copy routes and paste in your route file
```php
Route::get('/worldpay', function () {
    return view('vendor/jaythegeek/worldpay');
});

Route::post('/charge', function (\Illuminate\Http\Request $request) {
    $token    = $request->input( 'token' );
    $total    = 50;
    $key      = config('worldpay.sandbox.client');
    $worldPay = new Jtg\WorldPay\lib\Worldpay($key);

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
            throw new \Jtg\WorldPay\lib\WorldpayException(print_r($response, true));
        }
    } catch (Jtg\WorldPay\lib\WorldpayException $e) {
        echo 'Error code: ' . $e->getCustomCode() . '
              HTTP status code:' . $e->getHttpStatusCode() . '
              Error description: ' . $e->getDescription() . '
              Error message: ' . $e->getMessage();

        // The card has been declined
    } catch (\Exception $e) {
        // The card has been declined
        echo 'Error message: ' . $e->getMessage();
    }
});
```

## Change log

Please see [CHANGELOG](CHANGELOG.md)

## Security

Please use the issue tracker for any possible problems you're having!

## Credits

- [Jay the Geek][link-author]

[ico-version]: https://img.shields.io/packagist/v/:vendor/:package_name.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/:vendor/:package_name/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/:vendor/:package_name.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/:vendor/:package_name.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/:vendor/:package_name.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/:vendor/:package_name
[link-travis]: https://travis-ci.org/:vendor/:package_name
[link-scrutinizer]: https://scrutinizer-ci.com/g/:vendor/:package_name/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/:vendor/:package_name
[link-downloads]: https://packagist.org/packages/:vendor/:package_name
[link-author]: https://github.com/Sheikh-Jtg
[link-contributors]: ../../contributors
