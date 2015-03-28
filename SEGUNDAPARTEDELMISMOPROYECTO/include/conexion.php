<?php
@session_start();
$link=mysql_connect("localhost", "root", "");
mysql_set_charset('utf8');
$dbname="ayc_proyecto3";
mysql_select_db($dbname, $link) OR DIE ("Error: No es posible establecer la conexión");

function conectar()
{
	mysql_connect("localhost", "root", "");
	mysql_select_db("ayc_proyecto3");
}

function desconectar()
{
	mysql_close();
}


 class Conexion{
	private $conexion;
	private $total_consultas;
	
	public function Conectar(){
		$this->conexion=(mysql_connect("localhost","root","")) or die (mysql_error());
			mysql_select_db("ayc_proyecto3",$this->conexion) or die(mysql_error());
	}
	
	
	public function IngresoUsuario($grupo, $rut, $nombre, $pass, $fono1, $fono2, $email){
		$sql="INSERT INTO usuarios (CodigoUsuario, CodigoGrupo, RutUsuario, NombreUsuario, Contrasena, Telefono1Usuario, Telefono2Usuario, EmailUsuario) VALUES (NULL, ".$grupo.",'".$rut."', '".$nombre."', '".md5($pass)."', ".$fono1.", ".$fono2.", '".$email."');";
		if(!mysql_query($sql))
		echo 'MySQL Error: '.mysql_error();	
	}
 }

?>
