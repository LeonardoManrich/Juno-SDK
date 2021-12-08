<?php

namespace Webgopher\Juno\Api\Webhooks;

use Webgopher\Juno\Core\Requests\Request;

class CreateWebhook extends Request
{

    public function __construct($data)
    {
        parent::__construct(
            "POST",
            "notifications/webhooks",
            $this->headers,
            [],
            [
                $data['url'],
                $data['eventTypes']
            ]
        );

        $this->addHeader("Content-Type", "application/json");
    }
}
