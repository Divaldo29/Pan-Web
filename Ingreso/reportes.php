<?php

$curl = curl_init(); //primero

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://panaderia.informaticapp.com/pagos',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VDcTB2bjhxeXY2VW1QN05ZRmU5UkJLbnRTS1NkbUxlOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlZFpnRTVucjZzYVVsLnM0SkwvcTFXZmkzRkpvRS95aQ=='
    ),
));

$response = curl_exec($curl);

curl_close($curl);
$pagos = json_decode($response, true);



$curl = curl_init(); //segundo

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://panaderia.informaticapp.com/DetalleVentas',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VDcTB2bjhxeXY2VW1QN05ZRmU5UkJLbnRTS1NkbUxlOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlZFpnRTVucjZzYVVsLnM0SkwvcTFXZmkzRkpvRS95aQ=='
    ),
));

$response = curl_exec($curl);

curl_close($curl);
$ventas = json_decode($response, true);







$curl2 = curl_init(); //tercero

curl_setopt_array($curl2, array(
    CURLOPT_URL => 'https://panaderia.informaticapp.com/PedidosVentas',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VDcTB2bjhxeXY2VW1QN05ZRmU5UkJLbnRTS1NkbUxlOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlZFpnRTVucjZzYVVsLnM0SkwvcTFXZmkzRkpvRS95aQ=='
    ),
));

$response = curl_exec($curl2);

curl_close($curl2);
$PedidosVentas = json_decode($response, true);
//var_dump($PedidosVentas, true); die;



?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tables - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
<?php include('barra.php'); ?>
    <?php include('Seguridad.php')?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Reportes</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Reportes</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            Este es el modulo reportes, destinado a compras, ventas y pedidos
                            
                        </div>
                    </div>

                  
                    <div class="text-right mb-2">
                        <a href="fpdf/Reportespdf.php" target="_blank" class="btn btn-secondary"><i class="fas fa-file-pdf"></i> Imprimir Compras</a>
                    </div>


































                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i> Compras
                        </div>
                        <div class="card-body">
                            <main>

                                <div class="container col-xl-12">
                                    <h1>Compras de productos</h1>
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Producto</th>
                                                <th scope="col">Proveedor</th>
                                                <th scope="col">Fecha Compra</th>
                                                <th scope="col">Cantidad Adquirida</th>
                                                <th scope="col">Cantidad Disponible</th>
                                                <th scope="col">Cantidad Precio Compra</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($pagos["Detalle"] as $pag) : ?>
                                                <tr>
                                                    <td><?= $pag["pro_nombre"] ?></td>
                                                    <td><?= $pag["pv_RazonSocial"] ?></td>
                                                    <td><?= $pag["pag_FechaCompra"] ?></td>
                                                    <td><?= $pag["st_CantidadAdquirida"] ?></td>
                                                    <td><?= $pag["st_CantidadDisponible"] ?></td>
                                                    <td><?= $pag["pag_PrecioCompra"] ?></td>


                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>

                    <div class="text-right mb-2">
                        <a href="fpdf/ReportesVentaspdf.php" target="_blank" class="btn btn-secondary"><i class="fas fa-file-pdf"></i> Imprimir Ventas</a>
                    </div>


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i> Ventas
                        </div>
                        <div class="card-body">
                            <main>
                                <div class="container col-xl-12">
                                    <h1>Ventas Semanales</h1>
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Producto</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Cliente</th>
                                                <th scope="col">Numero de Venta</th>
                                                <th scope="col">Orden de Ventas</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($ventas["Detalle"] as $vede) : ?>
                                                <tr>
                                                    <td><?= $vede["pro_nombre"] ?></td>
                                                    <td><?= $vede["dv_cantidad"] ?></td>
                                                    <td><?= $vede["cl_dni"] ?></td>
                                                    <td><?= $vede["dv_numero"] ?></td>
                                                    <td><?= $vede["dv_ordenVenta"] ?></td>
                                                    <td><?= $vede["ve_total"] ?></td>

                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>

                            </main>


                        </div>
                    </div>


                    <div class="text-right mb-2">
                        <a href="fpdf/ReportesPedidpdf.php" target="_blank" class="btn btn-secondary"><i class="fas fa-file-pdf"></i> Imprimir Pedidos</a>
                    </div>


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i> Pedidos
                        </div>
                        <div class="card-body">
                            <main>
                                <div class="container col-xl-12">

                                    <h1>Pedidos Semanales</h1>
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Descripcion</th>
                                                <th scope="col">Orden de pedido</th>
                                                <th scope="col">Precio Unitario</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Fecha de entrega</th>
                                                <th scope="col">Tipo de pago</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($PedidosVentas['Detalle'] as $peve) : ?>
                                                <tr>
                                                    <td><?= $peve["pe_descripcion"] ?></td>
                                                    <td><?= $peve["pe_ordenPedido"] ?></td>
                                                    <td><?= $peve["pev_precioUnitario"] ?></td>
                                                    <td><?= $peve["ve_total"] ?></td>
                                                    <td><?= $peve["ve_fecha"] ?></td>
                                                    <td><?= $peve["pe_fechaEntrega"] ?></td>
                                                    <td><?= $peve["tp_nombre"] ?></td>


                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>

                            </main>


                        </div>
                    </div>



















            </main>

            <footer class="py-4 bg-light mt-auto">

        </div>
        </footer>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>


</html>