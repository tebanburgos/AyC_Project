<?php
	include('include\conexion.php');
	$tablename="usuario";
	if ($_SESSION["userinfo"]["userinfo"][1]<2){
		$query="SELECT * FROM $tablename WHERE CodigoGrupo>0;";
	}
	else if ($_SESSION["userinfo"]["userinfo"][1]>1){
		$query="SELECT * FROM $tablename WHERE CodigoGrupo>1;";
	}
	$result=mysql_db_query ($dbname, $query, $link);
	while ($row = mysql_fetch_array ($result))
	{
	  	echo '<tr class="gradeA">';
	  	echo '<td>'.$row["CodigoUsuario"].'</td>';
		echo '<td>'.$row["RutUsuario"].'</td>';
		echo '<td>'.$row["NombreUsuario"].'</td>';
		echo '<td>'.$row["EmailUsuario"].'</td>';
		echo '<td class ="center"><a href="controlador/det_us.php?u='.$row["CodigoUsuario"].'" class="edit">Detalles</a>';
		if ($_SESSION["userinfo"]["userinfo"][1]<3){
		 echo " | <a href='controlador/ed_us.php?u=".$row["CodigoUsuario"]."' class='edit'>Editar</a>";
	}
		echo '</td>';
		echo '</tr>';
	}
	mysql_close($link);
	mysql_free_result($result);
?>