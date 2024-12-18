<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://panaderia.informaticapp.com/usuarios/'.$_GET['id'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => 
        'es_id='.$_POST['es_id'].
        '&us_nombre='.$_POST['us_nombre'].
        '&us_apellido='.$_POST['us_apellido'].
        '&us_correo='.$_POST['us_correo'].
        '&us_usuario='.$_POST['us_usuario'].
        '&us_password='.$_POST['us_password'].
        '&perm_id='.$_POST['perm_id'],
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/x-www-form-urlencoded',
          'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VnQk52YmVqbFhDdjJ5Nkx1MUlCRC5YU3VTQmFSSjVLOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlUzU0Lmh3RXlQL2V1OGFVeEp5dEVtSHdLdlBCeUowSw=='
        ),
      ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    $data = json_decode($response, true);
    //var_dump($data); die;
    header("location: Usuarios.php?usuid=".$_GET['usuid']."&emp=".$_GET['emp']."&sucu=".$_GET['sucu']);


}

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://panaderia.informaticapp.com/usuarios/'.$_GET['id'],
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
$usuarios = json_decode($response, true);
$curl2 = curl_init();

curl_setopt_array($curl2, array(
  CURLOPT_URL => 'https://panaderia.informaticapp.com/establecimiento',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_POSTFIELDS => 'es_id=2&us_nombre=Nikola&us_apellido=Lance&us_correo=marquirios15%40gmail.com&us_usuario=boris&us_password=321&perm_id=2',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded',
    'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VnQk52YmVqbFhDdjJ5Nkx1MUlCRC5YU3VTQmFSSjVLOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlUzU0Lmh3RXlQL2V1OGFVeEp5dEVtSHdLdlBCeUowSw=='
  ),
));

$response = curl_exec($curl2);

curl_close($curl2);
$establecimiento = json_decode($response, true);

$curl3 = curl_init();

curl_setopt_array($curl3, array(
  CURLOPT_URL => 'https://panaderia.informaticapp.com/permisos',
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

$response = curl_exec($curl3);

curl_close($curl3);
$permisos = json_decode($response, true);
?>
<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Editas Usuario</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

		<!-- JS, Popper.js, and jQuery -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	</head>
	<body>
	<div class="container">
		<h1>Editar Usuario</h1>
		<form method="post" class="col-xl-8 offset-2">
            <!-- Desde aca para el foreach-->
            <select name="es_id" value="<?= $usuarios['Detalle'][0]["es_id"] ?>" id="<?= $usuarios['Detalle'][0]["es_id"] ?>" >
			<?php foreach($establecimiento["Detalle"] as $esta):?>	
			<option type="text" id='<?= $perm["es_id"]?>' <?php if($esta["es_id"] == $usuarios['Detalle'][0]['es_id'] )echo "selected";?> value="<?= $esta["es_id"]?>"> <?= 'Dirección:'.$esta["su_direccion"].' Distrito:'.$esta["su_distrito"].' Departamento: '.$esta["su_distrito"] ?></option>
			<?php endforeach?>
		</select>	
    
	
    <select name="perm_id">
			<?php foreach($permisos["Detalle"] as $perm):?>	
			<option type="text" value="<?= $perm["perm_id"] ?>" <?php if($perm["perm_id"] == $usuarios['Detalle'][0]['perm_id'] )echo "selected";?> ><?= $perm["perm_id"]?> <?= $perm["ro_nombrerol"]?></option>
			<?php endforeach?>
		</select>	
		<!-- Hasta aca-->
			<input type="text" name="us_nombre" placeholder="Nombre Completo" class="form-control" value='<?= $usuarios['Detalle'][0]["us_nombre"]?>'>
			<input type="text" name="us_apellido" placeholder="Apellido Completo" class="form-control" value='<?= $usuarios['Detalle'][0]["us_apellido"]?>'>
			<input type="email" name="us_correo" placeholder="Correo" class="form-control" value='<?= $usuarios['Detalle'][0]["us_correo"]?>'>
			<input type="phone" name="us_usuario" placeholder="Usuario" class="form-control" value='<?= $usuarios['Detalle'][0]["us_usuario"]?>'>
			<input type="phone" name="us_password" placeholder="Contraseña" class="form-control" value='<?= $usuarios['Detalle'][0]["us_password"]?>'>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="Usuarios.php" class="btn btn-danger">Cancelar</a>
		</form>
	</div>
	</body>
  <script src="js/scripts.js"></script>

	</html>