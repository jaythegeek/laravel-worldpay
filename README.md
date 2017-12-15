# Laravel WorldPay

Laravel WorldPay is a package that helps you to process WorldPay payments directly from credit or debit cards.
Though in beta, you may also create orders and fetch orders from the WorldPay Online REST API.

## Install

To install the Laravel WorldPay package you must use composer, simply add the following to your composer.json file

``` bash
$ composer require jaythegeek/worldpay
```

If you are using Laravel 5.5 or above there is no need to add the service provider, skip to publishing the vendor files :)
Auto Discovery is here people!!

Otherwise add the service provider in `config/app.php`:

``` bash
Jtg\WorldPay\WorldPayServiceProvider::class,
```

Publish the vendor files, this will setup your config file - 'config/worldpay.php' and adds a test view to play with, you can find it here 'views/worldpay/worldpay.blade.php'

``` bash
php artisan vendor:publish
```

## Configuration

Add your WorldPay Online details to the `config/worldpay.php` file.
Visit [WorldPay Online][link-worldpay] you can create an account if you don't have one already!

## Usage

Don't forget to add this at the top!!
```
use Jtg\WorldPay\WorldPayServiceProvider as WorldPay;
```

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
[link-author]: https://github.com/jaythegeek
[link-worldpay]: https://online.worldpay.com
[link-contributors]: ../../contributors
