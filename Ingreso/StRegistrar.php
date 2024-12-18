<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://panaderia.informaticapp.com/stock',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => 
                'st_CantidadAdquirida='.$_POST["st_CantidadAdquirida"].
                '&st_CantidadDisponible='.$_POST["st_CantidadDisponible"].
                '&pro_id='.$_POST["pro_id"].
                '&st_codigo='.$_POST["st_codigo"].
                '&sucursal='.$_POST["sucursal"].
                '&empresa='.$_POST["empresa"],
        CURLOPT_HTTPHEADER => array(
            'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VhQml0WTF6d3RzdmFKRVI2LlR5bURvUHZnbE42RVdTOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlbW5waGpGZG42M3NKNGxBdHd0b3BwZ1N5dzBJT1NLMg=='
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response, true);
        //var_dump($response, true); die;
		header("Location: Stock.php?usuid=".$_GET['usuid']."&emp=".$_GET['emp']."&sucu=".$_GET['sucu']);

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

            $curl = curl_init();
            
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://panaderia.informaticapp.com/sucursal',
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
	<title>Registrar Stock</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<!-- JS, Popper.js, and jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
	<h1>Registrar Stock</h1>
	<form method="post" class="col-xl-8 offset-2">
        <a> Cantidad Adquirida
		<input type="phone" name="st_CantidadAdquirida" placeholder="Cantidad recibida" class="form-control"> <br>
        <a> Cantidad Disponible
		<input type="phone" name="st_CantidadDisponible" placeholder="Cantidad disponible" class="form-control"> <br>
        <a> ID producto
	    <input type="phone" name="pro_id" placeholder="ID producto" class="form-control"> <br>
        <a> Codigo stock
		<input type="phone" name="st_codigo" placeholder="Codigo" class="form-control"> <br>
        <a> Empresa
        <input type="phone" name="empresa" placeholder= "Numero" class="form-control"> <br>
        <a> Sucursal
        <input type="phone" name="sucursal" placeholder= "Numero Sucursal" class="form-control"> <br>

		<button type="submit" class="btn btn-success">Guardar</button>
		<a href="Stock.php?usuid=<?= $_GET['usuid']?>&emp=<?= $_GET['emp']?>&sucu=<?=$_GET['sucu']?>" class="btn btn-danger">Cancelar</a>
	</form>
		
</div>
</body>
</html>