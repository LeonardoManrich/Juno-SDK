<?php

namespace Webgopher\Juno\Core\Requests;

use Webgopher\Juno\Core\Environment\JunoEnvironment;

class DefaultInjector implements Injector
{

    public function __construct(JunoEnvironment $environment)
    {
        $this->environment = $environment;
    }

    public function inject(Request $request)
    {
        if (!$request->getHeader("X-Resource-Token")) {
            $request->addHeader("X-Resource-Token", $this->environment->getSecretToken());
        }

        if (!$request->getHeader("X-API-Version")) {
            $request->addHeader("X-API-Version", "2");
        }
    }
}
