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

Publish the vendor files, this will setup your config file - 'config/worldpay.php' and adds a test view to play with, you can find it here 'views/worldpay/worldpay.blade.php' - Bootstrap 4 for ease of use! :)

``` bash
php artisan vendor:publish
```

## Configuration

Add your WorldPay Online details to the `config/worldpay.php` file. For security it is recommended that you set your API keys in your .env file;
```
WORLDPAY_STATUS=sandbox

WORLDPAY_LIVE_SERVICE_KEY=T_S_73a95087-8916-4e8e-bbe1-12345678900
WORLDPAY_LIVE_CLIENT_KEY=T_C_475fb1ec-99ab-4a24-8f80-12345678900

WORLDPAY_TEST_SERVICE_KEY=T_S_73a95087-8916-4e8e-bbe1-12345678900
WORLDPAY_TEST_CLIENT_KEY=T_C_475fb1ec-99ab-4a24-8f80-12345678900
```
Visit [WorldPay Online][link-worldpay] you can create an account if you don't have one already!

## Usage

Once you have setup your credentials in your .env file, and published the vendor files, the following routes will be made available to you along with test views and an example charge system.

```
your-domain.com/worldpay
your-domain.com/worldpay/complete
```

Go ahead and extend this as much as you need for your own implementation, updates and more features coming soon!

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
