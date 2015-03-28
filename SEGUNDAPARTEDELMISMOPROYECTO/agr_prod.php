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
<title>Entrada Producto</title>
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
<script >
    //funcion que limpia los demas campos
    function LimpiarInput(destino,destino2)
    {
        destino.value="";   
    }
    //funcion que llena los datos 
    function LlenarDatos(text,destino,destino2,destino3,destino4,destino5,destino6,arrastre)
    {
        var datos = text.split('|'); //dividimos los datos para colocarlos en el lugar correcto     
        destino.value = datos[0];
        destino2.value= datos[1];
        destino3.value = datos[2];
        destino4.value = datos[3];
        destino5.value = datos[4];
        destino6.value= datos[5];

        if (0 == datos[6]) {
            alert("No Existe el producto");
            arrastre.disabled = false;
            destino.disabled = true;
            destino2.disabled = true;
            destino3.disabled = true;
            destino4.disabled = true;
            destino5.disabled = true;
            destino6.disabled = true;
        }
        else if (1== datos[6]){
            arrastre.disabled = false;
            destino.disabled = false;
            destino.readOnly = true;
            //destino2.disabled = false;
            //destino2.readOnly = true;
            //destino3.disabled = false;
            //destino3.readOnly = true;
            //destino4.disabled = false;
            //destino4.readOnly = true;
            //destino5.disabled = false;
            destino6.readOnly = true;
            destino6.disabled = false;
            //destino5.readOnly = true;
            $('input[type="submit"]').removeAttr('disabled');
        }
    }   
    //fucion con la cual obtenemos  los datos 
    function obten_datos(arrastre,destino,destino2,destino3,destino4,destino5,destino6)
    {   
        //alert("arrastre: "+arrastre+" destino: "+destino+" destino2: "+destino2+" destino3: "+destino3+" destino4: "+destino4+" destino5: "+destino5);
        destino = document.getElementById(destino);
        destino2 = document.getElementById(destino2);
        destino3 = document.getElementById(destino3);
        destino4 = document.getElementById(destino4);
        destino5 = document.getElementById(destino5);
        destino6 = document.getElementById(destino6);
        LimpiarInput(destino);
        LimpiarInput(destino2);
        LimpiarInput(destino3);
        LimpiarInput(destino4);
        LimpiarInput(destino5);
        LimpiarInput(destino6);
        if(arrastre.value != 0)
        {
            arrastre.disabled = true;
            destino.disabled = true;
            destino2.disabled = true;
            destino3.disabled = true;
            destino4.disabled = true;
            destino5.disabled = true;
            destino6.disabled = true;
            $.ajax({
                type: 'get',
                dataType: 'text',
                url: 'ajax_bd/obt_pd.php',
                data: {codigo: arrastre.value},
                success: function(text){
                    LlenarDatos(text,destino,destino2,destino3,destino4,destino5,destino6,arrastre);
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
                    <li class="current"><a href="agr_prod.php">Entrada Producto</a></li>
                    <li><a href="new_prod.php">Nuevo Producto</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                
                    <div class="contenttitle">
                    	<h2 class="form"><span>Agregar stock de producto</span></h2>
                    </div><!--contenttitle-->
                    
                    <br/>
                    
                    <form class="stdform" action="controlador/agr_pd.php" method="post" id="agrprod">
                    	
                        <p>
                        	<label>Codigo</label>
                            <span class="field"><input type="text" name="codigo" id="codigo" autofocus="autofocus" required="required" class="smallinput" onchange="javascipt:obten_datos(this,'nombre','categoria','marca','localizacion','proveedor','cantidad');" /></span>
                        </p>
                        
                        <p>
                        	<label>Nombre</label>
                            <span class="field"><input type="text" name="nombre" id="nombre" class="smallinput" required="required"/></span>
                        </p>
                        
                        <p>
                        	<label>Categoria</label>
                            <span class="field"><input type="text" name="categoria" id="categoria" class="smallinput" required="required" />
                            </span>
                        </p>

                        <p>
                            <label>Marca</label>
                            <span class="field"><input type="text" name="marca" id="marca" required="required" class="smallinput" />
                            </span>                        
                        </p>

                         <p>
                            <label>Localizacion</label>
                            <span class="field"><input type="text" name="localizacion" id="localizacion" required="required" class="smallinput" />
                            </span>                        
                        </p>

                         <p>
                            <label>Proveedor</label>
                            <span class="field">
                            <input type="text" name="proveedor" id="proveedor" required="required" class="smallinput" />
                            </span>                        
                        </p>

                        <p>
                            <label>Stock</label>
                            <span class="field"><input type="number" name="cantidad" id="cantidad" class="smallinput"/></span> 
                        </p>
                        
                        <p>
                            <label>Cantidad Entrada</label>
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
