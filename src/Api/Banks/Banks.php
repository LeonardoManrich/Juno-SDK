<?php

namespace Webgopher\Juno\Api\Banks;

use Webgopher\Juno\Core\Requests\Request;


class Banks extends Request
{
    public function __construct()
    {
        parent::__construct("GET", "/api-integration/data/banks");
        $this->headers["Content-Type"] = "application/json";
    }
}
