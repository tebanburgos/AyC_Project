<?php session_start();
$user=$_SESSION["userinfo"]["userinfo"][0];
$codigo=$_POST["codigo"];
$nombre=$_POST["nombre"];
$marca=$_POST["marca"];
$loca=$_POST["localizacion"];
$valorC=$_POST["valorC"];
$valorV=$_POST["valorV"];
$prove=$_POST["proveedor"];
$cantidad = $_POST["cantidadIng"];
include('..\include\conexion.php');
$tablename="producto";
$query="INSERT INTO $tablename (`CodigoProducto`, `CodigoProveedor`, `CodigoLocalizacion`, `CodigoMarca`, `NombreProducto`,`Stock`,`ValorCompra`,`ValorVenta`, `CodigoUsuario`)
	VALUES($codigo,$prove,$loca,$marca,'$nombre',$cantidad,$valorC,$valorV,$user);";
$result=mysql_db_query ($dbname, $query, $link);
mysql_close($link);
if($result>0){
	$_SESSION["alert_new"]=true;
}
header("Location: /productos.php");
?>