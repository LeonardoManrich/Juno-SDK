<?php

namespace Webgopher\Juno\Core\Http;


class RefreshToken extends Request
{
    public function __construct(JunoEnvironment $environment, $authorizationCode)
    {
        parent::__construct("/v1/identity/openidconnect/tokenservice", "POST");
        $this->headers["Authorization"] = "Basic " . $environment->authorizationKey();
        $this->headers["Content-Type"] = "application/x-www-form-urlencoded";
        $this->body = [
            "grant_type" => "authorization_code",
            "code" => $authorizationCode
        ];
    }
}