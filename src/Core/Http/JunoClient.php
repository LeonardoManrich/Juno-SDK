<?php

namespace Webgopher\Juno\Core\Http;

use Webgopher\Juno\Core\Requests\DefaultInjector;
use Webgopher\Juno\Core\Environment\JunoEnvironment;
use Webgopher\Juno\Core\Requests\AuthorizationInjector;
use Webgopher\Juno\Core\Session\EncryptedSessionHandler;

class JunoClient extends HttpClient
{

    public function __construct(JunoEnvironment $environment)
    {

        parent::__construct($environment);
        $this->addInjector(new AuthorizationInjector($this, $environment));
        $this->addInjector(new DefaultInjector($environment));
        
    }
}
