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
$pdf->Cell(0, 5, 'LISTADO PROVEEDORES', 0, 1, 'C');

//DATOS DE CONEXION
mysql_connect("localhost","root","");
mysql_select_db("ayc_proyecto3");

//MOSTRAMOS LA TABLA
$pdf->Ln();
	$pdf->Cell(30, 5, "ID" ,1,0, 'C');
	$pdf->Cell(30, 5, "Pais",1,0, 'C');
	$pdf->Cell(30, 5, "Ciudad" ,1,0, 'C');
	$pdf->Cell(30, 5, "Nombre",1,0, 'C');
	$pdf->Cell(30, 5, "RUT",1,0, 'C');
	$pdf->Cell(30, 5, "Fono 1",1,0, 'C');
	$pdf->Cell(30, 5, "Fono 2",1,0, 'C');
	$pdf->Cell(30, 5, "Email",1,0, 'C');
	$pdf->Cell(30, 5, "Contacto",1,1, 'C');


$sql="SELECT proveedor.CodigoProveedor, proveedor.CodigoCiudad, proveedor.NombreProveedor, proveedor.RutProveedor, proveedor.Telefono1Proveedor, proveedor.Telefono2Proveedor, proveedor.EmailProveedor, proveedor.Nombredecontacto, ciudad.CodigoCiudad, ciudad.CodigoPais, ciudad.NombreCiudad, pais.CodigoPais, pais.NombrePais FROM proveedor INNER JOIN ciudad ON proveedor.CodigoCiudad = ciudad.CodigoCiudad INNER JOIN pais ON ciudad.CodigoPais = pais.CodigoPais;";
$rec=mysql_query($sql);
while($row=mysql_fetch_array($rec))
{
	$pdf->Cell(30, 5, $row['CodigoProveedor'],1,0, 'C');
	$pdf->Cell(30, 5, $row['NombrePais'],1,0, 'C');
	$pdf->Cell(30, 5, $row['NombreCiudad'],1,0, 'C');
	$pdf->Cell(30, 5, $row['NombreProveedor'],1,0, 'C');
	$pdf->Cell(30, 5, $row['RutProveedor'],1,0, 'C');
	$pdf->Cell(30, 5, $row['Telefono1Proveedor'],1,0, 'C');
	$pdf->Cell(30, 5, $row['Telefono2Proveedor'],1,0, 'C');
	$pdf->Cell(30, 5, $row['EmailProveedor'],1,0, 'C');
	$pdf->Cell(30, 5, $row['Nombredecontacto'],1,1, 'C');
}




$pdf->Output("ListadoProveedores.pdf","d");
//$pdf->Output("Contrato_".$per_Rut."-".$per_DV.".pdf","D");



?>
