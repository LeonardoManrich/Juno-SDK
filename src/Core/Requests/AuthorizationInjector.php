<?php

namespace Webgopher\Juno\Core\Requests;

use GuzzleHttp\Psr7\Request as Psr7Request;
use Webgopher\Juno\Core\Http\HttpClient;
use Webgopher\Juno\Core\Environment\JunoEnvironment;
use Webgopher\Juno\Core\Requests\RefreshTokenRequest;

class AuthorizationInjector implements Injector
{
    private $client;
    private $environment;
    private $refreshToken;
    public $accessToken;

    public function __construct(HttpClient $client, JunoEnvironment $environment, $refreshToken)
    {
        $this->client = $client;
        $this->environment = $environment;
        $this->refreshToken = $refreshToken;
    }

    public function inject($request)
    {

        if (!$this->hasAuthHeader($request) && !$this->isAuthRequest($request)) {
            if (!isset($this->accessToken) || $this->accessToken->isExpired()) {
                $this->accessToken = $this->fetchAccessToken();
            }
            $request->headers['Authorization'] = 'Bearer ' . $this->accessToken->token;
        }
    }

    public function fetchAccessToken()
    {
        $guzzleRequest = new AccessTokenRequest($this->environment, $this->refreshToken);
        $accessTokenResponse = $this->client->send(new Psr7Request($guzzleRequest->verb, $guzzleRequest->path, $guzzleRequest->headers, $guzzleRequest->getBody()));
        $accessToken = json_decode($accessTokenResponse->getBody()->getContents());
        return new AccessToken($accessToken->access_token, $accessToken->token_type, $accessToken->expires_in);
    }

    private function isAuthRequest($request)
    {
        return $request instanceof AccessTokenRequest || $request instanceof RefreshTokenRequest;
    }

    private function hasAuthHeader(Request $request)
    {
        return $request->getHeader("Authorization") ? true : false;
    }
}
