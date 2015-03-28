<?php
    include('../conec.php');
    $valor = $_GET['codigo'];
    $sql2 = new conectarMySQL("localhost", "root", "admin", "ayc_proyecto3");
    $sql2->conectar();
    $sql2->consultar("Select p.NombreProducto, ct.NombreCategoria, mr.NombreMarca, pv.NombreProveedor, p.Stock, lc.des_localizacion, Count(p.CodigoProducto) from producto p inner join marca mr on p.CodigoMarca=mr.CodigoMarca inner join categoria ct on mr.CodigoCategoria=ct.CodigoCategoria inner join proveedor pv on p.CodigoProveedor=pv.CodigoProveedor Inner join localizacion lc on lc.CodigoLocalizacion = p.CodigoLocalizacion WHERE p.CodigoProducto= '$valor' ");
    $row = $sql2->obtendatos();
    echo $row['NombreProducto'].'|'.$row['NombreCategoria'].'|'.$row['NombreMarca'].'|'.$row['des_localizacion'].'|'.$row['NombreProveedor'].'|'.$row['Stock'].'|'.$row[6];
    sleep(1);
    return $dat = $row['NombreProducto'].'|'.$row['NombreCategoria'].'|'.$row['NombreMarca'].'|'.$row['des_localizacion'].'|'.$row['NombreProveedor'].'|'.$row['Stock'].'|'.$row[6];
    $sql2->cerrarconexion();
    $sql2->limpiaconsulta();
?>