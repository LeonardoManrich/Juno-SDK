<?php

namespace Webgopher\Juno\Core\Environment;

class ProductionEnvironment extends JunoEnvironment
{
    public function __construct($clientId, $clientSecret, $secretToken)
    {
        parent::__construct($clientId, $clientSecret, $secretToken);
    }

    public function uri_auth(): string
    {
        return "/authorization-server";
    }

    public function base_url(): string
    {
        return "https://api.juno.com.br/";
    }
}
