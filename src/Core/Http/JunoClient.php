<?php

namespace Webgopher\Juno\Core\Http;

use GuzzleHttp\Client;
use Webgopher\Juno\Core\Requests\Request;
use Webgopher\Juno\Core\Requests\Injector;
use Webgopher\Juno\Core\Environment\JunoEnvironment;

class JunoClient extends Client
{
    private $junoEnvironment;
    private $injectors = [];

    public function __construct(JunoEnvironment $junoEnvironment)
    {
        $this->junoEnvironment = $junoEnvironment;
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

        return $this->send($request);
    }
}
