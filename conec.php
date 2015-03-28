<?php
class conectarMySQL {
    //creamos las variables que vamos a utilizar en la conexion
    var $servidor; //servidor
    var $usuario; //usuario
    var $password; //password
    var $bd; //base de datos
    //creamos las variables para las consultas
    var $consulta; //aquí se guarda las consultas que se realizan
    var $enlace; //aquí se almacena la conexión con la bd, sí se ha producido
    var $resultado; //aquí se guardan los datos que se generen de una consulta
    var $datos; //aqui guardamos el numero de registros obtenidos en la consulta
    //constructor, donde se inicializan las variables
    function conectarMySQL($servidor,$usuario,$password,$bd) {
        $this->servidor=$servidor;
        $this->usuario=$usuario;
        $this->password=$password;
        $this->bd=$bd;
    }
    //conectamos con la base de datos
    function conectar() {
        //se realiza la conexión a la base de datos
        if($this->enlace=mysql_connect($this->servidor,$this->usuario,$this->password)) {
            //se intenta acceder a la base de datos que deseeamos
            if(mysql_select_db($this->bd,$this->enlace)) {
                mysql_set_charset('utf8');
                //Sí es correcta 
            } else {
                //Si falla muestra el mensaje que el error está al acceder a la base de datos
                echo "No se ha podido seleccionar la  BD";
            }
        } else {
            //Si falla la conexión con la base de datos se muestra el mensaje
            echo "No se ha podido conectar a la bd";
        }                 
    }   
    function consultar($query) {
        //aquí se realizan las consultas a la base de datos
        $this->consulta=mysql_query($query,$this->enlace) or die (mysql_error());
    }    
    function obtendatos() {
        //aquí se obtienen los datos de la consulta
        $this->resultado=mysql_fetch_array($this->consulta);
        return $this->resultado;
    }   
    function numerodedatos() {
        //aquí se obtienen los datos de la consulta
        $this->datos=mysql_num_rows($this->consulta);
        return $this->datos;
    }   
    //cerramos la conexión con la base de datos
    function cerrarconexion() {
        mysql_close($this->enlace);
    }
    //libera el contenido que se encuentra en el atributo 
    function limpiaconsulta() {
        mysql_free_result($this->consulta);
    }
}
?>