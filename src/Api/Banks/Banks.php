<?php

namespace Webgopher\Juno\Api\Banks;

use Webgopher\Juno\Core\Requests\Request;


class Banks extends Request
{
    public function __construct()
    {
        parent::__construct("GET", "data/banks");
        $this->addHeader("Content-Type", "application/json");
    }
}
