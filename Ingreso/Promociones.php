<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'panaderia.informaticapp.com/Promociones',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VBeWsuUEJrZXZJTG1VSHJvMGFhWFMxeHViLjRsZmQuOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlRlBxek1RT093UVRHdEVObVpzdndkRnRXYTI2TjlnMg=='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$data= json_decode($response, true);
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
                        <h1>Lista de Promociones</h1>
                            <a href="PromocionesRegistrar.php?usuid=<?=$_GET['usuid']?>&emp=<?=$_GET['emp']?>&sucu=<?=$_GET['sucu']?>" class="btn btn-primary">Registrar Promo</a>
                            <a href="TipoPromocion.php?usuid=<?=$_GET['usuid']?>&emp=<?=$_GET['emp']?>&sucu=<?=$_GET['sucu']?>" class="btn btn-primary right-align">Agregar Tipo Promocion</a>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Tipo Promo </th>
                                    <th scope="col">Promo </th>
                                    <th scope="col">Promo descuento</th>
                                    <th scope="col">Pafecha inicio</th>
                                    <th scope="col">Pafecha fin</th>
                                    <th scope="col" colspan="2">Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data["Detalle"] as $promociones): ?>
                                <tr>
                                    <td><?= $promociones["tpromo_nombre"] ?></td> 
                                    <td><?= $promociones["pro_nombre"] ?></td>
                                    <td><?= $promociones["promo_descuento"] ?></td>
                                    <td><?= $promociones["promo_fechaini"] ?></td>
                                    <td><?= $promociones["promo_fechafin"] ?></td>
                                    <td><a href="PromocionesEditar.php?id=<?= $promociones['promo_id'] ?>&usuid=<?=$_GET['usuid']?>&emp=<?=$_GET['emp']?>&sucu=<?=$_GET['sucu']?>" class="btn btn-warning">Editar</a></td>
                                    <td><a href="PromocionesEliminar.php?id=<?= $promociones['promo_id'] ?>&usuid=<?=$_GET['usuid']?>&emp=<?=$_GET['emp']?>&sucu=<?=$_GET['sucu']?>" class="btn btn-danger">Eliminar</a></td>
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
