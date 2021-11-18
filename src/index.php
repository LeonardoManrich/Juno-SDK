<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teste</title>
</head>

<body>
    <?php

    use Webgopher\Juno\Api\Balance\Balance;
    use Webgopher\Juno\Api\Banks\Banks;
    use Webgopher\Juno\Api\Charges\Charges;
    use Webgopher\Juno\Api\Charges\ChargesCancel;
    use Webgopher\Juno\Api\Charges\ChargesCreate;
    use Webgopher\Juno\Api\Payments\PaymentCreate;
    use Webgopher\Juno\Core\Http\JunoClient;
    use Webgopher\Juno\Core\Environment\SandboxEnvironment;

    include "../vendor/autoload.php";

    $client = new JunoClient(
        new SandboxEnvironment(
            "biqxXEU1xJYO361u",
            "YX{Ag}H4Kmw%)Wmh*gK9GP6>44pPnMmZ",
            "DE97058DDC4036C1B1937606715876295D200667AA48F67CFDB66410133E5E11"
        )
    );

    echo "<pre>";
    //var_dump($client->execute(new Balance())->result);

    //var_dump ($client->execute(new Charges())->result);
    //var_dump ($client->execute(new ChargesCancel("chr_62F1A5CEB80F6705CBFF6CAFA36014CE"))->status_code);
    /*     $data['charge'] = [
        'description' => 'teste',
        'amount' => 1000.0,
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
        'name' => 'testeee',
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

    $data['chargeId'] = 'chr_D2AB8416272B8586C9D73F906C387A29';
    $data['billing'] = [
        'email' => 'leonardo@webgopher.com.br',
        'address' => [
            'street' => 'Rua benedita soares',
            'number' => '2123',
            'complement' => 'ap 1212112',
            'neighborhood' => 'Floresta',
            'city' => 'Cascavel',
            'state' => 'PR',
            'postCode' => '85814524',
        ],
        'delayed' => true,
    ];
    $data['creditCardDetails'] = [
        'creditCardHash' => '9ec44a7b-b742-4900-be62-2f49d0f50ed2'
    ];

    var_dump($client->execute(new PaymentCreate($data))->result);

    ?>
</body>

</html>

<script type="text/javascript" src="https://sandbox.boletobancario.com/boletofacil/wro/direct-checkout.min.js"></script>

<script type="text/javascript">
    var checkout = new DirectCheckout('DA7A128EEE2DE8E0211CE58DE35E145CA26FD32C5336F138B023892B9CF92F4A', false);
    /* Em sandbox utilizar o construtor new DirectCheckout('PUBLIC_TOKEN', false); */

    function generateHash() {
        var cardData = {
            cardNumber: '5362682003164890',
            holderName: 'Nome do Titular do Cartão',
            securityCode: '646',
            expirationMonth: '12',
            expirationYear: '2022'
        };

        checkout.getCardHash(cardData, function(cardHash) {
            console.log(cardHash)
        }, function(error) {
            console.log(error)
        });

    }

    generateHash();
</script>