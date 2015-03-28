<?php
    include('../conec.php');
    $valor = $_GET['codigo'];
    $sql2 = new conectarMySQL("localhost", "root", "admin", "ayc_proyecto3");
    $sql2->conectar();
    $sql2->consultar("Select Count(CodigoProducto) from producto WHERE CodigoProducto=$valor");
    $row = $sql2->obtendatos();
    echo $row[0];
    sleep(1);
    return $dat = $row[0];
    $sql2->cerrarconexion();
    $sql2->limpiaconsulta();
?>