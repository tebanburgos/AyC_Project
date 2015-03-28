<?php
include('conec.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<script type="text/javascript" src="js/plugins/jquery.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui.min.js"></script>
<script >
    //funcion que limpia los demas campos
    function LimpiarInput(destino,destino2)
    {
        destino.value="";   
    }
    //funcion que llena los datos 
    function LlenarDatos(text,destino,destino2,destino3,destino4,destino5)
    {
        var datos = text.split('|'); //dividimos los datos para colocarlos en el lugar correcto     
        destino.value = datos[0];
        destino2.value = datos[1];
        destino3.value = datos[2];
        destino4.value = datos[3];
        destino5.value = datos[4];
    }   
    //fucion con la cual obtenemos  los datos 
    function obten_datos(arrastre,destino,destino2,destino3,destino4,destino5)
    {   
        //alert("arrastre: "+arrastre+" destino: "+destino+" destino2: "+destino2+" destino3: "+destino3+" destino4: "+destino4+" destino5: "+destino5);
        destino = document.getElementById(destino);
        destino2 = document.getElementById(destino2);
        destino3 = document.getElementById(destino3);
        destino4 = document.getElementById(destino4);
        destino5 = document.getElementById(destino5);
        LimpiarInput(destino);
        LimpiarInput(destino2);
        LimpiarInput(destino3);
        LimpiarInput(destino4);
        LimpiarInput(destino5);
        if(arrastre.value != 0)
        {
            arrastre.disabled = true;
            destino.disabled = true;
            destino.value = 'Cargando Nombre....';
            destino2.disabled = true;
            destino2.value = 'Cargando Apellido Paterno ....';
            destino3.disabled = true;
            destino3.value = 'Cargando Apellido Materno ....';
            destino4.disabled = true;
            destino4.value = 'Cargando Puesto ....';
            destino5.disabled = true;
            destino5.value = 'Cargando RFC ....';           
            $.ajax({
                type: 'get',
                dataType: 'text',
                url: 'obtendatos.php',
                data: {valor: arrastre.value},
                success: function(text){
                    LlenarDatos(text,destino,destino2,destino3,destino4,destino5);
                    arrastre.disabled = false;
                    destino.disabled = false;
                    //destino.readOnly = true;
                    destino2.disabled = false;
                    //destino2.readOnly = true;
                    destino3.disabled = false;
                    //destino3.readOnly = true;
                    destino4.disabled = false;
                    //destino4.readOnly = true;
                    destino5.disabled = false;
                    //destino5.readOnly = true;
                        }
            });     
        }
    }
</script>
</head>
<body>
<form id="form1" name="form1" method="post" action="index.php">
  <table width="27%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="38%">Trabajador &nbsp;&nbsp; </td>
      <td width="62%"><label>
        
        <input type="text" name="name" id="name" onchange="javascipt:obten_datos(this,'nombre','apaterno','amaterno','puesto','rfc');" autofocus="autofocus"/>
      </label></td>
    </tr>
  </table> <br />  
<table>
    <tr> 
        <td>Nombre          </td> 
        <td>Apellido Paterno</td>
        <td>Apellido Materno</td>
        <td>Puesto          </td>
        <td>Rfc             </td>
        <td>Persepciones    </td>
        <td>Deducciones     </td>
        <td>Total           </td>
        <td>Firma           </td>       
    </tr>
    <tr>   <td height="28"><label><input type="text" name="nombre"          id="nombre"    />       </label></td>
           <td><label><input type="text" name="apaterno"        id="apaterno"  />       </label></td>
           <td><label><input type="text" name="amaterno"        id="amaterno"  />       </label></td>
           <td><label><input type="text" name="puesto"          id="puesto"    />       </label></td>
           <td><label><input type="text" name="rfc"             id="rfc"       />       </label></td>
           <td><label><input type="text" name="persepcion"      id="persepcion"/>       </label></td>
           <td><label><input type="text" name="deduccion"       id="deduccion" />       </label></td>
           <td><label><input type="text" name="total"           id="total"  />          </label></td>
           <td><label> ____________________                                             </label></td>   
    </tr>          
</table> 
<input type="button" value="procesar"/>
</form>
<br />
</body>
</html>
