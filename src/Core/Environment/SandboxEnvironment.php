<?php

namespace Webgopher\Juno\Core\Environment;

class SandboxEnvironment extends JunoEnvironment
{
    public function __construct($clientId, $clientSecret)
    {
        parent::__construct($clientId, $clientSecret);
    }

    public function base_url()
    {
        return "https://sandbox.boletobancario.com";
    }
}
