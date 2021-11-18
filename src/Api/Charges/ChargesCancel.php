<?php

namespace Webgopher\Juno\Api\Charges;

use Webgopher\Juno\Core\Requests\Request;


class ChargesCancel extends Request
{
    public function __construct($chargeId)
    {

        parent::__construct("PUT", "/api-integration/charges/{chargeId}/cancelation");

        $this->path = str_replace("{chargeId}", urlencode($chargeId), $this->path);
        $this->headers["Content-Type"] = "application/json";
    }
}
