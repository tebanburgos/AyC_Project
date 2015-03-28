<?php
 header( 'Content-Type: text/html;charset=iso-8859-1' ); 
require "fpdf.php";

class PDF extends FPDF
{
}

//DELCARACION DE LA HOJA
$pdf=new PDF('L', 'mm', 'A4');
$pdf->SetMargins(20, 18);
$pdf->AliasNbPages();
$pdf->AddPage();


//DATOS DEL TITULO
$pdf->SetTextColor(0x00, 0x00, 0x00);
$pdf->SetFont("Arial", "b", 6);
$pdf->Cell(0, 5, 'LISTADO DE VENTAS', 0, 1, 'C');

//DATOS DE CONEXION
mysql_connect("localhost","root","");
mysql_select_db("ayc_proyecto3");

//MOSTRAMOS LA TABLA
$pdf->Ln();
	$pdf->Cell(30, 5, "ID venta" ,1,0, 'C');
	$pdf->Cell(30, 5, "Vendedor",1,0, 'C');
	$pdf->Cell(30, 5, "Forma de Pago" ,1,0, 'C');
	$pdf->Cell(30, 5, "Cliente",1,0, 'C');
	$pdf->Cell(30, 5, "Fecha",1,0, 'C');
	$pdf->Cell(30, 5, "Total",1,0, 'C');
	$pdf->Cell(75, 5, "Observaciones",1,1, 'C');


$sql="SELECT venta.CodigoVenta, venta.CodigoVendedor, venta.CodigoFP, venta.CodigoCliente, venta.FechaEmision, venta.Total, venta.Observaciones, vendedor.CodigoVendedor, vendedor.NombreVendedor, formadepago.CodigoFP, formadepago.NombreFP, cliente.CodigoCliente, cliente.RutCliente FROM venta INNER JOIN vendedor ON venta.CodigoVendedor = vendedor.CodigoVendedor INNER JOIN formadepago ON venta.CodigoFP = formadepago.CodigoFP INNER JOIN cliente ON venta.CodigoCliente = cliente.CodigoCliente;";
$rec=mysql_query($sql);
while($row=mysql_fetch_array($rec))
{
	$pdf->Cell(30, 5, $row['CodigoVenta'],1,0, 'C');
	$pdf->Cell(30, 5, $row['NombreVendedor'],1,0, 'C');
	$pdf->Cell(30, 5, $row['NombreFP'],1,0, 'C');
	$pdf->Cell(30, 5, $row['RutCliente'],1,0, 'C');
	$pdf->Cell(30, 5, $row['FechaEmision'],1,0, 'C');
	$pdf->Cell(30, 5, $row['Total'],1,0, 'C');
	$pdf->Cell(75, 5, $row['Observaciones'],1,1, 'C');
}




$pdf->Output("ListadoVentas.pdf","d");
//$pdf->Output("Contrato_".$per_Rut."-".$per_DV.".pdf","D");



?>
