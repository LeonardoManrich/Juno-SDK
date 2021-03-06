<?php

namespace App\Libraries\Juno\Payments;

include 'vendor/autoload.php';

use examples\Juno;
use Webgopher\Juno\Api\Payments\PaymentCreate;

class CreatePayment
{

    public static function createPayment($data, $debug = false)
    {
        $client = Juno::client();

        $response = $client->execute(new PaymentCreate($data))->result;

        if ($debug) {
            echo '<pre>';
            die(var_dump($response));
        }

        //Para tratar erros da api, tais como Cartão inválido, Endereço inválido, etc.
        if (!isset($response->status_code) || (!in_array(@$response->status_code, [200, 204]) && isset($response['body']))) {
            return [
                'status_code' => json_decode($response['body'])->status,
                'errorCode' => json_decode($response['body'])->details[0]->errorCode,
                'reason_phrase' => json_decode($response['body'])->details[0]->message
            ];
        }

        return $response;
    }

    private static function body()
    {
        //reference: https://dev.juno.com.br/api/v2#operation/createPayment
        return [
            'chargeId' => 'chr_D2AB8416272B8586C9D73F906C387A29',
            'billing' => [
                'email' => 'email@email.com',
                'address' => [
                    'street' => 'Rua',
                    'number' => '123',
                    'complement' => 'ap 234',
                    'neighborhood' => 'Bairro',
                    'city' => 'Cidade',
                    'state' => 'UF',
                    'postCode' => '99999999',
                ],
                'delayed' => true,
            ],
            'creditCardDetails' => [
                'creditCardHash' => '5ec114a7b-b742-4310-be62-2f43d0250ed2'
            ]
        ];
    }
}
