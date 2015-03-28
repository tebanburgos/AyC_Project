<?php session_start();
//Validamos que no se ingrese sin autorizacion
if(!isset($_SESSION["userinfo"])){
header("Location:index.php");
}
//else if (isset($_SESSION["userinfo"])){
//    if (3<$_SESSION["userinfo"]["userinfo"][1]){
//        header("Location:/resumen.php");
//    }
//}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Nuevo Producto</title>
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
<script type="text/javascript" src="js/plugins/jquery.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
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
            alert("El producto ya existe");
            arrastre.disabled = false;
            $("input[id='nombre']").attr('disabled','disabled');
            $("select[id='marca']").attr('disabled','disabled');
            $("select[id='proveedor']").attr('disabled','disabled');
            $("select[id='localizacion']").attr('disabled','disabled');
            $("input[id='valorC']").attr('disabled','disabled');
            $("input[id='valorV']").attr('disabled','disabled');
            $("input[id='cantidadIng']").attr('disabled','disabled');
            
        }
        else if (0== datos[0]){
            arrastre.disabled = false;
            $("input[id='nombre']").removeAttr('disabled');
            $("select[id='marca']").removeAttr('disabled');
            $("select[id='proveedor']").removeAttr('disabled');
            $("select[id='localizacion']").removeAttr('disabled');
            $("input[id='valorC']").removeAttr('disabled');
            $("input[id='valorV']").removeAttr('disabled');
            $("input[id='cantidadIng']").removeAttr('disabled');
            $("input[id='nombre']").focus();
            $('input[type="submit"]').removeAttr('disabled');
        }
    }   
    //fucion con la cual obtenemos  los datos 
    function obten_datos(arrastre)
    {   
        //alert("arrastre: "+arrastre+" destino: "+destino+" destino2: "+destino2+" destino3: "+destino3+" destino4: "+destino4+" destino5: "+destino5);
        if(arrastre.value != 0)
        {
            arrastre.disabled = true;
            $("input[id='nombre']").attr('disabled','disabled');

            $.ajax({
                type: 'get',
                dataType: 'text',
                url: 'ajax_bd/con_prod.php',
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
                        else if (1==$_SESSION["userinfo"]["userinfo"][1] OR 2==$_SESSION["userinfo"]["userinfo"][1]){
                            echo '<li><a href="usuarios.php" class="users menudrop"><span>Usuarios</span></a>
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
                        <li><a href="marcas.php" class="elements"><span>Marcas</span></a></li>
                    </ul>
                        
                </div><!--leftmenu-->
            	<div id="togglemenuleft"><a></a></div>
            </div><!--mainleftinner-->
        </div><!--mainleft-->
        
        <div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu multipletabmenu">
                    <li><a href="productos.php">Productos</a></li>
                    <li><a href="agr_prod.php">Entrada Producto</a></li>
                    <li class="current"><a href="new_prod.php">Nuevo Producto</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                
                    <div class="contenttitle">
                    	<h2 class="form"><span>Nuevo producto</span></h2>
                    </div><!--contenttitle-->
                    
                    <br/>
                    
                    <form class="stdform" action="controlador/new_pd.php" method="post" id="agrprod">
                    	
                        <p>
                        	<label>Codigo</label>
                            <span class="field"><input type="text" name="codigo" id="codigo" autofocus="autofocus" required="required" class="smallinput" onchange="javascipt:obten_datos(this);" /></span>
                        </p>
                        
                        <p>
                        	<label>Nombre</label>
                            <span class="field"><input type="text" name="nombre" id="nombre" class="smallinput" required="required"/></span>
                        </p>
                        
                        <p>
                        <label>Categoría</label>
                        <span class="field">
                        </span>
                        </p>

                        <p>
                        
                            <label>Marca</label>
                            <span class="field">
                            <select name="marca" id="marca" required="required">
                            <option value="">Seleccione una Marca</option>
                            <?php
                                include("php/crg_mrc.php");
                            ?>
                            </select>
                            </span>                        
                        </p>

                         <p>
                            <label>Localizacion</label>
                            <span class="field">
                            <select name="localizacion" id="localizacion" required="required">
                            <option value="">Seleccione una Localizacion</option>
                            <?php
                                include("php/crg_lc.php");
                            ?>
                            </select>
                            </span>                        
                        </p>

                         <p>
                            <label>Proveedor</label>
                            <span class="field">
                            <select name="proveedor" id="proveedor" required="required">
                            <option value="">Seleccione una Proveedor</option>
                            <?php
                                include("php/crg_pvd.php");
                            ?>
                            </select>
                            </span>                        
                        </p>
                        <p>
                            <label>Valor Compra</label>
                            <span class="field"><input type="number" name="valorC" id="valorC" class="smallinput" required="required" min="1" step="1" pattern="\d+"/></span> 
                        </p>
                        <p>
                            <label>Valor Venta</label>
                            <span class="field"><input type="number" name="valorV" id="valorV" class="smallinput" required="required" min="1" step="1" pattern="\d+"/></span> 
                        </p>
                        <p>
                            <label>Cantidad</label>
                            <span class="field"><input type="number" name="cantidadIng" id="cantidadIng" class="smallinput" required="required" min="1" step="1" pattern="\d+"/></span> 
                        </p>

                        <br clear="all" />
                        
                        <p class="stdformbutton">
                            <input type="submit" id="procesar" class="submit radius2" value="Procesar" disabled="true"/>
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
