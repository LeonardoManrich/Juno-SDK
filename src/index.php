<?php

include "../vendor/autoload.php";

use Webgopher\Juno\Core\Config;
use Webgopher\Juno\Core\Http\JunoClient;
use Webgopher\Juno\Core\Http\Authorization;
use Webgopher\Juno\Core\Http\SandboxEnvironment;

$config = new Config("teste", "teste", "teste");


$auth = new Authorization(new JunoClient(), new SandboxEnvironment($config::getClientId(), $config::getClientSecret()), null);

echo "<pre> ";
var_dump($auth);