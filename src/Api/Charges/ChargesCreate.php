<?php

namespace Webgopher\Juno\Api\Charges;

use Webgopher\Juno\Core\Requests\Request;

class ChargesCreate extends Request
{
    public function __construct($data)
    {

        parent::__construct(
            "POST",
            "/api-integration/charges",
            $this->headers,
            [],
            [
                'json' => [
                    "charge" => $data["charge"],
                    "billing" => $data["billing"]
                ]
            ]
        );

        $this->addHeader("Content-Type", "application/json");
    }
}
