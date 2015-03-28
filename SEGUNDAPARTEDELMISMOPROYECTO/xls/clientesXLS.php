<?php

date_default_timezone_set('America/Santiago');
require_once "PHPExcel.php";

//VARIABLES DE PHP
$objPHPExcel = new PHPExcel();
$Archivo = "ListadoClientes";

//DATOS DE LA CONECCION MYSQL
$link=mysql_connect("localhost","root","");
$bd  =mysql_select_db("ayc_proyecto3");


// Propiedades de archivo Excel
$objPHPExcel->getProperties()->setCreator("AyC")
->setLastModifiedBy("AyC")
->setTitle("ListadoClientes")
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
->setCellValue("B".$y, 'Rut')
->setCellValue("C".$y, 'Nombre')
->setCellValue("D".$y, 'Apellido')
->setCellValue("E".$y, 'Fono 1')
->setCellValue("F".$y, 'Fono 2')
->setCellValue("G".$y, 'Ciudad')
->setCellValue("H".$y, 'Email')
->setCellValue("I".$y, 'Direccion');


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
$sql ="SELECT cliente.CodigoCliente, cliente.RutCliente, cliente.NombreCliente, cliente.ApellidoCliente, cliente.Telefono1Cliente, cliente.Telefono2Cliente, cliente.CodigoCiudadCliente, cliente.EmailCliente, cliente.DireccionCliente, ciudadcliente.CodigoCiudadCliente, ciudadcliente.NombreCiudadCliente FROM cliente INNER JOIN ciudadcliente ON cliente.CodigoCiudadCliente = ciudadcliente.CodigoCiudadCliente";
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
		->setCellValue("A".$y, $row['CodigoCliente'])
		->setCellValue("B".$y, $row['RutCliente'])
		->setCellValue("C".$y, $row['NombreCliente'])
		->setCellValue("D".$y, $row['ApellidoCliente'])
		->setCellValue("E".$y, $row['Telefono1Cliente'])
		->setCellValue("F".$y, $row['Telefono2Cliente'])
		->setCellValue("G".$y, $row['NombreCiudadCliente'])
		->setCellValue("H".$y, $row['EmailCliente'])
		->setCellValue("I".$y, $row['DireccionCliente']);
}

//DATOS DE LA SALIDA DEL EXCEL
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="'.$Archivo.'"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');

exit;

?>