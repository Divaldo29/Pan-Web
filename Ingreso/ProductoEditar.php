
<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://panaderia.informaticapp.com/productos/'.$_POST['pro_id'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
		CURLOPT_POSTFIELDS => 
		'pro_nombre='.$_POST['pro_nombre'].
		'&pro_descripcion='.$_POST['pro_descripcion'].
		'&tpro_id='.$_POST['tpro_id'].
		'&pro_PrecioUnitario='.$_POST['pro_PrecioUnitario'].
		'&pro_marca='.$_POST['pro_marca'].
		'&empresa='.$_GET['emp'],
		CURLOPT_HTTPHEADER => array(
    	'Content-Type: application/x-www-form-urlencoded',
		'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VnQk52YmVqbFhDdjJ5Nkx1MUlCRC5YU3VTQmFSSjVLOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlUzU0Lmh3RXlQL2V1OGFVeEp5dEVtSHdLdlBCeUowSw=='
	  ),
	));
	
        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response, true);
		//var_dump($data, true); die;
        header("Location: Producto.php?usuid=".$_GET['usuid']."&emp=".$_GET['emp']."&sucu=".$_GET['sucu']);
		
    }
    else{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://panaderia.informaticapp.com/productos/'.$_GET['id'],
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
			CURLOPT_URL => 'https://panaderia.informaticapp.com/TiposProductos',
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
		$TipoProducto = json_decode($response, true);
		//var_dump($TipoProducto["Detalle"]["0"], true); die;	
		//aca-------------------------------------------------------
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Editar Producto</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<!-- JS, Popper.js, and jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
	<h1>Editar Productos</h1>
	<form method="post"  class="col-xl-8 offset-2" enctype="multipart/form-data">
		<input type="hidden" name="pro_id" value="<?= $data["Detalle"]["0"]['pro_id']?>">
		<a> Nombre del producto
		<input type="text" name="pro_nombre" class="form-control" value="<?= $data["Detalle"]["0"]['pro_nombre']?>"> <br>
		<a> Descripcion
		<input type="text" name="pro_descripcion" class="form-control" value="<?= $data["Detalle"]["0"]['pro_descripcion']?>"><br>
		<a> Precio Unitario
		<input type="phone" name="pro_PrecioUnitario"  class="form-control" value="<?= $data["Detalle"]["0"]['pro_PrecioUnitario']?>"><br>
		<a> Marca
		<input type="text" name="pro_marca"  class="form-control" value="<?= $data["Detalle"]["0"]['pro_marca']?>"><br>
		
		<!-- Desde aca para el foreach-->
		<a> Tipo Producto
		<select name="tpro_id"  id="<?=$data["Detalle"]["0"]['tpro_id']?>">
			<?php foreach($TipoProducto["Detalle"] as $tipo):?>	
			<option type="text" id="<?=$tipo["tpro_id"]?>" value="<?=$tipo["tpro_id"]?>"><?= $tipo["tpro_nombre"];?></option>
			<?php endforeach?>
		</select> <br> <br>	
		<!-- Hasta aca-->

			
		<button type="submit" class="btn btn-success">Guardar</button>
		<a href="Producto.php?usuid=<?= $_GET['usuid']?>&emp=<?= $_GET['emp']?>&sucu=<?=$_GET['sucu']?>" class="btn btn-danger">Cancelar</a>
		

	</form>
	
</div>
</body>
</html>