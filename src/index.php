<?php

use Webgopher\Juno\Api\Balance\Balance;
use Webgopher\Juno\Api\Banks\Banks;
use Webgopher\Juno\Api\Charges\Charges;
use Webgopher\Juno\Api\Charges\ChargesCancel;
use Webgopher\Juno\Api\Charges\ChargesCreate;
use Webgopher\Juno\Core\Http\JunoClient;
use Webgopher\Juno\Core\Environment\SandboxEnvironment;

include "../vendor/autoload.php";

$environment = new SandboxEnvironment("biqxXEU1xJYO361u", "YX{Ag}H4Kmw%)Wmh*gK9GP6>44pPnMmZ", "DE97058DDC4036C1B1937606715876295D200667AA48F67CFDB66410133E5E11");
$client = new JunoClient($environment);

echo "<pre>";

echo ($client->execute(new Balance())->result->transferableBalance);

//var_dump ($client->execute(new Charges("chr_62F1A5CEB80F6705CBFF6CAFA36014CE"))->result);
//var_dump ($client->execute(new ChargesCancel("chr_62F1A5CEB80F6705CBFF6CAFA36014CE"))->status_code);
/* $data['charge'] = [
    'description' => 'teste',
    'amount' => 1000.0,
    'totalAmount' => 5000.0
    'installments' => 5,
    'paymentTypes' => ['CREDIT_CARD'],
    'split' => [
        'recipientToken' => '',
        'amount' => '',
        'percentage' => '',
        'amountRemainder' => '',
        'chargeFee' => '',
    ]
];

$data['billing'] = [
    'name' => 'teste',
    'document' => '26135707094',
    'email' => 'leonardo@webgopher.com.br',
    'address' => [
        'street' => 'Rua benedita soares',
        'number' => '2123',
        'complement' => 'ap 1212112',
        'neighborhood' => 'Floresta',
        'city' => 'Cascavel',
        'state' => 'PR',
        'postCode' => '85814524',
    ]
];

var_dump($client->execute(new ChargesCreate($data))->result); */
