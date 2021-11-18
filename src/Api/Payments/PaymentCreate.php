<?php

namespace Webgopher\Juno\Api\Payments;

use Webgopher\Juno\Core\Requests\Request;

class PaymentCreate extends Request
{

    public function __construct()
    {
        $this->headers["Content-Type"] = "application/json";
        parent::__construct("POST", "/api-integration/payments", $this->headers);
    }
}
