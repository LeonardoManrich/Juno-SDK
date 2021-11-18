<?php

namespace Webgopher\Juno\Core\Requests;

use Webgopher\Juno\Core\Session\Session;

class AccessToken
{
    public $token;
    public $tokenType;
    public $expiresIn;
    private $createDate;
    private $session;

    public function __construct($token, $tokenType, $expiresIn)
    {

        $this->session = new Session;

        if ($this->session->getSession('juno') == "") {
            $this->session->setSession('juno', []);
        }

        $this->token = $token;
        $this->tokenType = $tokenType;
        $this->expiresIn = $expiresIn;
        $this->createDate = time();

        $this->session->setSession('juno', $this);
    }

    public function isExpired()
    {
        return time() >= $this->session->getSession('juno')->createDate + $this->session->getSession('juno')->expiresIn;
    }
}
