<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://panaderia.informaticapp.com/stock/'.$_POST['st_id'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => 
                'st_CantidadAdquirida='.$_POST["st_CantidadAdquirida"].
                '&st_CantidadDisponible='.$_POST["st_CantidadDisponible"].
                '&pro_id='.$_POST["pro_id"].
				'&empresa='.$_POST["empresa"].
				'&sucursal='.$_POST["sucursal"].
                '&st_codigo='.$_POST["st_codigo"],
        CURLOPT_HTTPHEADER => array(
            'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VhQml0WTF6d3RzdmFKRVI2LlR5bURvUHZnbE42RVdTOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlbW5waGpGZG42M3NKNGxBdHd0b3BwZ1N5dzBJT1NLMg=='
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response, true);
		header("Location: Stock.php?usuid=".$_GET['usuid']."&emp=".$_GET['emp']."&sucu=".$_GET['sucu']);
    }else{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://panaderia.informaticapp.com/stock/'.$_GET['id'],
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VhQml0WTF6d3RzdmFKRVI2LlR5bURvUHZnbE42RVdTOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlbW5waGpGZG42M3NKNGxBdHd0b3BwZ1N5dzBJT1NLMg=='		  ),
		));
		//<!-- Desde aca para el foreach-->
		$response = curl_exec($curl);
		
		curl_close($curl);
		$data = json_decode($response, true);
		

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
				'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VhQml0WTF6d3RzdmFKRVI2LlR5bURvUHZnbE42RVdTOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlbW5waGpGZG42M3NKNGxBdHd0b3BwZ1N5dzBJT1NLMg=='
			),
			));

		$response = curl_exec($curl);

		curl_close($curl);
		$producto = json_decode($response, true);
		//var_dump($producto["Detalle"]["0"], true); die;	
		//aca-------------------------------------------------------
        }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Editar Stock</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<!-- JS, Popper.js, and jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
	<h1>Editar Stock</h1>
	<form method="post" class="col-xl-8 offset-2">
        <input type="hidden" name="st_id" value="<?= $data["Detalle"]["0"]['st_id']?>">
		<input type="hidden" name="empresa" value="<?= $data["Detalle"]["0"]['empresa']?>">
		<input type="hidden" name="sucursal" value="<?= $data["Detalle"]["0"]['sucursal']?>">
		<!--<a> Cantidad Adquirida </a> -->
		<a> Cantidad Adquirida
        <input type="text" name="st_CantidadAdquirida" class="form-control" value="<?= $data["Detalle"]["0"]['st_CantidadAdquirida']?>"> <br>
		<a> Cantidad Disponible
		<input type="text" name="st_CantidadDisponible" class="form-control" value="<?= $data["Detalle"]["0"]['st_CantidadDisponible']?>"> <br>
		<a> Codigo stock
		<input type="phone" name="st_codigo"  class="form-control" value="<?= $data["Detalle"]["0"]['st_codigo']?>"> <br>
		<!-- Desde aca para el foreach-->
		<a> Lista Productos
		<select name="pro_id"  id="<?=$data["Detalle"]["0"]['pro_id']?>">
			<?php foreach($producto["Detalle"] as $tipo):?>	
			<option type="text" id="<?=$tipo["pro_id"]?>" value="<?=$tipo["pro_id"]?>"><?= $tipo["pro_nombre"];?></option>
			<?php endforeach?> 
		</select>	<br> <br>
		<!-- Hasta aca-->

			
		<button type="submit" class="btn btn-success">Guardar</button>
		<a href="Stock.php?usuid=<?= $_GET['usuid']?>&emp=<?= $_GET['emp']?>&sucu=<?=$_GET['sucu']?>" class="btn btn-danger">Cancelar</a>
		

	</form>
	
</div>
</body>
</html>