<?php
namespace Jtg\WorldPay\Tools;

class TokenService
{
    public static function getStoredCardDetails($token)
    {
        return Connection::getInstance()->sendRequest('tokens/' . $token, false, true, 'GET');
    }
}
