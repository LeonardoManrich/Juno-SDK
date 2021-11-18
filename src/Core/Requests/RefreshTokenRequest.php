<?php

namespace Webgopher\Juno\Core\Requests;

use Webgopher\Juno\Core\Requests\Request;
use Webgopher\Juno\Core\Environment\JunoEnvironment;

class RefreshTokenRequest extends Request
{
    public function __construct(JunoEnvironment $environment, $authorizationCode)
    {

        $this->headers["Authorization"] = "Basic " . $environment->authorizationKey();
        $this->headers["Content-Type"] = "application/x-www-form-urlencoded";
        $this->body = [
            "grant_type" => "authorization_code",
            "code" => $authorizationCode
        ];

        parent::__construct("POST", $environment->uri_auth() . "teste", $this->headers, $this->body, ['bodyType' => false]);
    }
}
