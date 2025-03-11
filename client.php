<?php
require_once 'vendor/autoload.php';
require_once 'vendor/econea/nusoap/src/nusoap.php';

class SOAPClient
{
  private $client;
  private $WSDL_URL = 'http://localhost/galvis-ws/clase-4/invoke.php?wsdl';

  public function __construct()
  {
    $this->client = new nusoap_client($this->WSDL_URL, true);

    $err = $this->client->getError();
    if ($err) {
      throw new Exception('Error en el constructor' . $err);
    }
  }

  public function sum($num1, $num2)
  {
    $result = $this->client->call('Server.Sum', ['num1' => $num1, 'num2' => $num2]);

    if ($this->client->fault) {
      return ['error' => 'Fault', 'detail' => $result];
    } else {
      $err = $this->client->getError();
      if ($err) {
        return ['error' => 'Error', 'detail' => $err];
      } else {
        return ['result' => $result];
      }
    }
  }
}

try {
  $SOAPClient = new SOAPClient();
  $response = $SOAPClient->sum(10, 5);
  echo '<h2>Respuesta</h2> <pre>';
  print_r($response);
  echo '</pre>';

} catch (Exception $e) {
  echo '<h2>Error</h2><pre> ' . $e->getMessage() . '</pre>';
}