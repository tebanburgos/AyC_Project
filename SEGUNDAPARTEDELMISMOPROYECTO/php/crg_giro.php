<?php include_once('include\conexion.php');?>
	<?php @mysql_select_db($baseDatos);?>
	<?php 
		$sql="select * from giroempresa order by NombreGiroEmpresa asc";
		$res=mysql_query($sql);
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['NombreGiroEmpresa'];
		}*/
?>