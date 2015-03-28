<?php session_start();
//Validamos que no se ingrese sin autorizacion
if(!isset($_SESSION["userinfo"])){
header("Location:index.php");
}
// Validamos que el get sea numerico
if (is_numeric($_GET["u"])) 
	{
	include("../include/conexion.php");
	$query="Select p.CodigoProducto, p.NombreProducto, ct.NombreCategoria, mr.NombreMarca, pv.NombreProveedor, p.Stock, lc.des_localizacion, p.ValorCompra, p.ValorVenta, us.NombreUsuario from producto p inner join marca mr on p.CodigoMarca=mr.CodigoMarca inner join categoria ct on mr.CodigoCategoria=ct.CodigoCategoria inner join proveedor pv on p.CodigoProveedor=pv.CodigoProveedor Inner join localizacion lc on lc.CodigoLocalizacion = p.CodigoLocalizacion inner join usuario us on p.CodigoUsuario=us.CodigoUsuario where p.CodigoProducto =".$_GET["u"];

	$result=mysql_db_query ($dbname, $query, $link);
	while ($row = mysql_fetch_array ($result))
		{
	  if ($row["CodigoProducto"]==$_GET["u"])
	  	{
	  	$_SESSION["proddetail"]=$prod = array(
	  		"proddetail" => array(
	  							$row["CodigoProducto"],
	  							$row["NombreProducto"],
	  							$row["NombreCategoria"],
	  							$row["NombreMarca"],
	  							$row["des_localizacion"],
	  							$row["NombreProveedor"],
	  							$row["Stock"],
	  							$row["ValorCompra"],
	  							$row["ValorVenta"],
	  							$row["NombreUsuario"]
	  							));
	  		
		
		mysql_close($link);
	  	header("Location:../detalle_producto.php");
	  	}	
		}
		mysql_free_result($result);
	}
else 
	{
		header("Location:/producto.php");
	}
?>