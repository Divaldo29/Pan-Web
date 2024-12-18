
<?php


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://panaderia.informaticapp.com/establecimiento',
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
$sucursal = json_decode($response, true);
foreach ($sucursal['Detalle'] as $item) {
    if ($item['em_id'] == $_GET['emp']) {
        $data[] = $item;
    }
}
//var_dump($data);die;

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sucursal</title>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    </head>x    
    <body class="sb-nav-fixed">
    <?php include('barra.php'); ?>
    <?php include('Seguridad.php')?>
            <div id="layoutSidenav_content">
                <main>
                        <div class="container col-xl-12">
                        <h1>Lista de Sucursales</h1>
                            <a href="RegistrarSucursal.php?usuid=<?= $_GET['usuid']?>&emp=<?= $_GET['emp']?>&sucu=<?=$_GET['sucu']?>" class="btn btn-primary">Registrar</a>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Distrito</th>
                                    <th scope="col">Departamento</th>
                                    <th scope="col">Encargado Nombres</th>
                                    <th scope="col">Encargado Apellidos</th>
                                    <th scope="col">Guia</th>
                                    <th scope="col" colspan="2">Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data as $Sucursal): ?>
                                <tr>
                                    <td><?= $Sucursal["su_direccion"]?></td>
                                    <td><?= $Sucursal["su_distrito"]?></td>
                                    <td><?= $Sucursal["su_departamento"] ?></td>
                                    <td><?= $Sucursal["es_nombencargado"] ?></td>
                                    <td><?= $Sucursal["es_apencargado"] ?></td>
                                    <td><?= $Sucursal["su_distrito"] ?></td>
                                    <td><a href='EditarSucursal.php?id=<?=$Sucursal['es_id']?>&usuid=<?= $_GET['usuid']?>&emp=<?= $_GET['emp']?>&sucu=<?=$_GET['sucu']?>' class="btn btn-warning">Editar</a></td>
                                    <td><a href='EliminarSucursal.php?id2=<?=$Sucursal['su_id']?>&id1=<?=$Sucursal['es_id']?>&usuid=<?= $_GET['usuid']?>&emp=<?= $_GET['emp']?>&sucu=<?=$_GET['sucu']?>' class="btn btn-danger">Eliminar</a></td>
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
