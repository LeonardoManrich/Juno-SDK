<?php

namespace Core\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class JunoClient extends Client
{
    private static $client;

    public function __construct(array $config = [])
    {
        try {
            $config = array_merge(
                [
                    'base_uri' => Config::getResourceUrl(),
                    'headers' => [
                        'Content-Type' => 'application/json;charset=utf-8',
                        'X-Api-Version' => '2',
                        'X-Resource-Token' => Config::getPrivateToken(),
                        'Authorization' => 'Bearer ' . $this->generateAuthenticationCurl(),
                    ]
                ],
                $config
            );

            self::$client = new Client($config);

            //$response = self::$client->request('GET', 'test');
        } catch (ClientException $e) {
            return json_encode($e->getRequest());
        }
    }

    private function generateAuthenticationCurl()
    {
        /* $curl = curl_init();

        $credentials = base64_encode(Config::getClientId() . ":" . Config::getClientSecret());

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sandbox.boletobancario.com/authorization-server/oauth/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => "grant_type=client_credentials",
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic ' . $credentials,
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = json_decode(curl_exec($curl), true);
        curl_close($curl);
        return $response['access_token']; */
    }

    public function environment()
    {
    }

    public function development()
    {
    }
}
