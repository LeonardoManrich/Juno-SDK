<?php

namespace Webgopher\Juno\Core\Environment;

abstract class JunoEnvironment implements Environment
{
    private $clientId;
    private $clientSecret;

    public function __construct($clientId, $clientSecret)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    public function authorizationKey()
    {
        return base64_encode($this->clientId . ":" . $this->clientSecret);
    }
}
