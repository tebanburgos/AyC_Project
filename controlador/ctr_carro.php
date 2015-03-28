<?php session_start();
$cantidad=$_POST["total"];
$arreglo[]=array('Id'=>$_POST['item_name_1'],
                'subvalor'=>$_POST['amount_1'],
                'Cantidad'=>$_POST['quantity_1']);
for ($i=2;$i<=$cantidad;$i++){
$datosNuevos=array('Id'=>$_POST['item_name_'.$i],
                'subvalor'=>$_POST['amount_'.$i],
                'Cantidad'=>$_POST['quantity_'.$i]);
array_push($arreglo, $datosNuevos);
}

$_SESSION["venta"]=$arreglo;
$_SESSION["monto"]=$_POST["monto"];
$_SESSION["cantidad"]=$cantidad;
header("Location: ../orden.php");

?>