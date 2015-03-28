<?php

date_default_timezone_set('America/Santiago');
require_once "PHPExcel.php";

//VARIABLES DE PHP
$objPHPExcel = new PHPExcel();
$Archivo = "ListadoProductos";

//DATOS DE LA CONECCION MYSQL
$link=mysql_connect("localhost","root","");
$bd  =mysql_select_db("ayc_proyecto3");


// Propiedades de archivo Excel
$objPHPExcel->getProperties()->setCreator("AyC")
->setLastModifiedBy("AyC")
->setTitle("ListadoProductos")
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
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(60);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);



//CABECERA DE LA CONSULTA
$y = 1;
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue("A".$y, 'Codigo')
->setCellValue("B".$y, 'Localizacion')
->setCellValue("C".$y, 'Marca')
->setCellValue("D".$y, 'Nombre')
->setCellValue("E".$y, 'Stock')
->setCellValue("F".$y, 'Valor de compra')
->setCellValue("G".$y, 'Valor de venta')
->setCellValue("H".$y, 'Fecha y Hora ingreso');


$objPHPExcel->getActiveSheet()
            ->getStyle('A1:H1')
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
            ->getStyle('A1:H1')
			      ->applyFromArray($borders);


//DETALLE DE LA CONSULTA
$sql ="SELECT producto.CodigoProducto, producto.CodigoLocalizacion, producto.CodigoMarca, producto.NombreProducto, producto.Stock, producto.ValorCompra, producto.ValorVenta, producto.FechaYHoraIngreso, localizacion.CodigoLocalizacion, localizacion.des_localizacion, marca.CodigoMarca, marca.NombreMarca FROM producto INNER JOIN localizacion ON producto.CodigoLocalizacion = localizacion.CodigoLocalizacion INNER JOIN marca ON producto.CodigoMarca = marca.CodigoMarca;";
$rec =mysql_query($sql);
while($row=mysql_fetch_array($rec))
{
    $y++;
    //BORDE DE LA CELDA
		$objPHPExcel->setActiveSheetIndex(0)
    ->getStyle('A'.$y."B".$y."C".$y."D".$y."E".$y."F".$y."G".$y.":H".$y."I")
    ->applyFromArray($borders);

    //MOSTRAMOS LOS VALORES
    $objPHPExcel->setActiveSheetIndex(0)
		->setCellValue("A".$y, $row['CodigoProducto'])
		->setCellValue("B".$y, $row['des_localizacion'])
		->setCellValue("C".$y, $row['NombreMarca'])
		->setCellValue("D".$y, $row['NombreProducto'])
		->setCellValue("E".$y, $row['Stock'])
		->setCellValue("F".$y, $row['ValorCompra'])
		->setCellValue("G".$y, $row['ValorVenta'])
		->setCellValue("H".$y, $row['FechaYHoraIngreso']);
}

//DATOS DE LA SALIDA DEL EXCEL
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="'.$Archivo.'"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');

exit;

?>