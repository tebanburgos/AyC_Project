<?php
	include('include\conexion.php');
	$query=	"Select v.CodigoVenta, v.FechaEmision, v.Total, vd.NombreVendedor, fp.NombreFormaPago, cl.NombreCliente from venta v inner join vendedor vd on v.CodigoVendedor=vd.CodigoVendedor inner Join formadepago fp on v.CodigoFP=fp.CodigoFP Inner join cliente on v.CodigoCliente=cl.CodigoCliente";
	$result=mysql_db_query ($dbname, $query, $link);
	while ($row = mysql_fetch_array ($result))
	{
		echo '<tr class="gradeA">';
		echo '<td>'.$row["CodigoProducto"].'</td>';
		echo '<td>'.$row["NombreProducto"].'</td>';
		echo '<td>'.$row["NombreMarca"].'</td>';
		echo '<td>'.$row["NombreCategoria"].'</td>';
		echo '<td>'.$row["NombreProveedor"].'</td>';
		echo '<td>'.$row["des_localizacion"].'</td>';
		echo '<td>'.$row["Stock"].'</td>';
		echo '<td class ="center"><a href="controlador/det_vt.php?u='.$row["CodigoProducto"].'" class="edit">Detalles</a>';
		echo '</td>';
		echo '</tr>';
	}
	mysql_close($link);
	mysql_free_result($result);
?>