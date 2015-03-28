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
<title>Descartar producto</title>
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
<script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/custom/general.js"></script>
<script type="text/javascript" src="js/custom/form.js"></script>
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
                            <li class="current"><a href="clientes.php" class="contacts menudrop"><span>Clientes</span></a>
                            <ul>
                                <li><a href="clientes.php"><span>Listado</span></a></li>
                                <?php
                                if (2==$_SESSION["userinfo"]["userinfo"][1]){
                                echo '<li><a href="agregar_clientes.php"><span>Agregar</span></a></li>';
                                }?>
                            </ul>
                        </li>
                        <li><a href="ventas.php" class="editor"><span>Ventas</span></a>
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
                    <li class="current"><a href="#">Borrar producto</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                
                    <div class="contenttitle">
                    	<h2 class="form"><span>Descartar elemento</span></h2>
                    </div><!--contenttitle-->
                    
                    <br/>
                    
                    <form class="stdform" action="" method="post">

                    	<p>
                    	<label>Está seguro de queres descartar el producto</label>
                    	</p>
                    	                        
                        <p>
                        	<label>Codigo</label>
                            <span class="field"><input type="text" name="Codigo" id="Codigo" class="smallinput"  disaabled="disabled"/></span>
                        </p>
                                                
                        <p>
                        	<label>Nombre</label>
                            <span class="field"><input type="text" name="Nombre" id="Nombre" class="smallinput"  disabled="disabled"/></span> 
                        </p>

                        <br clear="all" /><br />
                        
                        <p class="stdformbutton">
                        	<button class="submit radius2">SI</button>
                            <input type="reset" class="reset radius2" value="NO" />
                        </p>
                        
                        
                    </form>
                    
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
