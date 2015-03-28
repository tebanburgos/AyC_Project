<?php
	include('include\conexion.php');
	$tablename="ciudad";
		$query="SELECT CodigoCiudad, NombreCiudad FROM $tablename ;";
	$result=mysql_db_query ($dbname, $query, $link);
	while ($row = mysql_fetch_array ($result))
	{
	  	echo '<option value="'.$row["CodigoCiudad"].'">';	
		echo $row["NombreCiudad"];
		echo '</option>';
	}
	mysql_close($link);
	mysql_free_result($result);
?>