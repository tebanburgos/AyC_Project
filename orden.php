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
if (!isset($_SESSION["venta"])){
    header("Location:carro.php");
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
<script type="text/javascript" src="js/custom/form.js"></script>
<script type="text/javascript"  src="js/orden.js"></script>
<script type="text/javascript" src="js/plugins/jquery.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui.min.js"></script>
<script >
    //funcion que limpia los demas campos
    function LimpiarInput(destino,destino2)
    {
        destino.value="";   
    }
    //funcion que llena los datos 
    function LlenarDatos(text,arrastre)
    {
        var datos = text.split('|'); //dividimos los datos para colocarlos en el lugar correcto     
        if (1 == datos[0]) {
            arrastre.disabled = false;
            
        }
        else if (0== datos[0]){
            arrastre.disabled = false;
            alert("Rut no registrado");
            arrastre.value="";
            arrastre.focus();
            
        }
    }   
    //fucion con la cual obtenemos  los datos 
    function obten_datos(arrastre)
    {   
        //alert("arrastre: "+arrastre+" destino: "+destino+" destino2: "+destino2+" destino3: "+destino3+" destino4: "+destino4+" destino5: "+destino5);
        if(arrastre.value != 0)
        {
            arrastre.disabled = true;

            $.ajax({
                type: 'get',
                dataType: 'text',
                url: 'ajax_bd/con_clien.php',
                data: {codigo: arrastre.value},
                success: function(text){
                    LlenarDatos(text,arrastre);
                }
            });     
        }
    }
</script>
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
                                <li><a href="new_venta.php"><span>Catalogo</span></a></li>
                                <li><a href="carro.php"><span>Carro ventas</span></a></li>
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
                    <li><a href="carro.php">Carro ventas</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                
                    <div class="contenttitle radiusbottom0">
                    <h2 class="table"><span>Medio de pago</span></h2>
                </div><!--contenttitle-->
                    <form class="stdform" action="controlador/new_vt.php" method="post" id="agrprod">
                        <p>
                        <label>Cantidad de productos: </label>
                        <span class="field">
                        <input type="text" name="cantidad" disabled="disabled" class="smallinput" value="<?php echo $_SESSION['cantidad'];?>" />
                        </span>
                        </p>
                        <p>
                        <label>Total a pagar: </label>
                        <span class="field">
                        <input type="text" name="monto" disabled="disabled" class="smallinput" value="<?php echo $_SESSION['monto'];?>"/>
                        </span>
                        </p>
                        <p>
                        <label>Rut del cliente:</label>
                        <span class="field">
                        <input type="text" name="cliente" id="cliente" class="smallinput" required="required" autofocus="autofocus" onblur="javascipt:obten_datos(this);"/>
                        </span>
                        </p>
                        <p>
                            <label>Medio de pago</label>
                            <span class="field">
                            <select name="FP" id="FP" required="required">
                            <option value="">Seleccione un Medio de pago</option>
                            <?php
                                include("php/crg_fp.php");
                            ?>
                            </select>
                            </span>                        
                        </p>
                        <p class="stdformbutton">
                            <input type="submit" id="procesar" class="submit radius2" value="Continuar"/>
                            <input type="reset" class="reset radius2" value="Limpiar" />
                        </p>
                    </form>
                    

        
                    
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
