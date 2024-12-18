<?php

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://panaderia.informaticapp.com/PedidosVentas',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>  
                        've_id='.$_POST["ve_id"]. 
                        '&pe_id='.$_POST["pe_id"].
                        '&tp_id='.$_POST["tp_id"].
                        '&pev_precioUnitario='.$_POST["pev_precioUnitario"].
                        '&pev_subtotal='.$_POST["pev_subtotal"].
                        '&pev_totalDeuda='.$_POST["pev_totalDeuda"],  
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2Vrb0h1bE9WbFpwbk5TWnpDMkd6dndQaHVKQ0Y3NWltOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlQmt5eUlmWGJWS1FFZmJ1NTJ4NUZsTWFpTGt1TDUwNg=='
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response, true);
        //var_dump($data, true); die;
        header("Location: PedVen.php?usuid=".$_GET['usuid']."&emp=".$_GET['emp']."&sucu=".$_GET['sucu']);
}
else{

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
    CURLOPT_POSTFIELDS => 'pe_numero=1006&pe_ordenPedido=1239&cl_id=2&pro_id=2&pe_descripcion=Pedido%20de%20prueba%206&pe_cantidad=4&pe_fechaEntrega=2023-11-15',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/x-www-form-urlencoded',
        'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2Vrb0h1bE9WbFpwbk5TWnpDMkd6dndQaHVKQ0Y3NWltOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlQmt5eUlmWGJWS1FFZmJ1NTJ4NUZsTWFpTGt1TDUwNg=='
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $tpagos = json_decode($response, true);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registrar Pedido Venta</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<!-- JS, Popper.js, and jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
	<h1>Registrar Pedidos Ventas</h1>
	<form method="post" class="col-xl-8 offset-2">
        <a>Id venta</a>
		<input type="phone" name="ve_id" placeholder="Id venta" class="form-control"><br>
        <a>Id pedido</a>
		<input type="phone" name="pe_id" placeholder="Id pedido" class="form-control"><br>
        <a>Id tipo de pago</a>
		<select name="tp_id" id="<?=$data["Detalle"]["0"]['tp_id']?>">
			<?php foreach($tpagos["Detalle"] as $tp):?>	
			<option type="text" id="<?=$tp["tp_id"]?>" value="<?=$tp["tp_id"]?>"><?= $tp["tp_nombre"];?></option>
			<?php endforeach?>
		</select><br /> <br />
        <a>Precio unitario</a>
		<input type="text" name="pev_precioUnitario" placeholder="Precio unitario" class="form-control"><br>
        <a>Sub total</a>
		<input type="text" name="pev_subtotal" placeholder="Sub total" class="form-control"><br>
        <a>Deuda total</a>
		<input type="text" name="pev_totalDeuda" placeholder="Deuda total" class="form-control"><br>
        <a>Orden de pedido</a>
        <input type="number" name="pe_ordenPedido" placeholder="Orden de pedido" class="form-control"><br>
		<button type="submit" class="btn btn-success">Guardar</button>
		<a href="PedVen.php?usuid=<?= $_GET['usuid']?>&emp=<?= $_GET['emp']?>&sucu=<?=$_GET['sucu']?>" class="btn btn-danger">Cancelar</a>
	</form>
	
</div>
</body>
</html>