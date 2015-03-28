<?php session_start();
//Validamos que no se ingrese sin autorizacion
if(!isset($_SESSION["userinfo"])){
header("Location:index.php");
}
else if (isset($_SESSION["userinfo"])){
	if (2<$_SESSION["userinfo"]["userinfo"][1]){
		header("Location:/resumen.php");
	}
}
// Validamos que el get sea numerico
if (is_numeric($_GET["u"])) 
	{
	include("../include/conexion.php");
	$query="SELECT proveedor.CodigoProveedor, proveedor.CodigoCiudad, proveedor.CodigoGiroEmpresa, proveedor.NombreProveedor, proveedor.Razonsocial, proveedor.RutProveedor, proveedor.Telefono1Proveedor, proveedor.Telefono2Proveedor, proveedor.EmailProveedor, proveedor.Nombredecontacto, ciudad.CodigoCiudad, ciudad.CodigoPais, ciudad.NombreCiudad, pais.CodigoPais, pais.NombrePais, giroempresa.CodigoGiroEmpresa, giroempresa.NombreGiroEmpresa FROM proveedor INNER JOIN ciudad ON proveedor.CodigoCiudad = ciudad.CodigoCiudad INNER JOIN pais ON ciudad.CodigoPais = pais.CodigoPais INNER JOIN giroempresa ON proveedor.CodigoGiroEmpresa = giroempresa.CodigoGiroEmpresa WHERE proveedor.CodigoProveedor =".$_GET["u"].";";

	$result=mysql_db_query ($dbname, $query, $link);
	while ($row = mysql_fetch_array ($result))
		{
	  if ($row["CodigoProveedor"]==$_GET["u"])
	  	{
	  	$_SESSION["userdetail"]=$user = array(
	  		"userdetail" => array(

	  							$row["NombreProveedor"],
								$row["Razonsocial"],
	  							$row["RutProveedor"],
								$row["CodigoPais"],
	  							$row["NombrePais"],
	  							$row["CodigoCiudad"],
								$row["NombreCiudad"],
								$row["CodigoGiroEmpresa"],
								$row["NombreGiroEmpresa"],
	  							$row["Telefono1Proveedor"],
								$row["Telefono2Proveedor"],
								$row["EmailProveedor"],
								$row["Nombredecontacto"],
	  							$row["CodigoProveedor"]));
	  		
		
		mysql_close($link);
	  	header("Location:../editar_proveedor.php");
	  	}	
		}
		mysql_free_result($result);
	}
else 
	{
		header("Location:/proveedores.php");
	}
?>