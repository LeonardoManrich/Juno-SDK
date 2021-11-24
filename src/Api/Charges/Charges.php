<?php

namespace Webgopher\Juno\Api\Charges;

use Webgopher\Juno\Core\Requests\Request;


class Charges extends Request
{
    public function __construct($chargeId = "")
    {

        parent::__construct("GET", "charges/{chargeId}");

        $this->path = str_replace("{chargeId}", urlencode($chargeId), $this->path);
        $this->addHeader("Content-Type", "application/json");
    }
}
