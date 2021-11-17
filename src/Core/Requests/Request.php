<?php

namespace Webgopher\Juno\Core\Requests;

class Request
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
    }

    public function addHeader($header, $value)
    {
        $this->headers[$header] = $value;
    }

    public function getBody()
    {
        return http_build_query($this->body, "", '&');
    }

    public function getHeader($header)
    {
        return isset($this->headers[$header]) ? $this->headers[$header] : false;
    }
}
