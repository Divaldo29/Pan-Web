<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://panaderia.informaticapp.com/usuarios',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => 
    'es_id='.$_POST['es_id'].
    '&us_nombre='.$_POST['us_nombre'].
    '&us_apellido='.$_POST['us_apellido'].
    '&us_correo='.$_POST['us_correo'].
    '&us_usuario='.$_POST['us_usuario'].
    '&us_password='.$_POST['us_password'].
    '&ro_id='.$_POST['ro_id'],
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/x-www-form-urlencoded',
      'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VnQk52YmVqbFhDdjJ5Nkx1MUlCRC5YU3VTQmFSSjVLOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlUzU0Lmh3RXlQL2V1OGFVeEp5dEVtSHdLdlBCeUowSw=='
    ),
  ));
  
  $response = curl_exec($curl);
  
  curl_close($curl);
$data = json_decode($response, true);
//var_dump($data, true); die;
header("location: Usuarios.php?usuid=".$_GET['usuid']."&emp=".$_GET['emp']."&sucu=".$_GET['sucu']);

}


$curl1 = curl_init();

curl_setopt_array($curl1, array(
  CURLOPT_URL => 'http://panaderia.informaticapp.com/roles',
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

$response = curl_exec($curl1);

curl_close($curl1);
$roles = json_decode($response, true);
//var_dump($roles, true); die;

$curl2 = curl_init();

curl_setopt_array($curl2, array(
  CURLOPT_URL => 'http://panaderia.informaticapp.com/establecimiento',
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

$response = curl_exec($curl2);

curl_close($curl2);
$esta = json_decode($response, true);


foreach ($esta['Detalle'] as $item) {
  if ($item['em_id'] == $_GET['emp']) {
      $data[] = $item;
  }}
  //var_dump($data);

?>
<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Registrar Cliente</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

		<!-- JS, Popper.js, and jQuery -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	</head>
	<body>
	<div class="container">
		<h1>Registrar Usuario</h1>
		<form method="post" class="col-xl-8 offset-2">
            <!-- Desde aca para el foreach-->
            <select name="es_id" >
			<?php foreach($data as $b):?>	
			<option type="text" value="<?= $b["es_id"]?>"> <?= 'Dirección:'.$b["su_direccion"].' Distrito:'.$b["su_distrito"].' Departamento: '.$b["su_distrito"] ?></option>
			<?php endforeach?>
		</select>	
		<!-- Hasta aca-->
        <!-- Desde aca para el foreach-->
            <select name="ro_id" >
			<?php foreach($roles["Detalle"] as $perm):?>	
			<option type="text" value="<?= $perm["ro_id"]?>"> <?= $perm["ro_nombrerol"]?></option>
			<?php endforeach?>
		</select>	
		<!-- Hasta aca-->
			<input type="text" name="us_nombre" placeholder="Nombre Completo" class="form-control">
			<input type="text" name="us_apellido" placeholder="Apellido Completo" class="form-control">
			<input type="email" name="us_correo" placeholder="Correo" class="form-control">
			<input type="phone" name="us_usuario" placeholder="Usuario" class="form-control">
			<input type="phone" name="us_password" placeholder="Contraseña" class="form-control">

<
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="Usuarios.php?usuid=<?=$_GET['usuid']?>&emp=<?=$_GET['emp']?>&sucu=<?=$_GET['sucu']?>" class="btn btn-danger">Cancelar</a>
		</form>
	</div>
	</body>
	</html>