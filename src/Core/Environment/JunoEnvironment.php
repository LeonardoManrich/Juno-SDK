<?php

namespace Webgopher\Juno\Core\Environment;

abstract class JunoEnvironment implements Environment
{
    private $clientId;
    private $clientSecret;
    private $secretToken;

    public function __construct($clientId, $clientSecret, $secretToken)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->secretToken = $secretToken;
    }

    public function getSecretToken()
    {
        return $this->secretToken;
    }

    public function authorizationKey()
    {
        return base64_encode($this->clientId . ":" . $this->clientSecret);
    }
}
