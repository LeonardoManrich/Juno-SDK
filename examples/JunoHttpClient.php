<?php

namespace examples;

use Webgopher\Juno\Core\Http\JunoClient;
use Webgopher\Juno\Core\Environment\SandboxEnvironment;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

class JunoHttpClient
{

    public static function client()
    {
        return new JunoClient(self::environment());
    }

    public static function environment()
    {
        $clientId = getenv("CLIENT_ID") ?: "JUNO-CLIENT-ID";
        $clientSecret = getenv("CLIENT_SECRET") ?: "JUNO-CLIENT-SECRET";
        $secretToken = getenv("CLIENT_SECRET") ?: "JUNO-SECRET-TOKEN";

        return new SandboxEnvironment($clientId, $clientSecret, $secretToken);
    }
}
