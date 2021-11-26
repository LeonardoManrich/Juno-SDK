<?php

namespace Webgopher\Juno\Examples\Payments;

use examples\JunoHttpClient;
use Webgopher\Juno\Api\Payments\PaymentCreate;

class CreatePayment
{

    public static function createPayment($debug = true)
    {
        $client = JunoHttpClient::client();

        $data = self::body();

        $response = $client->execute(new PaymentCreate($data));

        if ($debug) {

            return var_dump($response);

            //echo json_encode($response->result, JSON_PRETTY_PRINT), "\n";

        }

        return $response->result;
    }

    private static function body()
    {
        //reference: https://dev.juno.com.br/api/v2#operation/createPayment
        $data = [
            'chargeId' => 'chr_D2AB8416272B8586C9D73F906C387A29',
            'billing' => [
                'email' => 'teste@mail.com.br',
                'address' => [
                    'street' => 'Rua natal',
                    'number' => '2340',
                    'complement' => 'sala 01',
                    'neighborhood' => 'Tropical',
                    'city' => 'Cascavel',
                    'state' => 'PR',
                    'postCode' => '85807100',
                ],
                'delayed' => true,
            ],
            'creditCardDetails' => [
                'creditCardHash' => '9ec44a7b-b742-4900-be62-2f49d0f50ed2'
            ]
        ];

        return $data;
    }
}
