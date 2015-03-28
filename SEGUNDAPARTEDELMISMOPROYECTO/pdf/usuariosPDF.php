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
$pdf->Cell(0, 5, 'LISTADO DE USUARIOS', 0, 1, 'C');

//DATOS DE CONEXION
mysql_connect("localhost","root","");
mysql_select_db("ayc_proyecto3");

//MOSTRAMOS LA TABLA
$pdf->Ln();
	$pdf->Cell(30, 5, "ID" ,1,0, 'C');
	$pdf->Cell(30, 5, "Grupo",1,0, 'C');
	$pdf->Cell(30, 5, "Rut" ,1,0, 'C');
	$pdf->Cell(30, 5, "Nombre",1,0, 'C');
	$pdf->Cell(30, 5, "Fono 1",1,0, 'C');
	$pdf->Cell(30, 5, "Fono 2",1,0, 'C');
	$pdf->Cell(30, 5, "Email",1,1, 'C');


$sql="SELECT usuario.CodigoUsuario, usuario.CodigoGrupo, usuario.RutUsuario, usuario.NombreUsuario, usuario.Telefono1Usuario, usuario.Telefono2Usuario, usuario.EmailUsuario, grupo.CodigoGrupo, grupo.NombreGrupo FROM usuario INNER JOIN grupo ON usuario.CodigoGrupo = grupo.CodigoGrupo;";
$rec=mysql_query($sql);
while($row=mysql_fetch_array($rec))
{
	$pdf->Cell(30, 5, $row['CodigoUsuario'],1,0, 'C');
	$pdf->Cell(30, 5, $row['NombreGrupo'],1,0, 'C');
	$pdf->Cell(30, 5, $row['RutUsuario'],1,0, 'C');
	$pdf->Cell(30, 5, $row['NombreUsuario'],1,0, 'C');
	$pdf->Cell(30, 5, $row['Telefono1Usuario'],1,0, 'C');
	$pdf->Cell(30, 5, $row['Telefono2Usuario'],1,0, 'C');
	$pdf->Cell(30, 5, $row['EmailUsuario'],1,1, 'C');
}




$pdf->Output("ListadoUsuarios.pdf","d");
//$pdf->Output("Contrato_".$per_Rut."-".$per_DV.".pdf","D");



?>
