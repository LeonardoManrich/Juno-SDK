<?php

namespace Webgopher\Juno\Core\Requests;

use Webgopher\Juno\Core\Session\Session;

class AccessToken
{
    public $token;
    public $tokenType;
    public $expiresIn;
    private $createDate;

    public function __construct($token, $tokenType, $expiresIn)
    {

        if (!isset($_SESSION['juno'])) {
            $_SESSION['juno'] = [];
        }

        $this->token = $token;
        $this->tokenType = $tokenType;
        $this->expiresIn = $expiresIn;
        $this->createDate = time();

        $_SESSION['juno'] = $this;
    }

    public function isExpired()
    {
        return time() >= $_SESSION['juno']->createDate + $_SESSION['juno']->expiresIn;
    }
}
