<?php

namespace Core\Http;

class AccessTokenRequest extends Request
{
    public function __construct(JunoEnvironment $environment)
    {
        parent::__construct("/authorization-server/oauth/token", "POST");
        $this->headers["Authorization"] = "Basic " . $environment->authorizationKey();

        $body = [
            "grant_type" => "client_credentials"
        ];

        $this->body = $body;
        $this->headers["Content-Type"] = "application/x-www-form-urlencoded";
    }
}
