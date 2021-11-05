<?php

namespace Core\Http;

class Config
{
    private static $clientId;
    private static $clientSecret;
    private static $private_token;
    private static $resource_url;

    public function __construct(string $clientId, string $clientSecret, string $resource_url)
    {
        self::$clientId = $clientId;
        self::$clientSecret = $clientSecret;
        self::$resource_url = $resource_url;
    }

    public static function getClientId()
    {
        return self::$clientId;
    }

    public static function getClientSecret()
    {
        return self::$clientSecret;
    }

    public static function getResourceUrl()
    {
        return self::$resource_url;
    }

    public static function getPrivateToken()
    {
        return self::$private_token;
    }
}
