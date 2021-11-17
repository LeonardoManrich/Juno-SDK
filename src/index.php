<?php


use Webgopher\Juno\Api\Balance\Balance;
use Webgopher\Juno\Api\Banks\Banks;
use Webgopher\Juno\Api\Charges\Charges;
use Webgopher\Juno\Api\Charges\ChargesCreate;
use Webgopher\Juno\Core\Http\JunoClient;
use Webgopher\Juno\Core\Environment\SandboxEnvironment;


include "../vendor/autoload.php";

$environment = new SandboxEnvironment("biqxXEU1xJYO361u", "YX{Ag}H4Kmw%)Wmh*gK9GP6>44pPnMmZ", "DE97058DDC4036C1B1937606715876295D200667AA48F67CFDB66410133E5E11");
$client = new JunoClient($environment);

echo "<pre>";

//echo ($client->execute(new Balance())->result->transferableBalance);

var_dump ($client->execute(new Charges("chr_79167191EBADA58DB061B02D8C5D98F4"))->result);

$data['charge'] = [
    'description' => 'teste',
    'amount' => 5.0,
];

$data['billing'] = [
    'name' => 'teste',
    'document' => '26135707094',
    'email' => 'leonardo@webgopher.com.br',
    'address' => [
        'street' => 'teste',
        'number' => '123',
        'complement' => 'teste',
        'neighborhood' => 'teste',
        'city' => 'teste',
        'state' => 'teste',
        'postCode' => '123123123',
    ]
];

//var_dump($client->execute(new ChargesCreate($data))->result->error);
