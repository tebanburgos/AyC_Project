<?php
	include('include\conexion.php');
	$tablename="formadepago";
		$query="SELECT CodigoFP, NombreFP FROM $tablename ;";
	$result=mysql_db_query ($dbname, $query, $link);
	while ($row = mysql_fetch_array ($result))
	{
	  	echo '<option value="'.$row["CodigoFP"].'">';	
		echo $row["NombreFP"];
		echo '</option>';
	}
	mysql_close($link);
	mysql_free_result($result);
?>