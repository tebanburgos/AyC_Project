<?php session_start();
//Validamos que no se ingrese sin autorizacion
if(!isset($_SESSION["userinfo"])){
header("Location:index.php");
}
else if (isset($_SESSION["userinfo"])){
    if (4==$_SESSION["userinfo"]["userinfo"][1]){
        header("Location:/resumen.php");
    }
}
    include 'include/conexion.php';
    if(isset($_SESSION['carrito'])){
        if(isset($_GET['id'])){
                    $arreglo=$_SESSION['carrito'];
                    $encontro=false;
                    $numero=0;
                    for($i=0;$i<count($arreglo);$i++){
                        if($arreglo[$i]['Id']==$_GET['id']){
                            $encontro=true;
                            $numero=$i;
                        }
                    }
                    if($encontro==true){
                        $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
                        $_SESSION['carrito']=$arreglo;
                    }else{
                        $nombre="";
                        $precio=0;
                        $imagen="";
                        $re=mysql_query("select * from producto where CodigoProducto=".$_GET['id']);
                        while ($f=mysql_fetch_array($re)) {
                            $nombre=$f['NombreProducto'];
                            $precio=$f['ValorVenta'];
                            $Stock=$f['Stock'];
                        }
                        $datosNuevos=array('Id'=>$_GET['id'],
                                        'Nombre'=>$nombre,
                                        'Precio'=>$precio,
                                        'Cantidad'=>1,
                                        'Stock'=>$Stock);

                        array_push($arreglo, $datosNuevos);
                        $_SESSION['carrito']=$arreglo;

                    }
        }




    }else{
        if(isset($_GET['id'])){
            $nombre="";
            $precio=0;
            $imagen="";
            $re=mysql_query("select * from producto where CodigoProducto=".$_GET['id']);
            while ($f=mysql_fetch_array($re)) {
                $nombre=$f['NombreProducto'];
                $precio=$f['ValorVenta'];
                $Stock=$f['Stock'];
            }
            $arreglo[]=array('Id'=>$_GET['id'],
                            'Nombre'=>$nombre,
                            'Precio'=>$precio,
                            'Stock'=>$Stock,
                            'Cantidad'=>1);
            $_SESSION['carrito']=$arreglo;
        }
    }
?>
<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>AyC - Carro</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="css/ie9.css"/>
<![endif]-->

<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="css/ie8.css"/>
<![endif]-->

<!--[if IE 7]>
    <link rel="stylesheet" media="screen" href="css/ie7.css"/>
<![endif]-->
<script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js/custom/general.js"></script>
<script type="text/javascript" src="js/custom/tables.js"></script>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript"  src="../js/scripts.js"></script>
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>

