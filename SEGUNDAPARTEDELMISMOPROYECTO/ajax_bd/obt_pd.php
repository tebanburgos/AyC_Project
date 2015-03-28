<?php
    include('../conec.php');
    $valor = $_GET['codigo'];
    $sql2 = new conectarMySQL("localhost", "root", "", "ayc_proyecto3");
    $sql2->conectar();
    $sql2->consultar("Select p.NombreProducto, ct.CodigoCategoria, mr.CodigoMarca, pv.CodigoProveedor, p.Stock, lc.CodigoLocalizacion from producto p inner join marca mr on p.CodigoMarca=mr.CodigoMarca inner join categoria ct on mr.CodigoCategoria=ct.CodigoCategoria inner join proveedor pv on p.CodigoProveedor=pv.CodigoProveedor Inner join localizacion lc on lc.CodigoLocalizacion = p.CodigoLocalizacion WHERE p.CodigoProducto= '$valor' ");
    $row = $sql2->obtendatos();
    echo $row['NombreProducto'].'|'.$row['CodigoCategoria'].'|'.$row['CodigoMarca'].'|'.$row['CodigoLocalizacion'].'|'.$row['CodigoProveedor'].'|'.$row['Stock'];
    sleep(1);
    return $dat = $row['NombreProducto'].'|'.$row['CodigoCategoria'].'|'.$row['CodigoMarca'].'|'.$row['CodigoLocalizacion'].'|'.$row['CodigoProveedor'].'|'.$row['Stock'];
    $sql2->cerrarconexion();
    $sql2->limpiaconsulta();
?>