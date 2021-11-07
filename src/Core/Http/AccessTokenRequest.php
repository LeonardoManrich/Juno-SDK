<?php

namespace Webgopher\Juno\Core\Http;

class AccessTokenRequest extends Request
{
    public function __construct(JunoEnvironment $environment, $refreshToken)
    {
        parent::__construct("/authorization-server/oauth/token", "POST");
        $this->headers["Authorization"] = "Basic " . $environment->authorizationKey();

        $body = [
            "grant_type" => "client_credentials"
        ];

        if (isset($refreshToken))
        {
            $body["grant_type"] = "refresh_token";
            $body["refresh_token"] = $refreshToken;
        }

        $this->body = $body;
        $this->headers["Content-Type"] = "application/x-www-form-urlencoded";
    }
}
