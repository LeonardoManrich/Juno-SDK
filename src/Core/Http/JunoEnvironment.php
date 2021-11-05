<?php

namespace Core\Http;

use Core\Http\Environment;

abstract class JunoEnvironment implements Environment
{
    private $clientId;
    private $clientSecret;

    public function __construct(string $clientId, string $clientSecret)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    public function authorizationKey()
    {
        return base64_encode($this->clientId . ":" . $this->clientSecret);
    }
}
