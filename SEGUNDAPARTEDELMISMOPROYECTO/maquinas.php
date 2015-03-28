<?php include ("conexion.php");?>
	<?php mysql_select_db($baseDatos);?>
	<?php 
		$sql="select * from maquinas where cliente_id=".$_GET['id'];
		$res=mysql_query($sql);
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['nombre'];
		}*/
	?>

Maquinas:
<select name="maquinas" >	
	<?php while ($fila=mysql_fetch_array($res)){ ?>
	<option value="<?php echo $fila['id']?>"><?php echo $fila['nombre']?></option>
<?php }?>
</select>