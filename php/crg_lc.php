<?php
	include('include\conexion.php');
	$tablename="localizacion";
		$query="SELECT CodigoLocalizacion, des_localizacion FROM $tablename ;";
	$result=mysql_db_query ($dbname, $query, $link);
	while ($row = mysql_fetch_array ($result))
	{
	  	echo '<option value="'.$row["CodigoLocalizacion"].'">';	
		echo $row["des_localizacion"];
		echo '</option>';
	}
	mysql_close($link);
	mysql_free_result($result);
?>