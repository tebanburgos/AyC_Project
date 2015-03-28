<?php session_start();
unset($_SESSION["error"]);
	include('..\include\conexion.php');
	$tablename="usuario";
	$fnd=true;
	$query="SELECT * FROM $tablename;";
	$result=mysql_db_query ($dbname, $query, $link);
	while ($row = mysql_fetch_array ($result))
	{
	  if ($row["RutUsuario"]==$_POST["username"] AND 
	  	$row["Contrasena"]==md5($_POST["password"]))
	  	{
	  	$_SESSION["userinfo"]=$user = array(
	  		"userinfo" => array($row["CodigoUsuario"],
	  							$row["CodigoGrupo"],
	  							$row["RutUsuario"],
	  							$row["NombreUsuario"],
	  							$row["Telefono1Usuario"],
	  							$row["EmailUsuario"])
	  		);
		$fnd=false;
		mysql_close($link);
	  	header("Location:../resumen.php");
	  	}	
	}
	if ($fnd) {
	  	$_SESSION["error"]="asda";
	  	header("Location: ../index.php");
	  }	
	mysql_free_result($result);
	mysql_close($link);
	?>

