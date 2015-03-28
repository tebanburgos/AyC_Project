<?php
	include('include\conexion.php');
	$query=	"Select p.CodigoProducto, p.NombreProducto, ct.NombreCategoria, mr.NombreMarca, pv.NombreProveedor, p.Stock, lc.des_localizacion from producto p inner join marca mr on p.CodigoMarca=mr.CodigoMarca inner join categoria ct on mr.CodigoCategoria=ct.CodigoCategoria inner join proveedor pv on p.CodigoProveedor=pv.CodigoProveedor Inner join localizacion lc on lc.CodigoLocalizacion = p.CodigoLocalizacion";
	$result=mysql_db_query ($dbname, $query, $link);
	while ($row = mysql_fetch_array ($result))
	{
		$link2 = "javascript:eliminar('".$row['CodigoProducto']."');";
		echo '<tr class="gradeA">';
		echo '<td>'.$row["CodigoProducto"].'</td>';
		echo '<td>'.$row["NombreProducto"].'</td>';
		echo '<td>'.$row["NombreMarca"].'</td>';
		echo '<td>'.$row["NombreCategoria"].'</td>';
		echo '<td>'.$row["NombreProveedor"].'</td>';
		echo '<td>'.$row["des_localizacion"].'</td>';
		echo '<td>'.$row["Stock"].'</td>';
		if (2==$_SESSION["userinfo"]["userinfo"][1]){
		echo '<td class ="center"><a href="controlador/det_pd.php?u='.$row["CodigoProducto"].'" class="edit">Detalles</a> | ';
		echo '<a href="'; echo $link2; echo '" class="edit">Borrar</a>';
		}

		else {
		echo '<td class ="center"><a href="controlador/det_pd.php?u='.$row["CodigoProducto"].'" class="edit">Detalles</a>';
		}
		echo '</td>';
		echo '</tr>';
	}
	mysql_close($link);
	mysql_free_result($result);
?>