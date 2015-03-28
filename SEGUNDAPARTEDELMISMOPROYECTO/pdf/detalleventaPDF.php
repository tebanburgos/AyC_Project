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
$pdf->Cell(0, 5, 'DETALLE DE VENTAS', 0, 1, 'C');

//DATOS DE CONEXION
mysql_connect("localhost","root","");
mysql_select_db("ayc_proyecto3");

//MOSTRAMOS LA TABLA
$pdf->Ln();
	$pdf->Cell(30, 5, "ID Venta" ,1,0, 'C');
	$pdf->Cell(60, 5, "Producto",1,0, 'C');
	$pdf->Cell(30, 5, "Cantidad" ,1,0, 'C');
	$pdf->Cell(30, 5, "Subtotal",1,0, 'C');
	$pdf->Cell(30, 5, "Impuesto",1,1, 'C');


$sql="SELECT detalle_venta.CodigoVenta, detalle_venta.CodigoProducto, detalle_venta.Cantidad, detalle_venta.Subtotal, detalle_venta.Impuesto, producto.CodigoProducto, producto.NombreProducto FROM detalle_venta INNER JOIN producto ON detalle_venta.CodigoProducto = producto.CodigoProducto;";
$rec=mysql_query($sql);
while($row=mysql_fetch_array($rec))
{
	$pdf->Cell(30, 5, $row['CodigoVenta'],1,0, 'C');
	$pdf->Cell(60, 5, $row['NombreProducto'],1,0, 'C');
	$pdf->Cell(30, 5, $row['Cantidad'],1,0, 'C');
	$pdf->Cell(30, 5, $row['Subtotal'],1,0, 'C');
	$pdf->Cell(30, 5, $row['Impuesto'],1,1, 'C');
}




$pdf->Output("DetalleDeVentas.pdf","d");
//$pdf->Output("Contrato_".$per_Rut."-".$per_DV.".pdf","D");



?>
