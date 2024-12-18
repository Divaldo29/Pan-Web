<?php

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://panaderia.informaticapp.com/pedidos/'.$_GET['id'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 
                        'pe_numero='.$_POST["pe_numero"].
                        '&pe_ordenPedido='.$_POST["pe_ordenPedido"].
                        '&cl_id='.$_POST["cl_id"].
                        '&pro_id='.$_POST["pro_id"].
                        '&pe_descripcion='.$_POST["pe_descripcion"].
                        '&pe_cantidad='.$_POST["pe_cantidad"].
                        '&pe_fechaEntrega='.$_POST["pe_fechaEntrega"].
                        '&empresa='.$_GET["emp"],
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2Vrb0h1bE9WbFpwbk5TWnpDMkd6dndQaHVKQ0Y3NWltOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlQmt5eUlmWGJWS1FFZmJ1NTJ4NUZsTWFpTGt1TDUwNg=='
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response, true);
        header("Location: Pedidos.php?usuid=".$_GET['usuid']."&emp=".$_GET['emp']."&sucu=".$_GET['sucu']);
    
    }else{

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://panaderia.informaticapp.com/pedidos/'.$_GET['id'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2Vrb0h1bE9WbFpwbk5TWnpDMkd6dndQaHVKQ0Y3NWltOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlQmt5eUlmWGJWS1FFZmJ1NTJ4NUZsTWFpTGt1TDUwNg=='
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response, true);

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
            'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2Vrb0h1bE9WbFpwbk5TWnpDMkd6dndQaHVKQ0Y3NWltOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlQmt5eUlmWGJWS1FFZmJ1NTJ4NUZsTWFpTGt1TDUwNg=='
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $clientes = json_decode($response, true);

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
            'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2Vrb0h1bE9WbFpwbk5TWnpDMkd6dndQaHVKQ0Y3NWltOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlQmt5eUlmWGJWS1FFZmJ1NTJ4NUZsTWFpTGt1TDUwNg=='
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $productos = json_decode($response, true);

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
            'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2Vrb0h1bE9WbFpwbk5TWnpDMkd6dndQaHVKQ0Y3NWltOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlQmt5eUlmWGJWS1FFZmJ1NTJ4NUZsTWFpTGt1TDUwNg=='
        ),
        ));
    
        $response = curl_exec($curl);
        curl_close($curl);
        $empresa = json_decode($response, true);

    }
?>

    <!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Registrar Pedido</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	
		<!-- JS, Popper.js, and jQuery -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	</head>
	<body>
	<div class="container">
		<h1>Editar Pedido</h1>
		<form method="post" class="col-xl-8 offset-2">
			<input type="hidden" name="pe_id" value="<?=$data["Detalle"][0]['pe_id']?>">
            
            <a>Numero de pedido</a>
			<input type="number" name="pe_numero" class="form-control" value="<?=$data["Detalle"][0]['pe_numero']?>"><br>
            
            <a>Orden pedido</a>
			<input type="number" name="pe_ordenPedido" class="form-control" value="<?=$data["Detalle"][0]['pe_ordenPedido']?>"><br>
            
            <a>Id cliente</a>
			<select name="cl_id" id="<?=$data["Detalle"]["0"]['cl_id']?>">
                <?php foreach($clientes["Detalle"] as $cli):?>	
                <option type="text" id="<?=$cli["cl_id"]?>" value="<?=$cli["cl_id"]?>"><?= $cli["cl_nombre"];?></option>
                <?php endforeach?>
		    </select><br /> <br />

            <a>Id producto</a>
			<select name="pro_id"  id="<?=$data["Detalle"]["0"]['pro_id']?>">
                <?php foreach($productos["Detalle"] as $pro):?>	
                <option type="text" id="<?=$pro["pro_id"]?>" value="<?=$pro["pro_id"]?>"><?= $pro["pro_nombre"];?> S/.<?=$pro["pro_PrecioUnitario"]?></option>
                <?php endforeach?>
		    </select><br /> <br />
                
            <a>Descripcion de pedido</a>
			<input type="text" name="pe_descripcion" class="form-control" value="<?=$data["Detalle"][0]['pe_descripcion']?>">

            <a>Cantidad</a>
			<input type="number" name="pe_cantidad" class="form-control" value="<?=$data["Detalle"][0]['pe_cantidad']?>">

            <a>Fecha de entrega</a>
            <input type="date" name="pe_fechaEntrega" class="form-control" value="<?=$data["Detalle"][0]['pe_fechaEntrega']?>"><br>


            <button type="submit" class="btn btn-success">Guardar</button>
			<a href="Pedidos.php?usuid=<?= $_GET['usuid']?>&emp=<?= $_GET['emp']?>&sucu=<?=$_GET['sucu']?>" class="btn btn-danger">Cancelar</a>
		</form>
	</div>
	</body>
	</html>