<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://panaderia.informaticapp.com/pedidos',
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

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        
    <?php include('barra.php'); ?>
    <?php include('Seguridad.php')?>
            <div id="layoutSidenav_content">
                <main>
                        <div class="container col-xl-12">
                        <h1>Lista de Pedidos</h1>
                            <a href="PeRegistrar.php?usuid=<?= $_GET['usuid']?>&emp=<?= $_GET['emp']?>&sucu=<?=$_GET['sucu']?>" class="btn btn-primary">Registrar</a>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style="text-align: center">#</th>
                                    <th scope="col" style="text-align: center">Número de pedido</th>
                                    <th scope="col" style="text-align: center">Orden de pedido</th>
                                    <th scope="col" style="text-align: center">Cliente</th>
                                    <th scope="col" style="text-align: center">Producto</th>
                                    <th scope="col" style="text-align: center">Descripción</th>
                                    <th scope="col" style="text-align: center">Cantidad</th>
                                    <th scope="col" style="text-align: center">Fecha de entrega</th>
                                    <th scope="col" style="text-align: center" colspan="2">Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data["Detalle"] as $cliente): ?>
                                <tr>
                                    <td style="text-align: center"><?= $cliente["pe_id"] ?></td>
                                    <td style="text-align: center"><?= $cliente["pe_numero"] ?></td>
                                    <td style="text-align: center"><?= $cliente["pe_ordenPedido"] ?></td>
                                    <td><?= $cliente["cl_nombre"] ?> <?= $cliente["cl_apellido"] ?></td>
                                    <td><?= $cliente["pro_nombre"] ?></td>
                                    <td><?= $cliente["pe_descripcion"] ?></td>
                                    <td style="text-align: center"><?= $cliente["pe_cantidad"] ?></td>
                                    <td style="text-align: center"><?= $cliente["pe_fechaEntrega"] ?></td>
                                    <td><a href="PeEditar.php?id=<?= $cliente['pe_id'] ?>&usuid=<?= $_GET['usuid']?>&emp=<?= $_GET['emp']?>&sucu=<?=$_GET['sucu']?>" class="btn btn-warning">Editar</a></td>
                                    <td><a href="PeEliminar.php?id=<?= $cliente['pe_id'] ?>&usuid=<?= $_GET['usuid']?>&emp=<?= $_GET['emp']?>&sucu=<?=$_GET['sucu']?>" class="btn btn-danger">Eliminar</a></td>
                                </tr>
                                <?php endforeach?>
                            </tbody>
                        </table>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
