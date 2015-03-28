<?php include('include\conexion.php');?>
	<?php @mysql_select_db($baseDatos);?>
	<?php 
		$sql="select * from ciudad where CodigoPais=".$_GET['id']." order by NombreCiudad asc;";
		$res=mysql_query($sql);
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['nombre'];
		}*/
	?>


<select name="ciudades" >	
	<?php while ($fila=mysql_fetch_array($res)){ ?>
	<option value="<?php echo $fila['CodigoCiudad']?>"><?php echo $fila['NombreCiudad']?></option>
<?php }?>
</select>