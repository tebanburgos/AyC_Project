<?php
	include('include\conexion.php');
	$tablename="cliente";
	$query="SELECT CodigoCliente, RutCliente, NombreCliente, ApellidoCliente, EmailCliente FROM cliente";
	$result=mysql_db_query ($dbname, $query, $link);
	while ($row = mysql_fetch_array ($result))
	{
	  	echo '<tr class="gradeA">';
	  	echo '<td>'.$row["CodigoCliente"].'</td>';
		echo '<td>'.$row["RutCliente"].'</td>';
		echo '<td>'.$row["NombreCliente"].'</td>';
		echo '<td>'.$row["ApellidoCliente"].'</td>';
		echo '<td>'.$row["EmailCliente"].'</td>';
		echo '<td class ="center"><a href="controlador/det_clt.php?u='.$row["CodigoCliente"].'" class="edit">Detalles</a>';
		if ($_SESSION["userinfo"]["userinfo"][1]<3){
		 echo " | <a href='controlador/ed_clt.php?u=".$row["CodigoCliente"]."' class='edit'>Editar</a>";
	}
		echo '</td>';
		echo '</tr>';
	}
	mysql_close($link);
	mysql_free_result($result);
?>