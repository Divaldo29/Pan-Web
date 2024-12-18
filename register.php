<?php 
$Bol = 'false';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
             $curl1 = curl_init();

            curl_setopt_array($curl1, array(
                CURLOPT_URL => 'https://panaderia.informaticapp.com/empresa',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => 
                array('em_direccion' => $_POST['em_direccion'],
                'em_razonsocial' => $_POST['em_razonsocial'],
                'em_ruc' => $_POST['em_ruc'],
                'em_dueñonombre' => $_POST['em_dueñonombre'],
                'em_dueñoapellido' => $_POST['em_dueñoapellido'],
                'em_telefono' => $_POST['em_telefono'],
                'em_logo'=> new CURLFILE($_FILES['em_logo']['tmp_name'])),
                CURLOPT_HTTPHEADER => array(
                  'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VnQk52YmVqbFhDdjJ5Nkx1MUlCRC5YU3VTQmFSSjVLOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlUzU0Lmh3RXlQL2V1OGFVeEp5dEVtSHdLdlBCeUowSw=='
                ),
              ));

            $response = curl_exec($curl1);

            curl_close($curl1);
            $empresa = json_decode($response, true); 
              ////var_dump($empresa);
            $curlz = curl_init();

            curl_setopt_array($curlz, array(
                CURLOPT_URL => 'https://panaderia.informaticapp.com/empresa',
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

            $response = curl_exec($curlz);

            curl_close($curlz);
            $empresa = json_decode($response, true); 
            $emid = end($empresa['Detalle']);
//            var_dump($empresa); die;



              
            $curl2 = curl_init();

                curl_setopt_array($curl2, array(
                CURLOPT_URL => 'https://panaderia.informaticapp.com/sucursal',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => 
                "su_direccion=".$_POST['su_direccion'].
                "&su_distrito=".$_POST['su_distrito'].
                "&su_departamento=".$_POST['su_departamento'].
                "&em_id=".$emid['em_id'],
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/x-www-form-urlencoded',
                    'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VnQk52YmVqbFhDdjJ5Nkx1MUlCRC5YU3VTQmFSSjVLOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlUzU0Lmh3RXlQL2V1OGFVeEp5dEVtSHdLdlBCeUowSw=='
                ),
                ));

                $response = curl_exec($curl2);

                curl_close($curl2);
                $sucu = json_decode($response, true);
                //var_dump($sucu);



                $curl3 = curl_init();


                curl_setopt_array($curl3, array(
                    CURLOPT_URL => 'https://panaderia.informaticapp.com/sucursal',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/x-www-form-urlencoded',
                    'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VnQk52YmVqbFhDdjJ5Nkx1MUlCRC5YU3VTQmFSSjVLOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlUzU0Lmh3RXlQL2V1OGFVeEp5dEVtSHdLdlBCeUowSw=='
                    ),
                    ));
    
                    $response = curl_exec($curl3);
    
                    curl_close($curl3);
                    $sucursal = json_decode($response, true);
                    $suid = end($sucursal['Detalle']);
                    //var_dump($suid); die;

                $curl4 = curl_init();

                curl_setopt_array($curl4, array(
                CURLOPT_URL => 'https://panaderia.informaticapp.com/establecimiento',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => 
                "su_id=".$suid['su_id']. 
                "&es_nombre=".$_POST['es_nombre'].
                "&es_nombencargado=".$_POST['es_nombencargado'].
                "&es_apencargado=".$_POST['es_apencargado'],
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/x-www-form-urlencoded',
                    'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VnQk52YmVqbFhDdjJ5Nkx1MUlCRC5YU3VTQmFSSjVLOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlUzU0Lmh3RXlQL2V1OGFVeEp5dEVtSHdLdlBCeUowSw=='
                ),
                ));

                $response = curl_exec($curl4);

                curl_close($curl4);
                $establecimiento = json_decode($response, true); 
                //var_dump($establecimiento);



                $curl5 = curl_init();

                curl_setopt_array($curl5, array(
                CURLOPT_URL => 'https://panaderia.informaticapp.com/establecimiento',
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

                $response2 = curl_exec($curl5);

                curl_close($curl5);
                $establecimiento2 = json_decode($response2, true); 
                $esid = end($establecimiento2['Detalle']);
               //
                //var_dump($esid); die;


                $curl6 = curl_init();
                curl_setopt_array($curl6, array(
                    CURLOPT_URL => 'https://panaderia.informaticapp.com/usuarios',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => 
                    "es_id=".$esid['es_id'].
                    "&us_nombre=".$_POST['em_dueñonombre'].
                    "&us_apellido=".$_POST['em_dueñoapellido'].
                    "&us_correo=".$_POST['us_correo'].
                    "&us_usuario=".$_POST['us_usuario'].
                    "&us_password=".$_POST['us_password'].
                    "&ro_id=4",
                    CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/x-www-form-urlencoded',
                        'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VnQk52YmVqbFhDdjJ5Nkx1MUlCRC5YU3VTQmFSSjVLOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlUzU0Lmh3RXlQL2V1OGFVeEp5dEVtSHdLdlBCeUowSw=='
                    ),
                    ));
    
                    $response = curl_exec($curl6);
    
                    curl_close($curl6);
                    $usuarios = json_decode($response, true); 
                    //var_dump($usuarios);
                    header("location: login.php");


            }


            
    
