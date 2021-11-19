<?php

namespace Webgopher\Juno\Core\Http;

use Webgopher\Juno\Core\Requests\DefaultInjector;
use Webgopher\Juno\Core\Environment\JunoEnvironment;
use Webgopher\Juno\Core\Requests\AuthorizationInjector;
use Webgopher\Juno\Core\Session\EncryptedSessionHandler;

class JunoClient extends HttpClient
{
    private $refresh_token = null;

    public function __construct(JunoEnvironment $environment)
    {

        ini_set('session.save_handler', 'files');

        $key = 'webgopher_juno_sdk';
        $handler = new EncryptedSessionHandler($key);
        session_set_save_handler($handler, true);

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        parent::__construct($environment);
        $this->addInjector(new AuthorizationInjector($this, $environment, $this->refresh_token));
        $this->addInjector(new DefaultInjector($environment));
    }
}
