<?php

namespace Webgopher\Juno\Core\Http;

use GuzzleHttp\Psr7\Request as Psr7Request;

class Request extends Psr7Request implements Injector
{
    public $path;

    public $body;

    public $verb;

    public $headers;

    function __construct($path, $verb)
    {
        $this->path = $path;
        $this->verb = $verb;
        $this->body = NULL;
        $this->headers = [];

        parent::__construct($this->verb, $this->path, $this->headers, $this->body);
    }

    public function inject($request)
    {
    }
}
