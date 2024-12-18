<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://panaderia.informaticapp.com/ventas/'.$_GET['id'],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'PUT',
    CURLOPT_POSTFIELDS => 
    'cl_id='.$_POST["cl_id"].
    '&ve_fecha='.$_POST["ve_fecha"].
    '&tv_id='.$_POST["tv_id"].
    '&ve_total='.$_POST["ve_total"],
    CURLOPT_HTTPHEADER => array(
      'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VJMzNOeC5PUUxobnU5eVBnbEJjQVJDMFgydnU5RUtxOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdleUY1TXJBdUh4eDZKYjdZR0VPMWE4UjFWYlFad2VnVw=='
    ),
  ));
  
  $response = curl_exec($curl);
  

  
  curl_close($curl);
  $data = json_decode($response, true);
  
  $curl2 = curl_init();
    
    curl_setopt_array($curl2, array(
      CURLOPT_URL => 'https://panaderia.informaticapp.com/DetalleVentas/'.$_GET['id'],
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'PUT',
      CURLOPT_POSTFIELDS =>
      'dv_numero='.$_POST["dv_numero"].
      '&dv_ordenVenta='.$_POST["dv_ordenVenta"].
      '&ve_id='.$_POST["ve_id"].
      '&pro_id='.$_POST["pro_id"].
      '&tp_id='.$_POST["tp_id"].
      '&dv_cantidad='.$_POST["dv_cantidad"].
      '&dv_subtotal='.$_POST["dv_subtotal"].
      '&empresa='.$_GET["emp"],  
      CURLOPT_HTTPHEADER => array(
        'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VJMzNOeC5PUUxobnU5eVBnbEJjQVJDMFgydnU5RUtxOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdleUY1TXJBdUh4eDZKYjdZR0VPMWE4UjFWYlFad2VnVw=='
      ),
    ));
    
    $response = curl_exec($curl2);
    
    curl_close($curl2);
      
  $DetalleVentas = json_decode($response, true);
  //var_dump($DetalleVentas); die;  
  header("location: Ventas.php?usuid=".$_GET['usuid']."&emp=".$_GET['emp']."&sucu=".$_GET['sucu']);

}
else{

    $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://panaderia.informaticapp.com/ventas/'.$_GET['id'],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
      'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VJMzNOeC5PUUxobnU5eVBnbEJjQVJDMFgydnU5RUtxOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdleUY1TXJBdUh4eDZKYjdZR0VPMWE4UjFWYlFad2VnVw=='
    ),
  ));

  $response = curl_exec($curl);
  $data = json_decode($response, true);

  curl_close($curl);

  $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://panaderia.informaticapp.com/DetalleVentas/'.$_GET['id'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VJMzNOeC5PUUxobnU5eVBnbEJjQVJDMFgydnU5RUtxOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdleUY1TXJBdUh4eDZKYjdZR0VPMWE4UjFWYlFad2VnVw=='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$DetalleVentas = json_decode($response, true);
//var_dump($data); die;

$curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://panaderia.informaticapp.com/clientes',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
      'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VJMzNOeC5PUUxobnU5eVBnbEJjQVJDMFgydnU5RUtxOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdleUY1TXJBdUh4eDZKYjdZR0VPMWE4UjFWYlFad2VnVw=='
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);
  $cliente = json_decode($response, true);

  

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
      'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VJMzNOeC5PUUxobnU5eVBnbEJjQVJDMFgydnU5RUtxOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdleUY1TXJBdUh4eDZKYjdZR0VPMWE4UjFWYlFad2VnVw=='
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);
  $producto = json_decode($response, true);

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://panaderia.informaticapp.com/TipoVenta',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
      'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VJMzNOeC5PUUxobnU5eVBnbEJjQVJDMFgydnU5RUtxOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdleUY1TXJBdUh4eDZKYjdZR0VPMWE4UjFWYlFad2VnVw=='
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);
  $tipoventa = json_decode($response, true);

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://panaderia.informaticapp.com/TipoPago',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
      'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VJMzNOeC5PUUxobnU5eVBnbEJjQVJDMFgydnU5RUtxOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdleUY1TXJBdUh4eDZKYjdZR0VPMWE4UjFWYlFad2VnVw=='
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);
  $tipopago = json_decode($response, true);

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
      'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VJMzNOeC5PUUxobnU5eVBnbEJjQVJDMFgydnU5RUtxOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdleUY1TXJBdUh4eDZKYjdZR0VPMWE4UjFWYlFad2VnVw=='
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);
  $empresa =json_decode($response, true);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Editar Ventas</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<!-- JS, Popper.js, and jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script>
    function calcularTotal() {
      // Obtener los valores del subtotal y la cantidad del producto
      var subtotal = parseFloat(document.getElementById('subtotal').value);
      var cantidad = parseInt(document.getElementById('cantidad').value);
      
      // Calcular el total
      var total = subtotal * cantidad;
      
      // Actualizar el campo de texto del total
      document.getElementById('total').value = total.toFixed(2);
    }
  </script>
