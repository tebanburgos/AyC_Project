<?php

date_default_timezone_set('America/Santiago');
require_once "PHPExcel.php";

//VARIABLES DE PHP
$objPHPExcel = new PHPExcel();
$Archivo = "DetalleDeVentas";

//DATOS DE LA CONECCION MYSQL
$link=mysql_connect("localhost","root","");
$bd  =mysql_select_db("ayc_proyecto3");


// Propiedades de archivo Excel
$objPHPExcel->getProperties()->setCreator("AyC")
->setLastModifiedBy("AyC")
->setTitle("DetalleDeVentas")
->setSubject("Reporte")
->setDescription("")
->setKeywords("")
->setCategory("");


//PROPIEDADES DEL  LA CELDA
$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial Narrow');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);
$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(60);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);



//CABECERA DE LA CONSULTA
$y = 1;
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue("A".$y, 'ID Venta')
->setCellValue("B".$y, 'Producto')
->setCellValue("C".$y, 'Cantidad')
->setCellValue("D".$y, 'Subtotal')
->setCellValue("E".$y, 'Impuesto');


$objPHPExcel->getActiveSheet()
            ->getStyle('A1:E1')
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
            ->getStyle('A1:E1')
			      ->applyFromArray($borders);


//DETALLE DE LA CONSULTA
$sql ="SELECT detalle_venta.CodigoVenta, detalle_venta.CodigoProducto, detalle_venta.Cantidad, detalle_venta.Subtotal, detalle_venta.Impuesto, producto.CodigoProducto, producto.NombreProducto FROM detalle_venta INNER JOIN producto ON detalle_venta.CodigoProducto = producto.CodigoProducto;";
$rec =mysql_query($sql);
while($row=mysql_fetch_array($rec))
{
    $y++;
    //BORDE DE LA CELDA
		$objPHPExcel->setActiveSheetIndex(0)
    ->getStyle('A'.$y."B".$y."C".$y."D".$y.":E".$y."F")
    ->applyFromArray($borders);

    //MOSTRAMOS LOS VALORES
    $objPHPExcel->setActiveSheetIndex(0)
		->setCellValue("A".$y, $row['CodigoVenta'])
		->setCellValue("B".$y, $row['NombreProducto'])
		->setCellValue("C".$y, $row['Cantidad'])
		->setCellValue("D".$y, $row['Subtotal'])
		->setCellValue("E".$y, $row['Impuesto']);
}

//DATOS DE LA SALIDA DEL EXCEL
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="'.$Archivo.'"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');

exit;

?>