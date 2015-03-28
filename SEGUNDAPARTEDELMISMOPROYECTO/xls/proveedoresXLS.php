<?php

date_default_timezone_set('America/Santiago');
require_once "PHPExcel.php";

//VARIABLES DE PHP
$objPHPExcel = new PHPExcel();
$Archivo = "ListadoProveedores";

//DATOS DE LA CONECCION MYSQL
$link=mysql_connect("localhost","root","");
$bd  =mysql_select_db("ayc_proyecto3");


// Propiedades de archivo Excel
$objPHPExcel->getProperties()->setCreator("AyC")
->setLastModifiedBy("AyC")
->setTitle("ListadoProveedores")
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
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);



//CABECERA DE LA CONSULTA
$y = 1;
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue("A".$y, 'ID')
->setCellValue("B".$y, 'Pais')
->setCellValue("C".$y, 'Ciudad')
->setCellValue("D".$y, 'Nombre')
->setCellValue("E".$y, 'Rut')
->setCellValue("F".$y, 'Fono 1')
->setCellValue("G".$y, 'Fono 2')
->setCellValue("H".$y, 'Email')
->setCellValue("I".$y, 'Contacto');


$objPHPExcel->getActiveSheet()
            ->getStyle('A1:I1')
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
            ->getStyle('A1:I1')
			      ->applyFromArray($borders);


//DETALLE DE LA CONSULTA
$sql ="SELECT proveedor.CodigoProveedor, proveedor.CodigoCiudad, proveedor.NombreProveedor, proveedor.RutProveedor, proveedor.Telefono1Proveedor, proveedor.Telefono2Proveedor, proveedor.EmailProveedor, proveedor.Nombredecontacto, ciudad.CodigoCiudad, ciudad.CodigoPais, ciudad.NombreCiudad, pais.CodigoPais, pais.NombrePais FROM proveedor INNER JOIN ciudad ON proveedor.CodigoCiudad = ciudad.CodigoCiudad INNER JOIN pais ON ciudad.CodigoPais = pais.CodigoPais;";
$rec =mysql_query($sql);
while($row=mysql_fetch_array($rec))
{
    $y++;
    //BORDE DE LA CELDA
		$objPHPExcel->setActiveSheetIndex(0)
    ->getStyle('A'.$y."B".$y."C".$y."D".$y."E".$y."F".$y."G".$y."H".$y.":I".$y."J")
    ->applyFromArray($borders);

    //MOSTRAMOS LOS VALORES
    $objPHPExcel->setActiveSheetIndex(0)
		->setCellValue("A".$y, $row['CodigoProveedor'])
		->setCellValue("B".$y, $row['NombrePais'])
		->setCellValue("C".$y, $row['NombreCiudad'])
		->setCellValue("D".$y, $row['NombreProveedor'])
		->setCellValue("E".$y, $row['RutProveedor'])
		->setCellValue("F".$y, $row['Telefono1Proveedor'])
		->setCellValue("G".$y, $row['Telefono2Proveedor'])
		->setCellValue("H".$y, $row['EmailProveedor'])
		->setCellValue("I".$y, $row['Nombredecontacto']);
}

//DATOS DE LA SALIDA DEL EXCEL
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="'.$Archivo.'"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');

exit;

?>