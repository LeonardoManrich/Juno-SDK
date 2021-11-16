<?php

namespace Webgopher\Juno\Core\Http;

use Webgopher\Juno\Core\Requests\Request;
use Webgopher\Juno\Core\Requests\Injector;
use Webgopher\Juno\Core\Environment\JunoEnvironment;
use Webgopher\Juno\Core\Requests\AccessTokenRequest;

class JunoHttpClient extends JunoClient
{
    private $junoEnvironment;
    private $injectors = [];

    public function __construct(JunoEnvironment $junoEnvironment)
    {
        $this->junoEnvironment = $junoEnvironment;
        $this->addInjector(new AccessTokenRequest($junoEnvironment, null));
    }
}
