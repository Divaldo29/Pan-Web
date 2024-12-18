<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://panaderia.informaticapp.com/TipoPromociones/'.$_GET['id'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'DELETE',
  CURLOPT_POSTFIELDS => 'tpromo_nombre=wea3&tpromo_descripcion=wea23',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded',
    'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VBeWsuUEJrZXZJTG1VSHJvMGFhWFMxeHViLjRsZmQuOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlRlBxek1RT093UVRHdEVObVpzdndkRnRXYTI2TjlnMg=='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$data= json_decode($response, true);
//var_dump($data, true); die;
header("Location: TipoPromocion.php?usuid=".$_GET['usuid']."&emp=".$_GET['emp']."&sucu=".$_GET['sucu']);
?>