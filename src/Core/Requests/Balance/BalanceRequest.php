<?php

namespace Webgopher\Juno\Core\Requests\Balance;

use Webgopher\Juno\Core\Requests\Injector;
use Webgopher\Juno\Core\Requests\Request;

class BalanceRequest extends Request
{
    public function __construct()
    {
        $body = [];

        $this->body = $body;

        parent::__construct("GET", "/api-integration/balance",  $this->headers, $body);
    }
}