?>


<!DOCTYPE html>
<html lang="en">
    <head http-equiv>
        <meta charset="utf-8" />
        <meta http-equiv="refresh">
        <meta name="viewport" content="width=device-width, infileitial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Registrar Empresa</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Crea tu Cuenta</h3></div>
                                    <form method="POST" enctype="multipart/form-data">
                                    <div class="card-body "> <h3 class="text-center font-weight-light my-1">Datos de la empresa</h3><br>
                                        
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="em_dueñonombre" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Dueño Nombres</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" name="em_dueñoapellido" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                        <label for="inputLastName">Dueño Apellidos</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="em_razonsocial" id="inputEmail" type="text" maxlength="255" placeholder="name@example.com" />
                                                <label for="inputEmail">Razon Social</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input name="em_ruc" class="form-control" id="inputFirstName" type="number" placeholder="Enter your first name" />
                                                        <label  for="inputFirstName">RUC</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input name="em_telefono" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                        <label for="inputLastName">Telefono</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input name='em_direccion' class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Dirección</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6" enctype="multipart/form-data">
                                                    <div class=" mb-3 mb-md-0">
                                                    <label >Logo Empresa</label>
                                                    <input type="file" class="form-control" name="em_logo" id="formFile" accept="image/*"  />
                                            <script>
                                                function showImage(event) {
                                                var input = event.target;
                                                var reader = new FileReader();

                                                reader.onload = function(){
                                                    var img = document.getElementById("uploaded-image");
                                                    img.src = reader.result;
                                                };

                                                reader.readAsDataURL(input.files[0]);
                                                }
                                            </script>
                                            <style>
                                                .image-container {
                                                max-width: 100px;
                                                max-height: 100px;
                                                }
                                            </style>
                                                        <div class="image-container"><img src="" class="img-fluid" id="uploaded-image" alt=""></div>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body "> <h3 class="text-center font-weight-light my-1">Datos de la sucursal</h3><br>
                                        
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input name="es_nombencargado" value="" class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Encargado Nombres</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input name="es_apencargado" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                        <label for="inputLastName">Encargado Apellidos</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input name="su_distrito" class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Distrito</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input name="su_departamento" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                        <label for="inputLastName">Departamento</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input name="es_nombre" class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Etiqueta o nombre de sucursal</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input name="su_direccion" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                        <label for="inputLastName">Dirección</label>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="card-body "> <h3 class="text-center font-weight-light my-1">Datos de Usuario</h3><br>
                                        
                                            <div class="form-floating mb-3">
                                                <input  name="us_correo" class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Correo</label>
                                            </div>
                                            
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input name="us_usuario" class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Usuario</label>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input name="us_password" class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Contraseña</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input name="us_password2" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                        <label for="inputLastName">Repetir Contraseña</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" class="btn btn-success">Crear Cuenta</button></div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">¿Ya tienes una cuenta?</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>