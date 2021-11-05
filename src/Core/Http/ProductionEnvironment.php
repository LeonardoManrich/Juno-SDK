<?php

namespace Core\Http;

class ProductionEnvironment extends JunoEnvironment
{

    public function __construct(string $clientId, string $clientSecret)
    {
        parent::__construct($clientId, $clientSecret);
    }

    public function base_url(): string
    {
        return 'https://api.juno.com.br';
    }
}
