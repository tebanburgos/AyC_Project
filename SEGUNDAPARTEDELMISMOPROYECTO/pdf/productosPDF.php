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
$pdf->Cell(0, 5, 'LISTADO DE PRODUCTOS', 0, 1, 'C');

//DATOS DE CONEXION
mysql_connect("localhost","root","");
mysql_select_db("ayc_proyecto3");

//MOSTRAMOS LA TABLA
$pdf->Ln();
	$pdf->Cell(30, 5, "Codigo" ,1,0, 'C');
	$pdf->Cell(30, 5, "Localizacion",1,0, 'C');
	$pdf->Cell(30, 5, "Marca" ,1,0, 'C');
	$pdf->Cell(60, 5, "Nombre",1,0, 'C');
	$pdf->Cell(30, 5, "Stock",1,0, 'C');
	$pdf->Cell(30, 5, "Valor de compra",1,0, 'C');
	$pdf->Cell(30, 5, "Valor de venta",1,0, 'C');
	$pdf->Cell(30, 5, "Fecha y hora ingreso",1,1, 'C');
	


$sql="SELECT producto.CodigoProducto, producto.CodigoLocalizacion, producto.CodigoMarca, producto.NombreProducto, producto.Stock, producto.ValorCompra, producto.ValorVenta, producto.FechaYHoraIngreso, localizacion.CodigoLocalizacion, localizacion.des_localizacion, marca.CodigoMarca, marca.NombreMarca FROM producto INNER JOIN localizacion ON producto.CodigoLocalizacion = localizacion.CodigoLocalizacion INNER JOIN marca ON producto.CodigoMarca = marca.CodigoMarca;";
$rec=mysql_query($sql);
while($row=mysql_fetch_array($rec))
{
	$pdf->Cell(30, 5, $row['CodigoProducto'],1,0, 'C');
	$pdf->Cell(30, 5, $row['des_localizacion'],1,0, 'C');
	$pdf->Cell(30, 5, $row['NombreMarca'],1,0, 'C');
	$pdf->Cell(60, 5, $row['NombreProducto'],1,0, 'C');
	$pdf->Cell(30, 5, $row['Stock'],1,0, 'C');
	$pdf->Cell(30, 5, $row['ValorCompra'],1,0, 'C');
	$pdf->Cell(30, 5, $row['ValorVenta'],1,0, 'C');
	$pdf->Cell(30, 5, $row['FechaYHoraIngreso'],1,1, 'C');
}




$pdf->Output("ListadoProductos.pdf","d");
//$pdf->Output("Contrato_".$per_Rut."-".$per_DV.".pdf","D");



?>
