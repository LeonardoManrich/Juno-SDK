<?php

namespace Webgopher\Juno\Core\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Webgopher\Juno\Core\Config;

class JunoClient extends Client
{
    public function __construct(array $config = [])
    {
        try {
            $config = array_merge(
                [
                    'base_uri' => Config::getResourceUrl(),
                    'headers' => [
                        'Content-Type' => 'application/json;charset=utf-8',
                        'X-Api-Version' => '2',
                        'X-Resource-Token' => Config::getPrivateToken()
                    ]
                ],
                $config
            );

            parent::__construct($config);
        } catch (ClientException $e) {
            return json_encode($e->getRequest());
        }
    }
}
