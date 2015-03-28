<?php include('include\conexion.php');?>
	<?php @mysql_select_db($baseDatos);?>
	<?php 
		$sql="select * from pais order by NombrePais asc";
		$res=mysql_query($sql);
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['NombrePais'];
		}*/
?>