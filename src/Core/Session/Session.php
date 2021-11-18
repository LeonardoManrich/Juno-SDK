<?php

namespace Webgopher\Juno\Core\Session;

class Session
{
    public function __construct()
    {
        ini_set('session.save_handler', 'files');

        $key = 'webgopher_juno_sdk';
        $handler = new EncryptedSessionHandler($key);
        session_set_save_handler($handler, true);

        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public function getSession(string $key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : false;
    }

    public function setSession(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function removeSession(string $key)
    {
        unset($_SESSION[$key]);
    }
}
