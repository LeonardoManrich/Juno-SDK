<?php


use Webgopher\Juno\Core\Environment\SandboxEnvironment;
use Webgopher\Juno\Core\Http\JunoClient;
use Webgopher\Juno\Core\Requests\Balance\BalanceRequest;

include "../vendor/autoload.php";

$environment = new SandboxEnvironment("biqxXEU1xJYO361u", "YX{Ag}H4Kmw%)Wmh*gK9GP6>44pPnMmZ", "DE97058DDC4036C1B1937606715876295D200667AA48F67CFDB66410133E5E11");
$client = new JunoClient($environment);

echo "<pre>";

echo ($client->execute(new BalanceRequest())->result->transferableBalance);
