<?php

namespace Webgopher\Juno\Core\Requests;

use Webgopher\Juno\Core\Environment\JunoEnvironment;
use Webgopher\Juno\Core\Requests\Request;

class AccessTokenRequest extends Request implements Injector
{
    private $environment;

    public function __construct(JunoEnvironment $environment, $refreshToken)
    {
        $this->environment = $environment;
        parent::__construct("POST", "/authorization", []);
    }

    public function inject($request)
    {

        $this->headers["Authorization"] = "Basic " . $this->environment->authorizationKey();

        $body = [
            "grant_type" => "client_credentials"
        ];

        if (isset($refreshToken)) {
            $body["grant_type"] = "refresh_token";
            $body["refresh_token"] = $refreshToken;
        }

        $this->body = $body;
        $this->headers["Content-Type"] = "application/x-www-form-urlencoded";
        $this->headers["grant_type"]  = "client_credentials";
    }
}
