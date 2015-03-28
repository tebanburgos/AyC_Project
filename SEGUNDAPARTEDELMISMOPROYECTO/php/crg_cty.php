<?php
	include('include\conexion.php');
	$tablename="pais";
		$query="SELECT CodigoPais, NombrePais FROM $tablename ;";
	$result=mysql_db_query ($dbname, $query, $link);
	while ($row = mysql_fetch_array ($result))
	{
	  	echo '<option value="'.$row["CodigoPais"].'">';	
		echo $row["NombrePais"];
		echo '</option>';
	}
	mysql_close($link);
	mysql_free_result($result);
?>