<?php session_start();
$codigo=$_POST["codigo"];
$cantidad = $_POST["cantidadIng"];
include('..\include\conexion.php');
$tablename="producto";
$query="UPDATE $tablename SET Stock=Stock+($cantidad) Where CodigoProducto = $codigo ;";
$result=mysql_db_query ($dbname, $query, $link);
mysql_close($link);
if($result>0){
	$_SESSION["alert"]=true;
}
header("Location: /productos.php");
?>