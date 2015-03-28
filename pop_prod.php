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
<script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/custom/general.js"></script>
<script type="text/javascript" src="js/custom/form.js"></script>
<script type="text/javascript" src="js/plugins/jquery.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui.min.js"></script>
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="css/ie9.css"/>
<![endif]-->

<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="css/ie8.css"/>
<![endif]-->

<script language="javascript">
function cantidad(){ 
    window.close();
} 
</script>

<!--[if IE 7]>
    <link rel="stylesheet" media="screen" href="css/ie7.css"/>
<![endif]-->


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

        

                <div class="contenttitle radiusbottom0">
                	<h2 class="table"><span>Listado Productos</span></h2>
                </div><!--contenttitle-->
                <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable">
                    <colgroup>
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0">Codigo</th>
                            <th class="head1">Nombre</th>
                            <th class="head0">Stock</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="head0">Codigo</th>
                            <th class="head1">Nombre</th>
                            <th class="head0">Stock</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            include("php/tb_pop_prod.php");
                        ?>
                    </tbody>
                </table>
                
                <br clear="all" />
  
</body>
</html>
