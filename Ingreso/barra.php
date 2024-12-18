<?php include('Seguridad.php'); 


$curl5 = curl_init();

curl_setopt_array($curl5, array(
  CURLOPT_URL => 'https://panaderia.informaticapp.com/empresa/'.$_GET['emp'],
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

$response = curl_exec($curl5);

curl_close($curl5);
$ven = json_decode($response, true);





?>

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <div>
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 " style="max-height: 10px;" href="../index.php"><img class="img-fluid" style="max-height: 40px;" src="https://panaderia.informaticapp.com/public/<?php echo $ven['Detalle']['em_razonsocial'];?>/Logo/<?php echo $ven['Detalle']['em_logo'] ;?>"> MANA</a>
            
    </div>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                        <div class="sb-sidenav-menu-heading">Servicios</div>
                            <a 
                            <?php foreach($Modulos['Detalle'] as $modu){
                                if($modu['mo_nombre'] == 'Seguridad'){ 
                                    $bolean = true; 
                                    break; 
                                    }
                                    else{ 
                                        $bolean = false;
                                        }
                                } 
                                if($bolean==false){
                                    echo 'hidden';
                                    }?> 
                                    class="nav-link" href="Usuarios.php?usuid=<?=$_GET['usuid']?>&emp=<?=$_GET['emp']?>&sucu=<?=$_GET['sucu']?>">
                                <div  class="sb-nav-link-icon" ><i class="fas fa-tachometer-alt"></i></div>
                                Usuarios
                            </a>
                            <a 
                            <?php foreach($Modulos['Detalle'] as $modu){
                                if($modu['mo_nombre'] == 'Seguridad'){ 
                                    $bolean = true; 
                                    break; 
                                    }
                                    else{ 
                                        $bolean = false;
                                        }
                                } 
                                if($bolean==false){
                                    echo 'hidden';
                                    }?>  class="nav-link" href="Sucursal.php?usuid=<?=$_GET['usuid']?>&emp=<?=$_GET['emp']?>&sucu=<?=$_GET['sucu']?>">
                                <div class="sb-nav-link-icon" ><i class="fas fa-tachometer-alt"></i></div>
                                Sucursal
                            </a>
                            <a 
                            <?php foreach($Modulos['Detalle'] as $modu){
                                if($modu['mo_nombre'] == 'Compras'){ 
                                    $bolean = true; 
                                    break; 
                                    }
                                    else{ 
                                        $bolean = false;
                                        }
                                } 
                                if($bolean==false){
                                    echo 'hidden';
                                    }?>  class="nav-link" href="Pagos.php?usuid=<?=$_GET['usuid']?>&emp=<?=$_GET['emp']?>&sucu=<?=$_GET['sucu']?>">
                                <div class="sb-nav-link-icon" ><i class="fas fa-tachometer-alt"></i></div>
                                Pagos
                            </a>
                            <a 
                            <?php foreach($Modulos['Detalle'] as $modu){
                                if($modu['mo_nombre'] == 'Ventas'){ 
                                    $bolean = true; 
                                    break; 
                                    }
                                    else{ 
                                        $bolean = false;
                                        }
                                } 
                                if($bolean==false){
                                    echo 'hidden';
                                    }?>  class="nav-link" href="Ventas.php?usuid=<?=$_GET['usuid']?>&emp=<?=$_GET['emp']?>&sucu=<?=$_GET['sucu']?>">
                                <div class="sb-nav-link-icon" ><i class="fas fa-tachometer-alt"></i></div>
                                Ventas
                            </a>
                            <a 
                            <?php foreach($Modulos['Detalle'] as $modu){
                                if($modu['mo_nombre'] == 'Promociones'){ 
                                    $bolean = true; 
                                    break; 
                                    }
                                    else{ 
                                        $bolean = false;
                                        }
                                } 
                                if($bolean==false){
                                    echo 'hidden';
                                    }?> class="nav-link" href="Promociones.php?usuid=<?=$_GET['usuid']?>&emp=<?=$_GET['emp']?>&sucu=<?=$_GET['sucu']?>">
                                <div class="sb-nav-link-icon" ><i class="fas fa-tachometer-alt"></i></div>
                                Promociones
                            </a>
                            <a 
                            <?php foreach($Modulos['Detalle'] as $modu){
                                if($modu['mo_nombre'] == 'Reportes'){ 
                                    $bolean = true; 
                                    break; 
                                    }
                                    else{ 
                                        $bolean = false;
                                        }
                                } 
                                if($bolean==false){
                                    echo 'hidden';
                                    }?>  class="nav-link" href="reportes.php?usuid=<?=$_GET['usuid']?>&emp=<?=$_GET['emp']?>&sucu=<?=$_GET['sucu']?>">
                                <div class="sb-nav-link-icon" ><i class="fas fa-tachometer-alt"></i></div>
                                Reportes
                            </a>
                            <a 
                            <?php foreach($Modulos['Detalle'] as $modu){
                                if($modu['mo_nombre'] == 'Compras'){ 
                                    $bolean = true; 
                                    break; 
                                    }
                                    else{ 
                                        $bolean = false;
                                        }
                                } 
                                if($bolean==false){
                                    echo 'hidden';
                                    }?>  class="nav-link" href="Producto.php?usuid=<?=$_GET['usuid']?>&emp=<?=$_GET['emp']?>&sucu=<?=$_GET['sucu']?>">
                                <div class="sb-nav-link-icon" ><i class="fas fa-tachometer-alt"></i></div>
                                Productos
                            </a>
                            <a 
                            <?php foreach($Modulos['Detalle'] as $modu){
                                if($modu['mo_nombre'] == 'Ventas'){ 
                                    $bolean = true; 
                                    break; 
                                    }
                                    else{ 
                                        $bolean = false;
                                        }
                                } 
                                if($bolean==false){
                                    echo 'hidden';
                                    }?>  class="nav-link" href="Clientes.php?usuid=<?=$_GET['usuid']?>&emp=<?=$_GET['emp']?>&sucu=<?=$_GET['sucu']?>">
                                <div class="sb-nav-link-icon" ><i class="fas fa-tachometer-alt"></i></div>
                                Clientes
                            </a>
                            <a 
                            <?php foreach($Modulos['Detalle'] as $modu){
                                if($modu['mo_nombre'] == 'Compras'){ 
                                    $bolean = true; 
                                    break; 
                                    }
                                    else{ 
                                        $bolean = false;
                                        }
                                } 
                                if($bolean==false){
                                    echo 'hidden';
                                    }?>  class="nav-link" href="Stock.php?usuid=<?=$_GET['usuid']?>&emp=<?=$_GET['emp']?>&sucu=<?=$_GET['sucu']?>">
                                <div class="sb-nav-link-icon" ><i class="fas fa-tachometer-alt"></i></div>
                                Stock
                            </a>
                            <a 
                            <?php foreach($Modulos['Detalle'] as $modu){
                                if($modu['mo_nombre'] == 'Ventas'){ 
                                    $bolean = true; 
                                    break; 
                                    }
                                    else{ 
                                        $bolean = false;
                                        }
                                } 
                                if($bolean==false){
                                    echo 'hidden';
                                    }?>  class="nav-link" href="Pedidos.php?usuid=<?=$_GET['usuid']?>&emp=<?=$_GET['emp']?>&sucu=<?=$_GET['sucu']?>">
                                <div class="sb-nav-link-icon" ><i class="fas fa-tachometer-alt"></i></div>
                                Pedidos
                            </a>
                            <a 
                            <?php foreach($Modulos['Detalle'] as $modu){
                                if($modu['mo_nombre'] == 'Ventas'){ 
                                    $bolean = true; 
                                    break; 
                                    }
                                    else{ 
                                        $bolean = false;
                                        }
                                } 
                                if($bolean==false){
                                    echo 'hidden';
                                    }?>  class="nav-link" href="PedVen.php?usuid=<?=$_GET['usuid']?>&emp=<?=$_GET['emp']?>&sucu=<?=$_GET['sucu']?>">
                                <div class="sb-nav-link-icon" ><i class="fas fa-tachometer-alt"></i></div>
                                Ventas de Pedidos
                            </a>
                            <a 
                            <?php foreach($Modulos['Detalle'] as $modu){
                                if($modu['mo_nombre'] == 'Compras'){ 
                                    $bolean = true; 
                                    break; 
                                    }
                                    else{ 
                                        $bolean = false;
                                        }
                                } 
                                if($bolean==false){
                                    echo 'hidden';
                                    }?>  class="nav-link" href="Proveedores.php?usuid=<?=$_GET['usuid']?>&emp=<?=$_GET['emp']?>&sucu=<?=$_GET['sucu']?>">
                                <div class="sb-nav-link-icon" ><i class="fas fa-tachometer-alt"></i></div>
                                    Proveedores
                            </a>
                        </nav>
            </div>