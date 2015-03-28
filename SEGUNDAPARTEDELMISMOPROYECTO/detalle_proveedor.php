<?php session_start();
if(!isset($_SESSION["userinfo"])){
header("Location:index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Detalle proveedor</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="css/ie9.css"/>
<![endif]-->

<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="css/ie8.css"/>
<![endif]-->
<script type="text/javascript">
function desactivar() {
document.getElementById("nivuser").disabled = false;
}
</script>
<!--[if IE 7]>
    <link rel="stylesheet" media="screen" href="css/ie7.css"/>
<![endif]-->
<script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.flot.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js/custom/general.js"></script>
<script type="text/javascript" src="js/custom/dashboard.js"></script>
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
                                echo '<li><a href="scanner.php"><span>Scanner</span></a></li>';
                                ?>
                            </ul>
                        </li>
                        <li><a href="inventario.php" class="tables"><span>Inventario</span></a></li>
                        <?php
                        if (3==$_SESSION["userinfo"]["userinfo"][1]){
                            echo '<li><a href="usuarios.php" class="elements"><span>Usuarios</span></a></li>';
                        } 
                        else if (1==$_SESSION["userinfo"]["userinfo"][1] OR 2==$_SESSION["userinfo"]["userinfo"][1]){
                            echo '<li><a href="usuarios.php" class="elements menudrop"><span>Usuarios</span></a>
                            <ul>
                                <li><a href="usuarios.php"><span>Listado</span></a></li>
                                <li><a href="agregar_usuario.php"><span>Agregar usuario</span></a></li>
                            </ul>
                            </li>';
                        }
                        ?>
                        
                            <?php
                        if (3==$_SESSION["userinfo"]["userinfo"][1]){
                            echo '<li><a href="proveedores.php" class="elements"><span>Proveedores</span></a></li>';
                        } 
                        else if (1==$_SESSION["userinfo"]["userinfo"][1] OR 2==$_SESSION["userinfo"]["userinfo"][1]){
                            echo '<li><a href="proveedores.php" class="contacts menudrop"><span>Proveedores</span></a>
                            <ul>
                                <li><a href="Proveedores.php"><span>Listado</span></a></li>
                                <li><a href="agregar_proveedores.php"><span>Agregar proveedor</span></a></li>
                            </ul>
                            </li>';
                        }
                        ?>
                        
                        <li><a href="clientes.php" class="charts menudrop"><span>Clientes</span></a>
                            <ul>
                                <li><a href="clientes.html"><span>Listado</span></a></li>
                                <li><a href="agregar_clientes.html"><span>Agregar</span></a></li>
                            </ul>
                        </li>
                        <li><a href="facturas.html" class="media"><span>Facturas</span></a></li>
                        <li><a href="ventas.html" class="editor menudrop"><span>Ventas</span></a>
                        	<ul>
                            	<li><a href="ventas.html"><span>Listado</span></a></li>
                            	<li><a href="registrar_venta.html"><span>Registrar</span></a></li>
                            </ul>
                        </li>
                    </ul>
                        
                </div><!--leftmenu-->
            	<div id="togglemenuleft"><a></a></div>
            </div><!--mainleftinner-->
        </div><!--mainleft-->
        
        <div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="#">Detalle proveedor</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                	
                    <div class="contenttitle">
                    	<h2 class="chart"><span>Datos del proveedor</span></h2>
                    </div><!--contenttitle-->
                    <br />
                    <form class="stdform" action="proveedores.php" method="">
                        
                        <p>
                            <label>Codigo</label>
                            <span class="field"><input type="text" name="codprovd" class="smallinput" disabled value="<?php echo  $_SESSION['userdetail']['userdetail'][0] ?>"/></span>
                        </p>
                        
                        <p>
                            <label>Nombre</label>
                            <span class="field"><input type="text" name="nameprovd" class="smallinput" disabled value="<?php echo  $_SESSION['userdetail']['userdetail'][1] ?>"/></span>
                        </p>
                                                
                        <p>
                            <label>Razón social</label>
                            <span class="field"><input type="text" name="razonsocial" class="smallinput" disabled value="<?php echo  $_SESSION['userdetail']['userdetail'][2] ?>"/></span> 
                        </p>

                        <p>
                            <label>Rut</label>
                            <span class="field"><input type="text" name="rutprovd" class="smallinput" disabled value="<?php echo  $_SESSION['userdetail']['userdetail'][3] ?>"/></span> 
                        </p>

                        <p>
                            <label>País</label>
                            <span class="field"><input type="text" name="pais" class="smallinput" disabled value="<?php echo  $_SESSION['userdetail']['userdetail'][4] ?>"/></span> 
                        </p>

                        <p>
                            <label>Ciudad</label>
                            <span class="field"><input type="text" name="ciudad" class="smallinput" disabled value="<?php echo  $_SESSION['userdetail']['userdetail'][5] ?>"/></span> 
                        </p>
                                  
                        <p>
                            <label>Giro</label>
                            <span class="field"><input type="text" name="giro" class="smallinput" disabled value="<?php echo  $_SESSION['userdetail']['userdetail'][6] ?>"/></span> 
                        </p>
                        
                        <p>
                            <label>Teléfono 1</label>
                            <span class="field"><input type="text" name="fono1provd" class="smallinput" disabled value="<?php echo  $_SESSION['userdetail']['userdetail'][7] ?>"/></span> 
                        </p>
                        
                        <p>
                            <label>Teléfono 2</label>
                            <span class="field"><input type="text" name="fono2provd" class="smallinput" disabled value="<?php echo  $_SESSION['userdetail']['userdetail'][8] ?>"/></span> 
                        </p>
                        
                        <p>
                            <label>Email</label>
                            <span class="field"><input type="text" name="emailprovd" class="smallinput" disabled value="<?php echo  $_SESSION['userdetail']['userdetail'][9] ?>"/></span> 
                        </p>
                        
                        <p>
                            <label>Nombre de contacto</label>
                            <span class="field"><input type="text" name="contactoprodv" class="smallinput" disabled value="<?php echo  $_SESSION['userdetail']['userdetail'][10] ?>"/></span> 
                        </p>
                        
                        <p class="stdformbutton">
                            <input type="submit" class="submit radius2" value="Volver" />
                        </p>
                        
                        
                    </form>
                    
                <br>
                                  
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
            <div class="footer">
                AyC soluciones informaticas, 2014.
            </div><!--footer-->
            
        </div><!--maincontent-->
                
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
    

</body>
</html>
