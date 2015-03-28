<?php
	include('include\conexion.php');
	$tablename="categoria";
		$query="SELECT CodigoCategoria, NombreCategoria FROM $tablename ;";
	$result=mysql_db_query ($dbname, $query, $link);
	while ($row = mysql_fetch_array ($result))
	{
	  	echo '<option value="'.$row["CodigoCategoria"].'">';	
		echo $row["NombreCategoria"];
		echo '</option>';
	}
	mysql_close($link);
	mysql_free_result($result);
?>