<!DOCTYPE html>
<html>
<head>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        /**
         * Funcion para añadir una nueva columna en la tabla
         */
        $("#add").click(function(){
            $('#myTable').append('<tr><td>my data</td><td>more data</td></tr>');});
        
        /**
         * Funcion para eliminar la ultima columna de la tabla.
         * Si unicamente queda una columna, esta no sera eliminada
         */
        $("#del").click(function(){
            // Obtenemos el total de columnas (tr) del id "tabla"
            //$('#myTable').remove('<tr><td>my data</td><td>more data</td></tr>');});
        });
    });
    </script>
    
    <style>
    #add, #del  {cursor:pointer;text-decoration:underline;color:#00f;}
    </style>
</head>

<body>
<div id="add">pulsa aquí para añadir una nueva fila desde jquery</div>
<div id="del">pulsa aquí para eliminar la ultima fila desde jquery</div>
<p>
    <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="myTable">
                    <colgroup>
                        <col class="con0" />
                        <col class="con1" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0">Codigo</th>
                            <th class="head1">Nombre</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="head0">Codigo</th>
                            <th class="head1">Nombre</th>
                        </tr>
                    </tfoot>
                    <tbody>

                    </tbody>
                </table>
</p>
</body>
</html>