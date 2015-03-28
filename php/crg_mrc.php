<?php
	include('include\conexion.php');
	$tablename="marca";
		$query="SELECT CodigoMarca, NombreMarca FROM $tablename ;";
	$result=mysql_db_query ($dbname, $query, $link);
	while ($row = mysql_fetch_array ($result))
	{
	  	echo '<option value="'.$row["CodigoMarca"].'">';	
		echo $row["NombreMarca"];
		echo '</option>';
	}
	mysql_close($link);
	mysql_free_result($result);
?>