<body class="loggedin">

	<!-- START OF HEADER -->
	<div class="header radius3">
    	<div class="headerinner">
        	
            <a href=""><img src="images/starlight_admin_template_logo_small.png" alt="" /></a>
            
              
            <div class="headright">
                <div class="headercolumn">&nbsp;</div>
                <div id="userPanel" class="headercolumn">
                    <a href="" class="userinfo radius2">
                        <img src="images/avatar.png" alt="" class="radius2" />
                        <span><strong><?php
                        echo $_SESSION["userinfo"]["userinfo"][3];
                        ?></strong></span>
                    </a>
                    <div class="userdrop">
                        <ul>
                            <li><a href="">Perfil</a></li>
                            <li><a href="">Configuracion</a></li>
                            <li><a href="close.php">Salir</a></li>
                        </ul>
                    </div><!--userdrop-->
                </div><!--headercolumn-->
            </div><!--headright-->
        
        </div><!--headerinner-->
	</div><!--header-->
    <!-- END OF HEADER -->
        
    <!-- START OF MAIN CONTENT -->
    <div class="mainwrapper">
     	<div class="mainwrapperinner">
         	
        <div class="mainleft">
          	<div class="mainleftinner">
            
              	<div class="leftmenu">
                    <ul>
                        <li><a href="resumen.php" class="dashboard"><span>Resumen</span></a></li>
                        <li><a href="productos.php" class="widgets menudrop"><span>Productos</span></a>
                            <ul>
                                <li><a href="productos.php"><span>Listado</span></a></li>
                                <?php
                                if (2==$_SESSION["userinfo"]["userinfo"][1] OR 3==$_SESSION["userinfo"]["userinfo"][1]){
                                echo '<li><a href="agr_prod.php"><span>Entrada Producto</span></a></li>';
                                echo '<li><a href="new_prod.php"><span>Nuevo Producto</span></a></li>';
                                }?>
                            </ul>
                        </li>
                        <?php
                        if (3==$_SESSION["userinfo"]["userinfo"][1]){
                            echo '<li><a href="usuarios.php" class="elements"><span>Usuarios</span></a></li>';
                        } 
                        else if (2==$_SESSION["userinfo"]["userinfo"][1] OR 3==$_SESSION["userinfo"]["userinfo"][1]){
                            echo '<li><a href="usuarios.php" class="users menudrop"><span>Usuarios</span></a>
                            <ul>
                                <li><a href="usuarios.php"><span>Listado</span></a></li>
                                <li><a href="agregar_usuario.php"><span>Agregar usuario</span></a></li>
                            </ul>
                            </li>';
                        }
                        ?>                        
                            <li><a href="clientes.php" class="contacts menudrop"><span>Clientes</span></a>
                            <ul>
                                <li><a href="clientes.php"><span>Listado</span></a></li>
                                <?php
                                if (2==$_SESSION["userinfo"]["userinfo"][1]){
                                echo '<li><a href="agregar_clientes.php"><span>Agregar</span></a></li>';
                                }?>
                            </ul>
                        </li>
                        <li class="current"><a href="ventas.php" class="editor"><span>Ventas</span></a>
                        <?php
                        if (!(4==$_SESSION["userinfo"]["userinfo"][1])){
                            echo '
                            <ul>
                                <li><a href="ventas.php"><span>Listado</span></a></li>
                                <li><a href="new_venta.php"><span>Nueva Venta</span></a></li>
                            </ul>';
                        }?>
                        </li>
                        <li><a href="marcas.php" class="elements"><span>Marcas</span></a></li>
                    </ul>
                        
                </div><!--leftmenu-->
            	<div id="togglemenuleft"><a></a></div>
            </div><!--mainleftinner-->
        </div><!--mainleft-->
        
        <div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu multipletabmenu">
                    <li><a href="ventas.php">Listado ventas</a></li>
                    <li><a href="registrar_venta.php">Catalogo</a></li>
                    <li class="current"><a href="carro.php">Carro ventas</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                
                    <div class="contenttitle radiusbottom0">
                    <h2 class="table"><span>Carro productos</span></h2>
                </div><!--contenttitle-->
 
                    <?php
            $total=0;
            if(isset($_SESSION['carrito'])){
            $datos=$_SESSION['carrito'];
            
            $total=0;
            for($i=0;$i<count($datos);$i++){
                
    ?>
                <div class="producto">
                    <center>
                        <label><?php echo $datos[$i]['Nombre'];?></label>
                        <span>Precio: <?php echo $datos[$i]['Precio'];?></span>
                        <span>Cantidad: 
                            <input type="Number" value="<?php echo $datos[$i]['Cantidad'];?>" min="1" max="<?php echo $datos[$i]['Stock'];?>" pattern="\d+"
                            data-precio="<?php echo $datos[$i]['Precio'];?>"
                            data-id="<?php echo $datos[$i]['Id'];?>"
                            class="cantidad">
                        </span>
                        <span class="subtotal">Subtotal:<?php echo $datos[$i]['Cantidad']*$datos[$i]['Precio'];?></span>
                        <a href="#" class="eliminar" data-id="<?php echo $datos[$i]['Id']?>">Eliminar</a>
                    </center>
                </div>
            <?php
                $total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total;
            }
                
            }else{
                echo '<center><h2>No has añadido ningun producto</h2></center><br>';
            }
            echo '<br><br><center><h2 id="total">Total: '.$total.'</h2></center><br>';
            if($total!=0){
                    //echo '<center><a href="./compras/compras.php" class="aceptar">Comprar</a></center>';
            ?>
                <form action="controlador/ctr_carro.php" method="post" id="formulario">
                <input type="hidden" name="total" value="<?php echo count($datos); ?>">
                <input type="hidden" name="monto" value="<?php echo $total; ?>">
                    
                    <?php 
                        for($i=0;$i<count($datos);$i++){
                    ?>
                        <input type="hidden" name="item_name_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Id'];?>" required="required">
                        <input type="hidden" name="amount_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Precio'];?>">
                        <input  type="hidden" name="quantity_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Cantidad'];?>">  
                    <?php 
                        }
                    ?>
                        

                    <center><input type="submit" value="comprar" class="aceptar" style="width:200px"></center>
            </form>
            <?php
            }
            
        ?>
        <center><a href="../registrar_venta.php"><button>Añadir mas</button></a></center>

        
                    
                    <br /><br />
                    
                </div><!--content-->
                
            </div><!--maincontentinner-->
                    
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
            <div class="footer">
            	
            </div><!--footer-->
            
        </div><!--maincontent-->
                        
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
    

</body>
</html>
