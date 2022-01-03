<?php

namespace Webgopher\Juno\Api\Webhooks;

use Webgopher\Juno\Core\Requests\Request;

class WebhooksTypes extends Request
{
    public function __construct()
    {
        parent::__construct(
            "GET",
            "notifications/event-types",
            $this->headers
        );

        $this->addHeader("Content-Type", "application/json");
    }
}
