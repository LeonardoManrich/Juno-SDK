<?php

namespace Webgopher\Juno\Api\Charges;

use Webgopher\Juno\Core\Requests\Request;

class ChargesCreate extends Request
{
    public function __construct($data)
    {
        $this->headers["Content-Type"] = "application/json";
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
    }
}
