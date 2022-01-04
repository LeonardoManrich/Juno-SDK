<?php

namespace App\Libraries\Juno\Payments;

include 'vendor/autoload.php';

use examples\Juno;
use Webgopher\Juno\Api\Charges\ChargesCreate;

class ChargeCreate
{

    public static function createCharge($data, $debug = false)
    {
        $client = Juno::client();

        $response = $client->execute(new ChargesCreate($data))->result;

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
        //reference: https://dev.juno.com.br/api/v2#operation/createCharge
        return [
            'charge' => [
                'description' => 'nome do produto/servico',
                'amount' => 1000.0,
                'paymentTypes' => ['CREDIT_CARD'],
                'split' => [
                    'recipientToken' => '',
                    'amount' => '',
                    'percentage' => '',
                    'amountRemainder' => '',
                    'chargeFee' => '',
                ]
            ],
            'billing' => [
                'name' => 'teste',
                'document' => 'cpf/cnpj',
                'email' => 'email@email.com',
                'address' => [
                    'street' => 'Rua',
                    'number' => '123',
                    'complement' => 'ap 234',
                    'neighborhood' => 'Bairro',
                    'city' => 'Cidade',
                    'state' => 'UF',
                    'postCode' => '99999999',
                ]
            ]
        ];

    }
}
