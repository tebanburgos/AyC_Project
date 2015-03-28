<?php session_start();
$user=$_SESSION["userinfo"]["userinfo"][0];
$cliente=$_POST["cliente"];
$cantidad = $_POST["cantidad"];
include('..\include\conexion.php');
$tablename="detalle_venta";
$query="INSERT INTO $tablename (`CodigoProveedor`, `CodigoLocalizacion`, `CodigoMarca`, `NombreProducto`,`Stock`,`ValorCompra`,`ValorVenta`, `CodigoUsuario`)
	VALUES($codigo,$prove,$loca,$marca,'$nombre',$cantidad,$valorC,$valorV,$user);";
$result=mysql_db_query ($dbname, $query, $link);
mysql_close($link);
if($result>0){
	$_SESSION["alert_new"]=true;
}
header("Location: /productos.php");
?>