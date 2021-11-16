<?php

namespace Webgopher\Juno\Core\Requests;

use GuzzleHttp\Psr7\Request as Psr7Request;

abstract class Request extends Psr7Request implements Injector
{
    public $path;
    public $body;
    public $verb;
    public $headers;

    function __construct($verb, $path, $headers = [], $body = null)
    {
        $this->path = $path;
        $this->verb = $verb;
        $this->body = $body;
        $this->headers = $headers;

        parent::__construct($this->verb, $this->path, $this->headers, $this->body);
    }
}
