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
<title>Productos</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="css/ie9.css"/>
<![endif]-->

<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="css/ie8.css"/>
<![endif]-->

<script language="javascript">
function mensaje(){
alert("Se ha actualizado el producto");
}
function mensaje_new(){
alert("Se agregado el producto");
}
function eliminar(codigo){ 
             
            alert('Usted esta solicitando eliminar un producto'); 
                if (confirm('¿Desea eliminar el producto seleccionado?')) 
                    {} 
            }  
</script>

<!--[if IE 7]>
    <link rel="stylesheet" media="screen" href="css/ie7.css"/>
<![endif]-->
<script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js/custom/general.js"></script>
<script type="text/javascript" src="js/custom/tables.js"></script>

<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>
<?php
if (isset($_SESSION["alert_agr"])){
    if ($_SESSION["alert_agr"]){ ?>
    <script language="javascript"> 
        mensaje(); 
    </script> 
<?php
    $_SESSION["alert_agr"]=false;       
    }
}

if (isset($_SESSION["alert_new"])){
    if ($_SESSION["alert_new"]){ ?>
    <script language="javascript"> 
        mensaje_new(); 
    </script> 
<?php
    $_SESSION["alert_new"]=false;       
    }
}
?>
<body class="loggedin">

	<!-- START OF HEADER -->
    <div class="header radius3">
        <div class="headerinner">
            
            <a href="resumen.php"><img src="images/starlight_admin_template_logo_small.png" alt="" /></a>
            
              
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
                        <li class="current"><a href="productos.php" class="widgets menudrop"><span>Productos</span></a>
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
                        <li><a href="#" class="elements"><span>Marcas</span></a></li>
                    </ul>
                        
                </div><!--leftmenu-->
            	<div id="togglemenuleft"><a></a></div>
            </div><!--mainleftinner-->
        </div><!--mainleft-->
        
        <div class="maincontent noright">
        	   <div class="maincontentinner">
            	
                <ul class="maintabmenu multipletabmenu">
                    <li class="current"><a href="productos.php">Productos</a></li>
                    <li><a href="agr_prod.php">Entrada Producto</a></li>
                    <li><a href="new_prod.php">Nuevo Producto</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                <div class="contenttitle radiusbottom0">
                	<h2 class="table"><span>Listado Productos</span></h2>
                </div><!--contenttitle-->
                <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable">
                    <colgroup>
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0">Codigo</th>
                            <th class="head1">Nombre</th>
                            <th class="head0">Marca</th>
                            <th class="head1">Categoria</th>
                            <th class="head0">Proveedor</th>
                            <th class="head1">Localizacion</th>
                            <th class="head0">Stock</th>
                            <th class="head1">Accion</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="head0">Codigo</th>
                            <th class="head1">Nombre</th>
                            <th class="head0">Marca</th>
                            <th class="head1">Categoria</th>
                            <th class="head0">Proveedor</th>
                            <th class="head1">Localizacion</th>
                            <th class="head0">Stock</th>
                            <th class="head1">Accion</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            include("php/tb_prod.php");
                        ?>
                    </tbody>
                </table>
                
                <br clear="all" />
                    
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
