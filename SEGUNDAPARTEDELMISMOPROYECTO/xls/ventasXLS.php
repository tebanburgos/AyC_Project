<?php

date_default_timezone_set('America/Santiago');
require_once "PHPExcel.php";

//VARIABLES DE PHP
$objPHPExcel = new PHPExcel();
$Archivo = "ListadoVentas";

//DATOS DE LA CONECCION MYSQL
$link=mysql_connect("localhost","root","");
$bd  =mysql_select_db("ayc_proyecto3");


// Propiedades de archivo Excel
$objPHPExcel->getProperties()->setCreator("AyC")
->setLastModifiedBy("AyC")
->setTitle("ListadoVentas")
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
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(75);


//CABECERA DE LA CONSULTA
$y = 1;
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue("A".$y, 'ID Venta')
->setCellValue("B".$y, 'Vendedor')
->setCellValue("C".$y, 'Forma de pago')
->setCellValue("D".$y, 'Cliente')
->setCellValue("E".$y, 'Fecha')
->setCellValue("F".$y, 'Total')
->setCellValue("G".$y, 'Observaciones');


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
$sql ="SELECT venta.CodigoVenta, venta.CodigoVendedor, venta.CodigoFP, venta.CodigoCliente, venta.FechaEmision, venta.Total, venta.Observaciones, vendedor.CodigoVendedor, vendedor.NombreVendedor, formadepago.CodigoFP, formadepago.NombreFP, cliente.CodigoCliente, cliente.RutCliente FROM venta INNER JOIN vendedor ON venta.CodigoVendedor = vendedor.CodigoVendedor INNER JOIN formadepago ON venta.CodigoFP = formadepago.CodigoFP INNER JOIN cliente ON venta.CodigoCliente = cliente.CodigoCliente;";
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
		->setCellValue("A".$y, $row['CodigoVenta'])
		->setCellValue("B".$y, $row['NombreVendedor'])
		->setCellValue("C".$y, $row['NombreFP'])
		->setCellValue("D".$y, $row['RutCliente'])
		->setCellValue("E".$y, $row['FechaEmision'])
		->setCellValue("F".$y, $row['Total'])
		->setCellValue("G".$y, $row['Observaciones']);
}

//DATOS DE LA SALIDA DEL EXCEL
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="'.$Archivo.'"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');

exit;

?>