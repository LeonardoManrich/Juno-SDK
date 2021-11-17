<?php

namespace Webgopher\Juno\Core\Http;

use Webgopher\Juno\Core\Environment\JunoEnvironment;
use Webgopher\Juno\Core\Requests\AuthorizationInjector;
use Webgopher\Juno\Core\Requests\DefaultInjector;

class JunoClient extends HttpClient
{
    private $refresh_token = null;

    public function __construct(JunoEnvironment $environment)
    {
        parent::__construct($environment);
        $this->addInjector(new AuthorizationInjector($this, $environment, $this->refresh_token));
        $this->addInjector(new DefaultInjector($environment));
    }
}
