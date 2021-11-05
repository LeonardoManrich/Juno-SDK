<?php

namespace Core\Http;

class SandboxEnvironment extends JunoEnvironment
{

    public function __construct(string $clientId, string $clientSecret)
    {
        parent::__construct($clientId, $clientSecret);
    }

    public function base_url(): string
    {
        return '';
    }
}
