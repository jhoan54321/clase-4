<?php
class Server
{
  private $num1;
  private $num2;
  private $result;

  public function __construct()
  {

  }

  public function Sum($num1 = null, $num2 = null)
  {
    if (!is_numeric($num1) || !is_numeric($num2)) {
      return 'Error: los parámetros deben ser números.';
    }

    $num1 = intval($num1);
    $num2 = intval($num2);
    $result = $num1 + $num2;
    return 'El resultado de la suma de ' . $num1 . ' + ' . $num2 . ' es ' . $result;
  }
}