<?php session_start();
//Validamos que no se ingrese sin autorizacion
if(!isset($_SESSION["userinfo"])){
header("Location:index.php");
}
else if (isset($_SESSION["userinfo"])){
    if (2<$_SESSION["userinfo"]["userinfo"][1]){
        header("Location:/resumen.php");
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Agregar cliente</title>
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
<script type="text/javascript" src="js/plugins/jquery.Rut.js"></script>
<script type="text/javascript" src="js/plugins/jquery.Rut.min.js"></script>
<script type="text/javascript" src="js/custom/general.js"></script>
<script type="text/javascript" src="js/custom/form.js"></script>
<script type="text/javascript" src="js/custom/validarrut.js"></script>
<script type="text/javascript" src="js/custom/compararpassword.js"></script>

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
                                <li><a href="scanner.php"><span>Scanner</span></a></li>
                            </ul>
                        </li>
                        <li><a href="inventario.php" class="tables"><span>Inventario</span></a></li>
                        <li class="current"><a href="usuarios.php" class="elements menudrop"><span>Usuarios</span></a>
                            <ul>
                                <li><a href="usuarios.php"><span>Listado</span></a></li>
                                <li><a href="agregar_usuario.php"><span>Agregar</span></a></li>
                            </ul>
                        </li>
                        <li><a href="clientes.php" class="charts menudrop"><span>Clientes</span></a>
                            <ul>
                                <li><a href="clientes.php"><span>Listado</span></a></li>
                                <li><a href="agregar_clientes.php"><span>Agregar</span></a></li>
                            </ul>
                        </li>
                        <li><a href="media.php" class="media"><span>Facturas</span></a></li>
                        <li><a href="form.php" class="editor menudrop"><span>Ventas</span></a></li>
                    </ul>
                        
                </div><!--leftmenu-->
            	<div id="togglemenuleft"><a></a></div>
            </div><!--mainleftinner-->
        </div><!--mainleft-->
        
        <div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu multipletabmenu">
                    <li><a href="usuarios.php">Usuarios</a></li>
                    <li class="current"><a href="agregar_usuario.php">Agregar</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                
                    <div class="contenttitle">
                    	<h2 class="form"><span>Agregar usuario</span></h2>
                    </div><!--contenttitle-->
                    
                    <br/>
                    
                    <form class="stdform" action="controlador/agr_us.php" method="post" name="form1">
                    	
                        <p>
                            <label>Nivel</label>
                            <span class="field">
                            <select name="nivel">
                                <option value="1">Administrador</option>
                                <option value="2">Supervisor</option>
                                <option value="3">Trabajador</option>
                            </select>
                            </span>
                        </p>
                        
                        <p>
                        	<label>Rut</label>
                         
                          
                            <span class="field"><input type="text" name="rut" id="rut" class="smallinput" required="required"onblur="return Rut(form1.rut.value)"  /> </span>
                        </p>
                                                
                        <p>
                        	<label>Nombre</label>
                            <span class="field"><input type="text" name="nombre" class="smallinput"  required="required"/></span> 
                        </p>
 
                        <p>
                            <label>Contraseña</label>
                            <span class="field"><input type="password" name="pass1" id="pass1" class="smallinput"  required="required"/></span> 
                        </p>
                                  
                        <p>
                            <label>Repetir contraseña</label>
                            <span class="field"><input type="password" name="pass2" id="pass2" class="smallinput" required="required" onblur="return compara()" /></span> 
                        </p>

                        <p>
                            <label>Telefono 1</label>
                            <span class="field"><input type="text" name="telefono1" class="smallinput" required="required" /></span> 
                        </p>
                        
                        <p>
                            <label>Telefono 2</label>
                            <span class="field"><input type="text" name="telefono2" class="smallinput" required="required" /></span> 
                        </p>

                        <p>
                            <label>Email</label>
                            <span class="field"><input type="email" name="email" class="smallinput" required="required" /></span> 
                        </p>

                        <br clear="all" /><br />
                        
                        <p class="stdformbutton">
                        	<button class="submit radius2" onclick="return validacampos()" >Agregar</button>
                            <input type="reset" class="reset radius2" value="Limpiar" />
                        </p>
                        
                        
                    </form>
                    
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
