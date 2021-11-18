<?php

namespace Webgopher\Juno\Core\Session;

use SessionHandler;
use Webgopher\Juno\Core\Session\Encrypt\Encrypt;


class EncryptedSessionHandler extends SessionHandler
{

    private $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function read($id)
    {
        $data = parent::read($id);

        if (!$data) {
            return "";
        } else {
            return Encrypt::decrypt($data, $this->key);
        }
    }

    public function write($id, $data)
    {
        $data = Encrypt::encrypt($data, $this->key);

        return parent::write($id, $data);
    }
}
