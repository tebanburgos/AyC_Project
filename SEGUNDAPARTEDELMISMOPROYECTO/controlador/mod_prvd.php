<?php session_start();
require_once 'conexion.php';
$nombreprovd=$_POST["nombreprovd"];
$razonsocial=$_POST["razonsocial"];
$rut=$_POST["rut"];
$pais=$_POST["pais"];
$ciudades=$_POST["ciudades"];
$giro=$_POST["giro"];
$telefono1provd=$_POST["telefono1provd"];
$telefono2provd=$_POST["telefono2provd"];
$emailprovd = $_POST["emailprovd"];
$contactoprovd = $_POST["contactoprovd"];
$codprovd = $_POST["codprovd"];


$db = new Conexion();
$db->Conectar();
$db->ModificarProveedor($ciudades, $giro, $nombreprovd ,$razonsocial, $rut, $telefono1provd, $telefono2provd, $emailprovd, $contactoprovd, $codprovd);
echo"<script type=\"text/javascript\">alert('Los datos del proveedor ".$codprovd." fueron modificados'); window.location='../proveedores.php';</script>";  

?>
