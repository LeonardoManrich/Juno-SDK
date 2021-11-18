<?php

namespace Webgopher\Juno\Api\CreditCard;

use Webgopher\Juno\Core\Requests\Request;


class CreditCardTokenize extends Request
{
    public function __construct($creditCardHash)
    {

        parent::__construct(
            "GET",
            "/api-integration/credit-cards/tokenization",
            $this->headers,
            [],
            [
                'json' => [
                    'creditCardHash' => $creditCardHash
                ]
            ]
        );
        $this->addHeader("Content-Type", "application/json");
    }
}
