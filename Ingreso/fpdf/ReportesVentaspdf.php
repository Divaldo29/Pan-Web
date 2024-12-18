<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        
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
        $this->Cell(0, 10, 'Venta de productos', 0, 1, 'C');
        $this->Ln(10);

        // Encabezados de la tabla
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(40, 10, 'Producto', 1);
        $this->Cell(40, 10, 'Cantidad', 1);
        $this->Cell(40, 10, 'Cliente', 1);
        $this->Cell(40, 10, 'Numero de Venta', 1);
        $this->Cell(40, 10, 'Orden de Ventas', 1);
        $this->Cell(40, 10, 'Total', 1);
        $this->Ln();

        // Contenido de la tabla
        $ventas = $ventas["Detalle"];
        $this->SetFont('Arial', '', 12);
        foreach ($ventas as $ven) {
            $this->Cell(40, 10, $ven["pro_nombre"], 1, 0, 'C');
            $this->Cell(40, 10, $ven["dv_cantidad"], 1, 0, 'C');
            $this->Cell(40, 10, $ven["cl_dni"], 1, 0, 'C');
            $this->Cell(40, 10, $ven["dv_numero"], 1, 0, 'C');
            $this->Cell(40, 10, $ven["dv_ordenVenta"], 1, 0, 'C');
            $this->Cell(40, 10, $ven["ve_total"], 1, 0, 'C');
            $this->Ln();
        }
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->Output('reporte.pdf', 'D');
?>
