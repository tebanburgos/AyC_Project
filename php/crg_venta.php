<?php
	include('include\conexion.php');
	$query=	"Select v.CodigoVenta, cv.NombreVendedor, p.NombreFP, cl.RutCliente, v.FechaEmision, v.Total from venta v inner join vendedor cv on v.CodigoVendedor=cv.CodigoVendedor inner join formadepago p on v.CodigoFP=p.CodigoFP inner join cliente cl on cl.CodigoCliente=v.CodigoCliente;";
	$result=mysql_db_query ($dbname, $query, $link);
	while ($row = mysql_fetch_array ($result))
	{		
		echo '<td>'.$row["CodigoVenta"].'</td>';
		echo '<td>'.$row["NombreVendedor"].'</td>';
		echo '<td>'.$row["NombreFP"].'</td>';
		echo '<td>'.$row["RutCliente"].'</td>';
		echo '<td>'.$row["FechaEmision"].'</td>';
		echo '<td>'.$row["Total"].'</td>';
		echo '<td class ="center"><a href="controlador/det_vt.php?u='.$row["CodigoVenta"].'" class="edit">Detalles</a></td>';
		echo '</tr>';
	}
	mysql_close($link);
	mysql_free_result($result);
?>