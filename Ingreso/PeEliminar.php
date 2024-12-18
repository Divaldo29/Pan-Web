<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://panaderia.informaticapp.com/pedidos/'.$_GET['id'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'DELETE',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2Vrb0h1bE9WbFpwbk5TWnpDMkd6dndQaHVKQ0Y3NWltOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlQmt5eUlmWGJWS1FFZmJ1NTJ4NUZsTWFpTGt1TDUwNg=='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$data = json_decode($response, true);
header("Location: Pedidos.php?usuid=".$_GET['usuid']."&emp=".$_GET['emp']."&sucu=".$_GET['sucu']);
?>