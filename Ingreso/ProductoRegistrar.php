<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://panaderia.informaticapp.com/productos',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array(
    'pro_nombre' => $_POST['pro_nombre'],
    'pro_descripcion' => $_POST['pro_descripcion'],
    'tpro_id' => $_POST['tpro_id'],
    'pro_PrecioUnitario' => $_POST['pro_PrecioUnitario'],
    'pro_marca' => $_POST['pro_marca'],
    'pro_imagen'=> new CURLFILE($_FILES['pro_imagen']['tmp_name']),
    'empresa' => $_GET['emp']),
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VnQk52YmVqbFhDdjJ5Nkx1MUlCRC5YU3VTQmFSSjVLOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlUzU0Lmh3RXlQL2V1OGFVeEp5dEVtSHdLdlBCeUowSw=='
  ),
));

$response = curl_exec($curl);

curl_close($curl);

		$data = json_decode($response, true);
		header("Location: Producto.php?usuid=".$_GET['usuid']."&emp=".$_GET['emp']."&sucu=".$_GET['sucu']);
    }

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
        'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VnQk52YmVqbFhDdjJ5Nkx1MUlCRC5YU3VTQmFSSjVLOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlUzU0Lmh3RXlQL2V1OGFVeEp5dEVtSHdLdlBCeUowSw=='
      ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    
    $data2 = json_decode($response, true);




?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registrar Producto</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<!-- JS, Popper.js, and jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
	<h1>Registrar Producto</h1>
	<form method="post" enctype="multipart/form-data" class="col-xl-8 offset-2">
    <a> Nombre del producto
		<input type="text" name="pro_nombre" placeholder="Nombre del producto" class="form-control"> <br>
    <a> Selecciona una imagen
    <input type="file" class="form-control" name="pro_imagen" id="formFile" accept="image/*"  />  <a> Descripcion
		<input type="text" name="pro_descripcion" placeholder="Descripcion" class="form-control"> <br>
    <a> Precio Unitario
		<input type="phone" name="pro_PrecioUnitario" placeholder="Precio Unitario" class="form-control"> <br>
    <a> Marca
		<input type="text" name="pro_marca" placeholder="Marca" class="form-control"> <br>
    <label >Tipo de producto</label>
    <select name="tpro_id" >
          <?php foreach($data2["Detalle"] as $tipo):?>	
          <option type="text" value="<?=$tipo["tpro_id"]?>"><?= $tipo["tpro_nombre"];?></option>
          <?php endforeach?>
    </select><br><br>
		<button type="submit" class="btn btn-success">Guardar</button>
		<a href="Producto.php?usuid=<?= $_GET['usuid']?>&emp=<?= $_GET['emp']?>&sucu=<?=$_GET['sucu']?>" class="btn btn-danger">Cancelar</a>
	</form>
		
</div>
</body>
</html>