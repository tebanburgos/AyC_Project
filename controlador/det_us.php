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
	$query="SELECT u.CodigoUsuario,g.NombreGrupo, u.RutUsuario, u.NombreUsuario, u.Telefono1Usuario, u.Telefono2Usuario, u.EmailUsuario FROM usuario u INNER JOIN grupo g ON u.CodigoGrupo=g.CodigoGrupo WHERE u.CodigoUsuario=".$_GET["u"].";";

	$result=mysql_db_query ($dbname, $query, $link);
	while ($row = mysql_fetch_array ($result))
		{
	  if ($row["CodigoUsuario"]==$_GET["u"])
	  	{
	  	$_SESSION["userdetail"]=$user = array(
	  		"userdetail" => array(
	  							$row["CodigoUsuario"],
	  							$row["NombreGrupo"],
	  							$row["RutUsuario"],
	  							$row["NombreUsuario"],
	  							$row["Telefono1Usuario"],
	  							$row["Telefono2Usuario"],
	  							$row["EmailUsuario"]));
	  		
		
		mysql_close($link);
	  	header("Location:../detalle_usuario.php");
	  	}	
		}
		mysql_free_result($result);
	}
else 
	{
		header("Location:/usuarios.php");
	}
?>