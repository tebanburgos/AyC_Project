<?php
@session_start();
$link=mysql_connect("localhost", "root", "");
mysql_set_charset('utf8');
$dbname="ayc_proyecto3";
mysql_select_db($dbname, $link) OR DIE ("Error: No es posible establecer la conexión");

 class Conexion{
	private $conexion;
	private $total_consultas;
	
	public function Conectar(){
		$this->conexion=(mysql_connect("localhost","root","")) or die (mysql_error());
			mysql_select_db("ayc_proyecto3",$this->conexion) or die(mysql_error());
	}
	
	public function IngresoUsuario($grupo, $rut, $nombre, $pass, $fono1, $fono2, $email){
		$sql="INSERT INTO usuario (CodigoUsuario, CodigoGrupo, RutUsuario, NombreUsuario, Contrasena, Telefono1Usuario, Telefono2Usuario, EmailUsuario) VALUES (NULL, ".$grupo.",'".$rut."', '".$nombre."', '".md5($pass)."', ".$fono1.", ".$fono2.", '".$email."');";
		if(!mysql_query($sql))
		echo 'MySQL Error: '.mysql_error();	
	}
	
	public function IngresoProveedor($ciudad, $giro, $nombre, $razonsocial, $rut, $fono1, $fono2, $email, $contacto){
		$sql="INSERT INTO proveedor (CodigoProveedor, CodigoCiudad, CodigoGiroEmpresa, NombreProveedor, Razonsocial, RutProveedor, Telefono1Proveedor, Telefono2Proveedor, EmailProveedor, Nombredecontacto) VALUES (NULL, ".$ciudad.", ".$giro.", '".$nombre."', '".$razonsocial."', '".$rut."', ".$fono1.", ".$fono2.", '".$email."', '".$contacto."');";
		if(!mysql_query($sql))
		echo 'MySQL Error: '.mysql_error();	
	}
	
	public function ModificarProveedor($ciudad, $giro, $nombre, $razonsocial, $rut, $fono1, $fono2, $email, $contacto, $codigo){
		$sql="UPDATE proveedor SET CodigoCiudad='".$ciudad."', CodigoGiroEmpresa='".$giro."', NombreProveedor='".$nombre."', Razonsocial='".$razonsocial."', RutProveedor='".$rut."', Telefono1Proveedor='".$fono1."', Telefono2Proveedor='".$fono2."', EmailProveedor='".$email."', Nombredecontacto='".$contacto."' WHERE CodigoProveedor = '".$codigo."'";
		if(!mysql_query($sql))
		echo 'MySQL Error: '.mysql_error();	
	}
	
 }

?>
