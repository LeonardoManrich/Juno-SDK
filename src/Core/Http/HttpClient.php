<?php

namespace Webgopher\Juno\Core\Http;

use stdClass;
use GuzzleHttp\Client;
use Webgopher\Juno\Core\Requests\Request;
use GuzzleHttp\Psr7\Request as Ps7Request;
use Webgopher\Juno\Core\Requests\Injector;
use Webgopher\Juno\Core\Environment\JunoEnvironment;

class HttpClient extends Client
{
    private $injectors = [];

    public function __construct(JunoEnvironment $junoEnvironment)
    {
        parent::__construct([
            'base_uri' => $junoEnvironment->base_url()
        ]);
    }

    public function addInjector(Injector $inj)
    {
        $this->injectors[] = $inj;
    }

    public function execute(Request $request)
    {
        $requestCln = clone $request;

        foreach ($this->injectors as $inj) {
            $inj->inject($requestCln);
        }

        $result =  $this->sendRequest(new Ps7Request($requestCln->verb, $requestCln->path, $requestCln->headers, $requestCln->getBody()));

        $response = new stdClass();
        $response->status_code = $result->getStatusCode();
        $response->headers = $result->getHeaders();
        $response->reason_phrase = $result->getReasonPhrase();
        $response->result = json_decode($result->getBody()->getContents());

        return $response;
    }
}
