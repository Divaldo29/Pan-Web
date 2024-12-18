<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        $curl = curl_init();

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
     

        // Obtener el nombre de la empresa desde la respuesta de la API

        // Creación del encabezado
        $this->Image('bobobob.jpeg', 185, 5, 20); // Logo de la empresa (Ajusta las coordenadas y el tamaño según tus necesidades)
        $this->SetFont('Arial', 'B', 19);
        $this->Cell(45);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(110, 15, utf8_decode('Pasteleria bustrap'), 0, 1, 'C', 0);
        $this->Ln(3);
        $this->SetTextColor(103);

        // Titulo de la tabla
        $this->Ln(10);
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, 'Compras de productos', 0, 1, 'C');
        $this->Ln(10);

        // Encabezados de la tabla
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(40, 10, 'Producto', 1);
        $this->Cell(40, 10, 'Proveedor', 1);
        $this->Cell(40, 10, 'Fecha Compra', 1);
        $this->Cell(40, 10, 'Cantidad Adquirida', 1);
        $this->Cell(40, 10, 'Cantidad Disponible', 1);
        $this->Cell(40, 10, 'Cantidad Precio Compra', 1);
        $this->Ln();

        // Contenido de la tabla
        $pagos = $pagos["Detalle"];
        $this->SetFont('Arial', '', 12);
        foreach ($pagos as $pag) {
            $this->Cell(40, 10, $pag["pro_nombre"], 1, 0, 'C');
            $this->Cell(40, 10, $pag["pv_RazonSocial"], 1, 0, 'C');
            $this->Cell(40, 10, $pag["pag_FechaCompra"], 1, 0, 'C');
            $this->Cell(40, 10, $pag["st_CantidadAdquirida"], 1, 0, 'C');
            $this->Cell(40, 10, $pag["st_CantidadDisponible"], 1, 0, 'C');
            $this->Cell(40, 10, $pag["pag_PrecioCompra"], 1, 0, 'C');
            $this->Ln();
        }
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->Output('reporte.pdf', 'D');
?>
