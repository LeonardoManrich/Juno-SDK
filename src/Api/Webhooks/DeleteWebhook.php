<?php

namespace Webgopher\Juno\Api\Webhooks;

use Webgopher\Juno\Core\Requests\Request;

class DeleteWebhook extends Request
{

    public function __construct($id)
    {
        parent::__construct(
            "DELETE",
            "notifications/webhooks/$id",
            $this->headers
        );

        $this->addHeader("Content-Type", "application/json");
    }
}
