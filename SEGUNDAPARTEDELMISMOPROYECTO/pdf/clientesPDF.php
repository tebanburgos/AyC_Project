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
$pdf->Cell(0, 5, 'LISTADO DE CLIENTES', 0, 1, 'C');

//DATOS DE CONEXION
mysql_connect("localhost","root","");
mysql_select_db("ayc_proyecto3");

//MOSTRAMOS LA TABLA
$pdf->Ln();
	$pdf->Cell(30, 5, "ID" ,1,0, 'C');
	$pdf->Cell(30, 5, "Rut",1,0, 'C');
	$pdf->Cell(30, 5, "Nombre" ,1,0, 'C');
	$pdf->Cell(30, 5, "Apellido",1,0, 'C');
	$pdf->Cell(30, 5, "Fono 1",1,0, 'C');
	$pdf->Cell(30, 5, "Fono 2",1,0, 'C');
	$pdf->Cell(30, 5, "Ciudad",1,0, 'C');
	$pdf->Cell(30, 5, "Email",1,0, 'C');
	$pdf->Cell(30, 5, "Direccion",1,1, 'C');


$sql="SELECT cliente.CodigoCliente, cliente.RutCliente, cliente.NombreCliente, cliente.ApellidoCliente, cliente.Telefono1Cliente, cliente.Telefono2Cliente, cliente.CodigoCiudadCliente, cliente.EmailCliente, cliente.DireccionCliente, ciudadcliente.CodigoCiudadCliente, ciudadcliente.NombreCiudadCliente FROM cliente INNER JOIN ciudadcliente ON cliente.CodigoCiudadCliente = ciudadcliente.CodigoCiudadCliente";
$rec=mysql_query($sql);
while($row=mysql_fetch_array($rec))
{
	$pdf->Cell(30, 5, $row['CodigoCliente'],1,0, 'C');
	$pdf->Cell(30, 5, $row['RutCliente'],1,0, 'C');
	$pdf->Cell(30, 5, $row['NombreCliente'],1,0, 'C');
	$pdf->Cell(30, 5, $row['ApellidoCliente'],1,0, 'C');
	$pdf->Cell(30, 5, $row['Telefono1Cliente'],1,0, 'C');
	$pdf->Cell(30, 5, $row['Telefono2Cliente'],1,0, 'C');
	$pdf->Cell(30, 5, $row['NombreCiudadCliente'],1,0, 'C');
	$pdf->Cell(30, 5, $row['EmailCliente'],1,0, 'C');
	$pdf->Cell(30, 5, $row['DireccionCliente'],1,1, 'C');
}




$pdf->Output("ListadoClientes.pdf","d");
//$pdf->Output("Contrato_".$per_Rut."-".$per_DV.".pdf","D");



?>
