<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://panaderia.informaticapp.com/proveedores',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => 
                'pv_RazonSocial='.$_POST["pv_RazonSocial"].
                '&pv_ruc='.$_POST["pv_ruc"].
                '&pv_NombreEncargado='.$_POST["pv_NombreEncargado"].
                '&pv_ApellidoEncargado='.$_POST["pv_ApellidoEncargado"].
                '&pv_telefono='.$_POST["pv_telefono"].
                '&pv_direccion='.$_POST["pv_direccion"].
                '&empresa='.$_GET["emp"],
        CURLOPT_HTTPHEADER => array(
            'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VhQml0WTF6d3RzdmFKRVI2LlR5bURvUHZnbE42RVdTOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlbW5waGpGZG42M3NKNGxBdHd0b3BwZ1N5dzBJT1NLMg=='
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response, true);
		header("Location: Proveedores.php?usuid=".$_GET['usuid']."&emp=".$_GET['emp']."&sucu=".$_GET['sucu']);

    }else{
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://panaderia.informaticapp.com/empresa',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VhQml0WTF6d3RzdmFKRVI2LlR5bURvUHZnbE42RVdTOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlbW5waGpGZG42M3NKNGxBdHd0b3BwZ1N5dzBJT1NLMg=='
             ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            $data = json_decode($response, true);
        }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registrar Proveedor</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<!-- JS, Popper.js, and jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
	<h1>Registrar Proveedor</h1>
	<form method="post" class="col-xl-8 offset-2">
        <a> Razon Social
		<input type="text" name="pv_RazonSocial" placeholder="Nombre de la empresa" class="form-control"> <br>
        <a> RUC
		<input type="text" name="pv_ruc" placeholder="RUC" class="form-control"><br>
        <a> Nombre Encargado
		<input type="text" name="pv_NombreEncargado" placeholder="Nombre Encargado" class="form-control"><br>
        <a> Apellido Encargado
		<input type="text" name="pv_ApellidoEncargado" placeholder="Apellido Encargado" class="form-control"><br>
        <a> Telefono
		<input type="phone" name="pv_telefono" placeholder="Telefono" class="form-control"><br>
        <a> Direccion
        <input type="text" name="pv_direccion" placeholder="Direccion" class="form-control"><br>
		<button type="submit" class="btn btn-success">Guardar</button>
		<a href="Proveedores.php?usuid=<?= $_GET['usuid']?>&emp=<?= $_GET['emp']?>&sucu=<?=$_GET['sucu']?>" class="btn btn-danger">Cancelar</a>
	</form>
		
</div>
</body>
</html>