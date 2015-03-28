<?php
	include('include\conexion.php');
	$query=	"SELECT proveedor.CodigoProveedor, proveedor.CodigoCiudad, proveedor.NombreProveedor, proveedor.RutProveedor, proveedor.Telefono1Proveedor, ciudad.CodigoCiudad, ciudad.CodigoPais, ciudad.NombreCiudad, pais.CodigoPais, pais.NombrePais FROM proveedor INNER JOIN ciudad ON proveedor.CodigoCiudad = ciudad.CodigoCiudad INNER JOIN pais ON ciudad.CodigoPais = pais.CodigoPais;";
	$result=mysql_db_query ($dbname, $query, $link);
	while ($row = mysql_fetch_array ($result))
	{
	  	echo '<tr class="gradeA">';
	  	echo '<td>'.$row["CodigoProveedor"].'</td>';
		echo '<td>'.$row["NombreProveedor"].'</td>';
		echo '<td>'.$row["RutProveedor"].'</td>';
		echo '<td>'.$row["NombrePais"].'</td>';
		echo '<td>'.$row["NombreCiudad"].'</td>';
		echo '<td>'.$row["Telefono1Proveedor"].'</td>';
		echo '<td class ="center"><a href="controlador/det_prvd.php?u='.$row["CodigoProveedor"].'" class="edit">Detalles</a>';
		if ($_SESSION["userinfo"]["userinfo"][1]<3){
		 echo " | <a href='controlador/ed_prvd.php?u=".$row["CodigoProveedor"]."' class='edit'>Editar</a>";
	}
		echo '</td>';
		echo '</tr>';
	}
	mysql_close($link);
	mysql_free_result($result);
?>