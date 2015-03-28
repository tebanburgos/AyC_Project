<?php session_start();
require_once 'conexion.php';
$nivel=$_POST["nivel"];
$rut=$_POST["rut"];
$nombre=$_POST["nombre"];
$pass1=$_POST["pass1"];
$pass2=$_POST["pass2"];
$telefono1=$_POST["telefono1"];
$telefono2=$_POST["telefono2"];
$email = $_POST["email"];

// Validamos las contraseñas
if ($pass1 == $pass2) {
	$_SESSION["passval"]=true;

}
else {
	$_SESSION["passval"]=false;
	header("Location:../agregar_usuario.php");
}

$db = new Conexion();
$db->Conectar();
$db->IngresoUsuario($nivel ,$rut ,$nombre, $pass1 ,$telefono1, $telefono2, $email);

?>