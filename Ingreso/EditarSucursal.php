<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://panaderia.informaticapp.com/establecimiento/'.$_GET['id'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
        'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VnQk52YmVqbFhDdjJ5Nkx1MUlCRC5YU3VTQmFSSjVLOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlUzU0Lmh3RXlQL2V1OGFVeEp5dEVtSHdLdlBCeUowSw=='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$sucursal = json_decode($response, true);
//var_dump($sucursal); die;


if($_SERVER["REQUEST_METHOD"]=="POST"){

  $curl3 = curl_init();

curl_setopt_array($curl3, array(
  CURLOPT_URL => 'https://panaderia.informaticapp.com/establecimiento/'.$_GET['id'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS => 
  'su_id='.$_POST['su_id'].
  '&es_nombre='.$_POST['es_nombre'].
  '&es_nombencargado='.$_POST['es_nombencargado'].
  '&es_apencargado='.$_POST['es_apencargado'],
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded',
    'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VnQk52YmVqbFhDdjJ5Nkx1MUlCRC5YU3VTQmFSSjVLOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlUzU0Lmh3RXlQL2V1OGFVeEp5dEVtSHdLdlBCeUowSw=='
  ),
));

$response = curl_exec($curl3);

curl_close($curl3);
$establecimiento = json_decode($response, true);




$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://panaderia.informaticapp.com/sucursal/'.$_POST['su_id'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS => 
  'su_direccion='.$_POST['su_direccion'].
  '&su_distrito='.$_POST['su_distrito'].
  '&su_departamento='.$_POST['su_departamento'].
  '&em_id='.$_GET['emp'],
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded',
    'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VnQk52YmVqbFhDdjJ5Nkx1MUlCRC5YU3VTQmFSSjVLOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlUzU0Lmh3RXlQL2V1OGFVeEp5dEVtSHdLdlBCeUowSw=='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$sucursal = json_decode($response, true);
//var_dump($sucursal); die;
header("location: Sucursal.php?usuid=".$_GET['usuid']."&emp=".$_GET['emp']."&sucu=".$_GET['sucu']);

}

?>


<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Editar Sucursal</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

		<!-- JS, Popper.js, and jQuery -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	</head>
	<body>
  <?php include('Seguridad.php')?>
	<div class="container">
		<h1>Editar Sucursal</h1>
    
		<form method="post" class="col-xl-8 offset-2">
			<input hidden type="text" name="su_id" placeholder="Direccion" value="<?= $sucursal['Detalle'][0]['su_id']?>" class="form-control">
			<input hidden type="text" name="su_direccion" placeholder="Direccion" value="<?= $sucursal['Detalle'][0]['su_direccion']?>" class="form-control">
			<input type="text" name="su_direccion" placeholder="Direccion" value="<?= $sucursal['Detalle'][0]['su_direccion']?>" class="form-control">
			<input type="text" name="su_distrito" placeholder="Distrito"  value="<?= $sucursal['Detalle'][0]['su_distrito']?>"  class="form-control">
			<input type="text" name="su_departamento" placeholder="Departamento" value="<?= $sucursal['Detalle'][0]['su_departamento']?>"  class="form-control">
      <input type="text" name="es_nombre" placeholder="Etiqueta" value="<?= $sucursal['Detalle'][0]['es_nombre']?>" class="form-control">
			<input type="text" name="es_nombencargado" placeholder="Nombre Encargado" value="<?= $sucursal['Detalle'][0]['es_nombencargado']?>" class="form-control">
			<input type="text" name="es_apencargado" placeholder="Apellido Encargado" value="<?= $sucursal['Detalle'][0]['es_apencargado']?>" class="form-control">

			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="Sucursal.php?usuid=<?=$_GET['usuid']?>&emp=<?=$_GET['emp']?>&sucu=<?=$_GET['sucu']?>" class="btn btn-danger">Cancelar</a>
		</form>
	</div>
	</body>
	</html>