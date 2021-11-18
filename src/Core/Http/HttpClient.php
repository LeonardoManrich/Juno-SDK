<?php

namespace Webgopher\Juno\Core\Http;

use stdClass;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Message;
use GuzzleHttp\Exception\ClientException;
use Webgopher\Juno\Core\Requests\Request;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request as Ps7Request;
use Webgopher\Juno\Core\Requests\Injector;
use Webgopher\Juno\Core\Environment\JunoEnvironment;

class HttpClient extends Client
{
    private $injectors = [];

    public function __construct(JunoEnvironment $junoEnvironment)
    {
        try {
            parent::__construct([
                'base_uri' => $junoEnvironment->base_url()
            ]);
        } catch (ClientException $e) {
            echo $e->getMessage();

            die();
        }
    }

    public function addInjector(Injector $inj)
    {
        $this->injectors[] = $inj;
    }

    public function execute(Request $request)
    {
        $response = new stdClass();

        try {
            //$requestCln = clone $request;

            foreach ($this->injectors as $inj) {
                $inj->inject($request);
            }

            $result =  $this->send(
                new Ps7Request(
                    $request->verb,
                    $request->path,
                    $request->headers,
                    $request->getBody($request->headers['Content-Type'] == "application/json" ? true : false)
                ),
                $request->options
            );

            $response = new stdClass();
            $response->status_code = $result->getStatusCode();
            $response->headers = $result->getHeaders();
            $response->reason_phrase = $result->getReasonPhrase();
            $response->result = json_decode($result->getBody()->getContents());

            return $response;
        } catch (RequestException $e) {

            echo Message::toString($e->getRequest());
            echo Message::toString($e->getResponse());

            die();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
