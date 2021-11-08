<?php

namespace Webgopher\Juno\Core\Http;

class Authorization
{
    private $client;
    private $environment;
    private $refreshToken;
    public $accessToken;

    public function __construct(JunoClient $client, JunoEnvironment $environment, $refreshToken)
    {
        $this->client = $client;
        $this->environment = $environment;
        $this->refreshToken = $refreshToken;
    }

    public function inject($request)
    {
        if (!$this->hasAuthHeader($request) && !$this->isAuthRequest($request)) {
            if (is_null($this->accessToken) || $this->accessToken->isExpired()) {
                $this->accessToken = $this->fetchAccessToken();
            }
            $request->headers['Authorization'] = 'Bearer ' . $this->accessToken->token;
        }
    }

    private function fetchAccessToken()
    {
        $accessTokenResponse = $this->client->send(new AccessTokenRequest($this->environment, $this->refreshToken));

        $accessToken = $accessTokenResponse->result;
        return new AccessToken($accessToken->access_token, $accessToken->token_type, $accessToken->expires_in);
    }

    private function isAuthRequest($request)
    {
        return $request instanceof AccessTokenRequest || $request instanceof RefreshToken;
    }

    private function hasAuthHeader(Request $request)
    {
        return array_key_exists("Authorization", $request->headers);
    }
}
