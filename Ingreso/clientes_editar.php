<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://panaderia.informaticapp.com/clientes/'.$_POST['id'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS => 
  'cl_nombre='.$_POST["cl_nombre"].
  '&cl_apellido='.$_POST["cl_apellido"].
  '&cl_dni='.$_POST["cl_dni"].
  '&cli_numero='.$_POST["cli_numero"].
  '&cli_email='.$_POST["cli_email"],
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VJMzNOeC5PUUxobnU5eVBnbEJjQVJDMFgydnU5RUtxOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdleUY1TXJBdUh4eDZKYjdZR0VPMWE4UjFWYlFad2VnVw=='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$data = json_decode($response, true);
header("Location: Clientes.php?usuid=".$_GET['usuid']."&emp=".$_GET['emp']."&sucu=".$_GET['sucu']);
}
else{
  $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://panaderia.informaticapp.com/clientes/'.$_GET['id'],
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
$data = json_decode($response, true);
//var_dump($data, true); die;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Editar Cliente</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<!-- JS, Popper.js, and jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
	<h1>Editar Clientes</h1>
	<form method="post" class="col-xl-8 offset-2">
    <input type="hidden" name="id" value="<?= $data["Detalle"]["cl_id"] ?>">
    <a>Nombre Completo</a>
		<input type="text" name="cl_nombre" placeholder="Nombre Completo" class="form-control" value="<?= $data["Detalle"]["cl_nombre"] ?>"><br />
    <a>Apellido Completo</a>
    <input type="text" name="cl_apellido" placeholder="Apellido Completo" class="form-control" value="<?= $data["Detalle"]["cl_apellido"] ?>"><br />
		<a>DNI</a>
    <input type="text" name="cl_dni" placeholder="Documento nacional" class="form-control" value="<?= $data["Detalle"]["cl_dni"] ?>"><br />
		<a>Celular</a>
    <input type="text" name="cli_numero" placeholder="Teléfono" class="form-control" value="<?= $data["Detalle"]["cli_numero"] ?>"><br />
    <a>Correo electronico</a>
    <input type="email" name="cli_email" placeholder="Email" class="form-control" value="<?= $data["Detalle"]["cli_email"] ?>"><br />
		<button type="submit" class="btn btn-success">Guardar</button>
		<a href="Clientes.php?usuid=<?=$_GET['usuid']?>&emp=<?=$_GET['emp']?>&sucu=<?=$_GET['sucu']?>" class="btn btn-danger">Cancelar</a>
	</form>
	
</div>
</body>
</html>