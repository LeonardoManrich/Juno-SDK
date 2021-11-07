<?php

namespace Webgopher\Juno\Core\Http;

use JetBrains\PhpStorm\Pure;

class SandboxEnvironment extends JunoEnvironment
{

    public function __construct(string $clientId, string $clientSecret)
    {
        parent::__construct($clientId, $clientSecret);
    }

    public function base_url(): string
    {
        return 'https://sandbox.boletobancario.com';
    }
}
