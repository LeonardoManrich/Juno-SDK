<?php

namespace Webgopher\Juno\Api\Charges;

use Webgopher\Juno\Core\Requests\Request;


class Charges extends Request
{
    public function __construct($chargeId = "")
    {

        parent::__construct("GET", "/api-integration/charges/{chargeId}");

        $this->path = str_replace("{chargeId}", urlencode($chargeId), $this->path);
        $this->headers["Content-Type"] = "application/json";
    }
}
