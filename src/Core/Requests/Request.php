<?php

namespace Webgopher\Juno\Core\Requests;

class Request
{
    public $path;
    public $body;
    public $verb;
    public $headers;
    public $options;

    function __construct($verb, $path, $headers = [], $body = [], $options = [])
    {
        $this->path = $path;
        $this->verb = $verb;

        $this->body = $body;
        $this->headers = $headers;

        $this->options = $options;
    }

    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    public function setMethod($method)
    {
        $this->verb = $method;
    }

    public function setPath($path)
    {
        $this->path = $path;
    }

    public function addHeader($header, $value)
    {
        $this->headers[$header] = $value;
    }

    public function getBody($json = true)
    {
        if ($json) {
            json_encode($this->body);
        }

        return http_build_query($this->body, "", '&');
    }

    public function getHeader($header)
    {
        return isset($this->headers[$header]) ? $this->headers[$header] : false;
    }
}
