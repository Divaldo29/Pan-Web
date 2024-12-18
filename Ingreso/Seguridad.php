<?php 
    if(!empty($_GET['usuid']) && !empty($_GET['emp']) && !empty($_GET['sucu'])){

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://panaderia.informaticapp.com/usuarios/'.$_GET['usuid'],
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
            $Modulos = json_decode($response, true); 

        }else{
            
            header("Location: ../login.php");


        }

?>