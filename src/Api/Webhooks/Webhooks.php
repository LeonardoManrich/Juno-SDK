<?php

namespace Webgopher\Juno\Api\Webhooks;

use Webgopher\Juno\Core\Requests\Request;

class Webhooks extends Request
{
    public function __construct()
    {
        parent::__construct(
            "GET",
            "notifications/webhooks",
            $this->headers
        );

        $this->addHeader("Content-Type", "application/json");
    }
}