</head>
<body>
<div class="container">
	<h1>Editar Ventas</h1>
	<form method="post" class="col-xl-8 offset-2">
  <input type="hidden" name="id" value="<?= $data["Detalle"][0]["ve_id"] ?>">
  <input type="hidden" name="id" value="<?= $DetalleVentas["Detalle"][0]["dv_id"] ?>">  
    <a>Numero de ventas</a>
    <input type="text" name="dv_numero" placeholder="numero de venta" class="form-control" value="<?= $DetalleVentas["Detalle"][0]["dv_numero"] ?>"><br />
    <a>Orden de ventas</a>
    <input type="text" name="dv_ordenVenta" placeholder="orden de venta" value="<?= $DetalleVentas["Detalle"][0]["dv_ordenVenta"] ?>" class="form-control"><br />
    <a>Cliente</a>
		<select name="cl_id" id="<?=$data["Detalle"]["0"]['cl_id']?>">
			<?php foreach($cliente["Detalle"] as $tipo):?>	
			<option type="text" id="<?=$tipo["cl_id"]?>" value="<?=$tipo["cl_id"]?>"><?= $tipo["cl_nombre"];?> <?= $tipo["cl_apellido"];?></option>
			<?php endforeach?>
		</select><br /> <br />
    <a>Empresa</a>
		<input type="text" name="empresa" value="<?= $DetalleVentas["Detalle"][0]["empresa"] ?>" class="form-control"><br />
    <a>Fecha de la venta</a>
    <input type="date" name="ve_fecha" placeholder="Fecha de venta" value="<?= $data["Detalle"][0]["ve_fecha"] ?>" class="form-control" ><br />
     <!-- <a>ID de ventas</a>-->
    <input type="hidden" name="ve_id" placeholder="ID de venta" value="<?= $data["Detalle"][0]["ve_id"] ?>" class="form-control"><br />
    <a>Tipo venta</a>
		<select name="tv_id"  id="<?=$data["Detalle"]["0"]['tv_id']?>">
			<?php foreach($tipoventa["Detalle"] as $tv):?>	
			<option type="text" id="<?=$tv["tv_id"]?>" value="<?=$tv["tv_id"]?>"><?= $tv["tv_nombre"];?></option>
			<?php endforeach?>
		</select><br /> <br />
    <a>Producto</a>    
    <select name="pro_id"  id="<?=$DetalleVentas["Detalle"]["0"]['pro_id']?>">
			<?php foreach($producto["Detalle"] as $pro):?>	
			<option type="text" id="<?=$pro["pro_id"]?>" value="<?=$pro["pro_id"]?>"><?= $pro["pro_nombre"];?> S/.<?=$pro["pro_PrecioUnitario"]?></option>
			<?php endforeach?>
		</select><br /> <br />
    <a>Tipo pago</a>
    <select name="tp_id"  id="<?=$DetalleVentas["Detalle"]["0"]['tp_id']?>">
			<?php foreach($tipopago["Detalle"] as $tp):?>	
			<option type="text" id="<?=$tp["tp_id"]?>" value="<?=$tp["tp_id"]?>"><?= $tp["tp_nombre"];?></option>
			<?php endforeach?>
		</select><br /> <br />
    <a>Cantidad</a>
    <input type="number" name="dv_cantidad" id="cantidad" placeholder="Cantidad" onchange="calcularTotal()" value="<?= $DetalleVentas["Detalle"][0]["dv_cantidad"] ?>" class="form-control"><br />
    <a>Subtotal</a>
    <input type="text" name="dv_subtotal" id="subtotal" placeholder="Subtotal" onchange="calcularTotal()" step="0.01" value="<?= $DetalleVentas["Detalle"][0]["dv_subtotal"] ?>" class="form-control"><br />
    <a>Total de la venta</a>
		<input type="text" name="ve_total" id="total" placeholder="Venta total" readonly value="<?= $data["Detalle"][0]["ve_total"] ?>" class="form-control"><br />
		<button type="submit" class="btn btn-success">Guardar</button>
		<a href="Ventas.php?usuid=<?= $_GET['usuid']?>&emp=<?= $_GET['emp']?>&sucu=<?=$_GET['sucu']?>" class="btn btn-danger">Cancelar</a>
	</form>
	
</div>
</body>
</html>