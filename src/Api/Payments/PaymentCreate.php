<?php

namespace Webgopher\Juno\Api\Payments;

use Webgopher\Juno\Core\Requests\Request;

class PaymentCreate extends Request
{
    public function __construct($data)
    {
        parent::__construct(
            "POST",
            "/api-integration/payments",
            $this->headers,
            [],
            [
                'json' => [
                    "chargeId" => $data['chargeId'],
                    "billing" => $data['billing'],
                    "creditCardDetails" => $data['creditCardDetails']
                ]
            ]
        );
        $this->addHeader("Content-Type", "application/json");
    }
}
