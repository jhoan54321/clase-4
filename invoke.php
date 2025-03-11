<?php

require_once 'vendor/autoload.php';
require_once 'vendor/econea/nusoap/src/nusoap.php';
require_once 'server.php';

$namespace = 'urn:my-web-service-wsdl';

$server = new nusoap_server();
$server->configureWSDL('MyFirstWebService');
$server->wsdl->schemaTargetNamespace = $namespace;

$server->register(
    'Server.Sum',
    ['num1' => 'xsd:integer', 'num2' => 'xsd:integer'],
    ['return' => 'xsd:string'],
    $namespace,
    'Sumar valores...'

);
$server->service(file_get_contents('php://input'));
exit();