<?php

namespace Webgopher\Juno\Core\Requests;

use Webgopher\Juno\Core\Requests\Request;
use Webgopher\Juno\Core\Environment\JunoEnvironment;

class AccessTokenRequest extends Request
{
    public function __construct(JunoEnvironment $environment)
    {

        $this->headers["Authorization"] = "Basic " . $environment->authorizationKey();

        $body = [
            "grant_type" => "client_credentials"
        ];

        $this->headers["Content-Type"] = "application/x-www-form-urlencoded";
        $this->headers["grant_type"] = "client_credentials";

        $this->body = $body;

        parent::__construct("POST", $environment->uri_auth() . "/oauth/token", $this->headers, $body);
    }
}
