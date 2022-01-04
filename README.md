# Juno-SDK
> Sdk não oficial

Para mais informações acesse a [WIKI](https://github.com/LeonardoManrich/Juno-SDK/wiki)

## Starting

para instalar execute:
```sh 
composer require manrich/juno
```

#

As chamadas feitas vão sempre te retornar o status http, headers, reason_phrase e o resultado.
> O status_code só retornará um código http em caso de falha de comunicação com o servidor ou sucesso.
> Caso seja algum erro referente a api, será retornado o código do erro que está documentado na api.

> Você pode ver os códigos de erros aqui: <a href="https://integracao.juno.com.br/docs/error-codes/" target="_blank"> Juno códigos de erros </a>

- Exemplo:

```php 
   
include '../vendor/autoload.php';

use Webgopher\Juno\Core\Environment\SandboxEnvironment;
use Webgopher\Juno\Core\Http\JunoClient;

$clientId = '....';
$clientSecret = '......';
$secretToken = '......';

$environment = new SandboxEnvironment($clientId, $clientSecret, $secretToken);

$juno = new JunoClient($environment);

echo '<pre>';
var_dump($juno->execute(new \Webgopher\Juno\Api\Balance\Balance()));
```
O código acima resultará nisso:

```
object(stdClass)#21 (4) {
  ["status_code"]=>
  int(200)
  ["headers"]=>
  array() {
   ...
  }
  ["reason_phrase"]=>
  string(3) "200"
  ["result"]=>
  object(stdClass)#36 (4) {
    ["balance"]=>
    float(160194.99)
    ["withheldBalance"]=>
    float(10768.52)
    ["transferableBalance"]=>
    float(149426.47)
    ["_links"]=>
    object(stdClass)#33 (1) {
      ["self"]=>
      object(stdClass)#38 (1) {
        ["href"]=>
        string(58) "https://sandbox.boletobancario.com/api-integration/balance"
      }
    }
  }
}
```

Você pode separar o resultado assim:

```php 

$request = $juno->execute(new \Webgopher\Juno\Api\Balance\Balance());

$status_code = $request->status_code;
$headers = $request->headers;
$reason_phrase = $request->reason_phrase;
$result = $request->result;

```

> Use ```$reason_phrase``` e ```$status_code``` para tratar possíveis erros tais como: cartão inválido, cartão sem saldo, etc...
