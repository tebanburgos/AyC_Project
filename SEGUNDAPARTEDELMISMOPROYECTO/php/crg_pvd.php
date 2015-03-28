<?php
	include('include\conexion.php');
	$tablename="proveedor";
		$query="SELECT CodigoProveedor, NombreProveedor FROM $tablename ;";
	$result=mysql_db_query ($dbname, $query, $link);
	while ($row = mysql_fetch_array ($result))
	{
	  	echo '<option value="'.$row["CodigoProveedor"].'">';	
		echo $row["NombreProveedor"];
		echo '</option>\n';
	}
	mysql_close($link);
	mysql_free_result($result);
?>