<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://panaderia.informaticapp.com/TipoPromociones',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 
  'tpromo_nombre='.$_POST["tpromo_nombre"].
  '&tpromo_descripcion='.$_POST["tpromo_descripcion"], 
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded',
    'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VBeWsuUEJrZXZJTG1VSHJvMGFhWFMxeHViLjRsZmQuOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlRlBxek1RT093UVRHdEVObVpzdndkRnRXYTI2TjlnMg=='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$data= json_decode($response, true);
header("Location: TipoPromocion.php?usuid=".$_GET['usuid']."&emp=".$_GET['emp']."&sucu=".$_GET['sucu']);
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
	<h1>Registrar Tipo de Promocion</h1>
	<form method="post" class="col-xl-8 offset-2">

    <input type="text" name="tpromo_nombre" placeholder="Nombre"  class="form-control">

    <input type="text" name="tpromo_descripcion" placeholder="Descripcion" class="form-control">
		
		<button type="submit" class="btn btn-success">Guardar</button>
		<a href="TipoPromocion.php" class="btn btn-danger">Cancelar</a>
	</form>
	
</div>
</body>
</html>