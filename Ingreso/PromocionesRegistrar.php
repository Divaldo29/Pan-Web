
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://panaderia.informaticapp.com/productos',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VBeWsuUEJrZXZJTG1VSHJvMGFhWFMxeHViLjRsZmQuOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlRlBxek1RT093UVRHdEVObVpzdndkRnRXYTI2TjlnMg=='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$productos= json_decode($response, true);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://panaderia.informaticapp.com/TipoPromociones',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VBeWsuUEJrZXZJTG1VSHJvMGFhWFMxeHViLjRsZmQuOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlRlBxek1RT093UVRHdEVObVpzdndkRnRXYTI2TjlnMg=='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$tipopromociones= json_decode($response, true);

if($_SERVER["REQUEST_METHOD"]=="POST"){

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://panaderia.informaticapp.com/promociones',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 
  'tpromo_id='.$_POST["tpromo_id"].
  '&pro_id='.$_POST["pro_id"].
  '&promo_descuento='.$_POST["promo_descuento"].
  '&promo_fechaini='.$_POST["promo_fechaini"].
  '&promo_fechafin='.$_POST["promo_fechafin"].
  '&empresa='.$_GET["emp"],
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded',
    'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VBeWsuUEJrZXZJTG1VSHJvMGFhWFMxeHViLjRsZmQuOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlRlBxek1RT093UVRHdEVObVpzdndkRnRXYTI2TjlnMg=='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$data = json_decode($response);
//var_dump($data, true); die; 
header("Location: Promociones.php?usuid=".$_GET['usuid']."&emp=".$_GET['emp']."&sucu=".$_GET['sucu']);

}
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
	<h1>Registrar Promociones</h1>
	<form method="post" class="col-xl-8 offset-2">
        <!-- Desde aca para el foreach-->
		<select name="pro_id" class="col-xl-8 offset-2" >
            <option value="">Seleccione Producto</option>
			<?php foreach($productos["Detalle"] as $produ):?>	
			<option type="text" value="<?=$produ["pro_id"]?>"><?= $produ["pro_nombre"];?></option>
			<?php endforeach?>
		</select>	
		<!-- Hasta aca-->
        <!-- Desde aca para el foreach-->
		<select name="tpromo_id" class="col-xl-8 offset-2" >
            <option value="">Seleccione tipo promocion</option>
			<?php foreach($tipopromociones["Detalle"] as $tipo):?>	
			<option type="text" value="<?=$tipo["tpromo_id"]?>"><?= $tipo["tpromo_nombre"];?></option>
			<?php endforeach?>
		</select>	
		<!-- Hasta aca-->

		<input type="text" name="promo_descuento" placeholder="Promo Descuento" class="form-control">
    
		<a href="">Fecha Inicio</a><input type="date" name="promo_fechaini" placeholder="promo_fechaini"  class="form-control">

		<a href="">Fecha fin</a><input type="date" name="promo_fechafin" placeholder="Fecha Final" class="form-control">
		
		<button type="submit" class="btn btn-success">Guardar</button>
		<a href="Promociones.php?usuid=<?= $_GET['usuid']?>&emp=<?= $_GET['emp']?>&sucu=<?=$_GET['sucu']?>" class="btn btn-danger">Cancelar</a>
	</form>
	
</div>
</body>
</html>