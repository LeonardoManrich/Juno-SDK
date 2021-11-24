<?php

namespace Webgopher\Juno\Api\Balance;

use Webgopher\Juno\Core\Requests\Request;

class Balance extends Request
{
    public function __construct()
    {
        parent::__construct("GET", "balance");
        $this->addHeader("Content-Type", "application/json");
    }
}
