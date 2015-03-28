<?php
	include('include\conexion.php');
	$query=	"Select p.CodigoProducto, p.NombreProducto, p.Stock from producto p";
	$result=mysql_db_query ($dbname, $query, $link);
	while ($row = mysql_fetch_array ($result))
	{
		echo '<tr class="gradeA">';
		echo '<td>'.$row["CodigoProducto"].'</td>';
		echo '<td>'.$row["NombreProducto"].'</td>';
		echo '<td><input type="Number" id="cantidad" placeholder="'.$row["Stock"].'" min="0" max="'.$row["Stock"].'" step="1" pattern="\d+" style="width:50px; margin-right:10px";/><input type="button" value="Agregar" onclick="javascript:cantidad();"/></td>';
		echo '</tr>';
	}
	mysql_close($link);
	mysql_free_result($result);
?>