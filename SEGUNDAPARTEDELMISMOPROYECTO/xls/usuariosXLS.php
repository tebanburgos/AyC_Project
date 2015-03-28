<?php

date_default_timezone_set('America/Santiago');
require_once "PHPExcel.php";

//VARIABLES DE PHP
$objPHPExcel = new PHPExcel();
$Archivo = "ListadoUsuarios";

//DATOS DE LA CONECCION MYSQL
$link=mysql_connect("localhost","root","");
$bd  =mysql_select_db("ayc_proyecto3");


// Propiedades de archivo Excel
$objPHPExcel->getProperties()->setCreator("AyC")
->setLastModifiedBy("AyC")
->setTitle("ListadoUsuarios")
->setSubject("Reporte")
->setDescription("")
->setKeywords("")
->setCategory("");


//PROPIEDADES DEL  LA CELDA
$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial Narrow');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);
$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);


//CABECERA DE LA CONSULTA
$y = 1;
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue("A".$y, 'ID')
->setCellValue("B".$y, 'Grupo')
->setCellValue("C".$y, 'Rut')
->setCellValue("D".$y, 'Nombre')
->setCellValue("E".$y, 'Fono 1')
->setCellValue("F".$y, 'Fono 2')
->setCellValue("G".$y, 'Email');



$objPHPExcel->getActiveSheet()
            ->getStyle('A1:G1')
            ->getFill()
            ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFEEEEEE');

 $borders = array(
      'borders' => array(
        'allborders' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
          'color' => array('argb' => 'FF000000'),
        )
      ),
 );

$objPHPExcel->getActiveSheet()
            ->getStyle('A1:G1')
			      ->applyFromArray($borders);


//DETALLE DE LA CONSULTA
$sql ="SELECT usuario.CodigoUsuario, usuario.CodigoGrupo, usuario.RutUsuario, usuario.NombreUsuario, usuario.Telefono1Usuario, usuario.Telefono2Usuario, usuario.EmailUsuario, grupo.CodigoGrupo, grupo.NombreGrupo FROM usuario INNER JOIN grupo ON usuario.CodigoGrupo = grupo.CodigoGrupo;";
$rec =mysql_query($sql);
while($row=mysql_fetch_array($rec))
{
    $y++;
    //BORDE DE LA CELDA
		$objPHPExcel->setActiveSheetIndex(0)
    ->getStyle('A'.$y."B".$y."C".$y."D".$y."E".$y."F".$y.":G".$y."H")
    ->applyFromArray($borders);

    //MOSTRAMOS LOS VALORES
    $objPHPExcel->setActiveSheetIndex(0)
		->setCellValue("A".$y, $row['CodigoUsuario'])
		->setCellValue("B".$y, $row['NombreGrupo'])
		->setCellValue("C".$y, $row['RutUsuario'])
		->setCellValue("D".$y, $row['NombreUsuario'])
		->setCellValue("E".$y, $row['Telefono1Usuario'])
		->setCellValue("F".$y, $row['Telefono2Usuario'])
		->setCellValue("G".$y, $row['EmailUsuario']);
}

//DATOS DE LA SALIDA DEL EXCEL
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="'.$Archivo.'"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');

exit;

?>