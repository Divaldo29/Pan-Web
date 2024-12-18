<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$curl5 = curl_init();
    
    curl_setopt_array($curl5, array(
      CURLOPT_URL => 'https://panaderia.informaticapp.com/stock',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>
      'st_CantidadAdquirida='.$_POST['st_CantidadAdquirida'].
      '&st_CantidadDisponible='.$_POST['st_CantidadDisponible'].
      '&pro_id='.$_POST['pro_id'].
      '&st_codigo='.$_POST['st_codigo'],
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/x-www-form-urlencoded',
        'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VhQml0WTF6d3RzdmFKRVI2LlR5bURvUHZnbE42RVdTOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlbW5waGpGZG42M3NKNGxBdHd0b3BwZ1N5dzBJT1NLMg=='
      ),
    ));
    
    $response = curl_exec($curl5);
    
    curl_close($curl5);
    $st = json_decode($response, true);


  $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://panaderia.informaticapp.com/pagos/'.$_GET['id'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS =>
  'st_id='.$_POST['st_id'].
  '&pag_PrecioCompra='.$_POST['pag_PrecioCompra'].
  '&pv_id='.$_POST['pv_id'].
  '&pag_FechaCompra='.$_POST['pag_FechaCompra'],

  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VJMzNOeC5PUUxobnU5eVBnbEJjQVJDMFgydnU5RUtxOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdleUY1TXJBdUh4eDZKYjdZR0VPMWE4UjFWYlFad2VnVw=='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$data = json_decode($response, true);
header("Location: Pagos.php?usuid=".$_GET['usuid']."&emp=".$_GET['emp']."&sucu=".$_GET['sucu']);

	}
	$curl1 = curl_init();
	
	curl_setopt_array($curl1, array(
	  CURLOPT_URL => 'https://panaderia.informaticapp.com/pagos/'.$_GET['id'],
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
	
	$response = curl_exec($curl1);
	
	curl_close($curl1);
	$data = json_decode($response, true);
	
	$curl1 = curl_init();

    curl_setopt_array($curl1, array(
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

    $response = curl_exec($curl1);

    curl_close($curl1);
    $productos = json_decode($response, true);

   
    $curl4 = curl_init();

    curl_setopt_array($curl4, array(
      CURLOPT_URL => 'https://panaderia.informaticapp.com/proveedores',
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

    $response = curl_exec($curl4);

    curl_close($curl4);
    		//var_dump($data, true); die;
    $proveedores = json_decode($response, true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Editar Pagos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<!-- JS, Popper.js, and jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-Df3z2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
	<h1>Editar Pagos</h1>
	<form method="post" class="col-xl-8 offset-2">

	 <!-- Proveedores-->
   <a> Proveedor
	 <select name="pv_id" id="<?=$data["Detalle"]["0"]['pv_id']?>">
			<?php foreach($proveedores["Detalle"] as $prov):?>	
			<option type="text" id="<?=$prov["pv_id"]?>" value="<?=$prov["pv_id"]?>"><?= $prov["pv_RazonSocial"];?></option>
			<?php endforeach?>
		</select><br><br>
		<!-- Hasta aca-->

		<!-- Sector Stock-->
    <a> Productos
		<select name="pro_id" id="<?=$data["Detalle"]["0"]['pro_id']?>">
			<?php foreach($productos["Detalle"] as $pro):?>	
			<option type="text" id="<?=$pro["pro_id"]?>" value="<?=$pro["pro_id"]?>"><?= $pro["pro_nombre"];?></option>
			<?php endforeach?>
		</select>	<br><br>
    <input type="hidden" name="st_id"  class="form-control" value="<?= $data["Detalle"]["0"]['st_id']?>"> 
    <!-- <a> -->
    <a> Cantidad Adquirida
    <input type="text" name="st_CantidadAdquirida"  class="form-control" value="<?= $data["Detalle"]["0"]['st_CantidadAdquirida']?>"> <br>
    <a> Cantidad Disponible
    <input type="text" name="st_CantidadDisponible"  class="form-control" value="<?= $data["Detalle"]["0"]['st_CantidadDisponible']?>"><br>
    <a> Codigo stock
    <input type="text" name="st_codigo"  class="form-control" value="<?= $data["Detalle"]["0"]['st_codigo']?>"><br>
		<!-- Hasta aca-->
    <a> Precio de la Compra
    <input type="phone" name="pag_PrecioCompra" class="form-control" value="<?= $data["Detalle"]["0"]['pag_PrecioCompra']?>"><br>
    <a> Fecha de la Compra
    <input type="input" name="pag_FechaCompra" class="form-control" value="<?= $data["Detalle"]["0"]['pag_FechaCompra']?>"><br> 
		<button type="submit" class="btn btn-success">Guardar</button>
		<a href="Pagos.php?usuid=<?= $_GET['usuid']?>&emp=<?= $_GET['emp']?>&sucu=<?=$_GET['sucu']?>" class="btn btn-danger">Cancelar</a>
		

	</form>
</div>
</body>
</html>