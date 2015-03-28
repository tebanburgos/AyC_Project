<?php session_start();
//Validamos que no se ingrese sin autorizacion
if(!isset($_SESSION["userinfo"])){
header("Location:index.php");
}
else if (isset($_SESSION["userinfo"])){
	if (4==$_SESSION["userinfo"]["userinfo"][1]){
		header("Location:/ventas.php");
	}
}
// Validamos que el get sea numerico
if (is_numeric($_GET["u"])) 
	{
	include("../include/conexion.php");
	$query="Select v.CodigoVenta, pd.CodigoProducto, pd.NombreProducto, dt.Cantidad, dt.Subtotal, pd.ValorVenta, cv.NombreVendedor, p.NombreFP, cl.RutCliente, v.FechaEmision, v.Total, v.Observaciones from venta v inner join vendedor cv on v.CodigoVendedor=cv.CodigoVendedor inner join formadepago p on v.CodigoFP=p.CodigoFP inner join cliente cl on cl.CodigoCliente=v.CodigoCliente inner join detalle_venta dt on v.CodigoVenta=dt.CodigoVenta inner join producto pd on pd.CodigoProducto=dt.CodigoProducto WHERE v.CodigoVenta=".$_GET["u"].";";

	$result=mysql_db_query ($dbname, $query, $link);
	$count=0;
	while ($row = mysql_fetch_array ($result))
		{
		$fecha=date_format(date_create($row["FechaEmision"]), 'd/m/Y');
	  	$selldetail[$count] = array(
	  							$row["CodigoVenta"],
	  							$row["CodigoProducto"],
	  							$row["NombreProducto"],
	  							$row["Cantidad"],
	  							$row["ValorVenta"],
	  							$row["Subtotal"],
	  							$row["NombreVendedor"],
	  							$row["NombreFP"],
	  							$row["RutCliente"],
	  							$fecha,
	  							$row["Total"],
	  							$row["Observaciones"]);
		$count++;
		}
		mysql_close($link);
	  	$_SESSION["tm_vt"]=$selldetail;
		mysql_free_result($result);
		header("Location:../detalle_venta.php");
	}
else 
	{
		header("Location:/ventas.php");
	}
?>