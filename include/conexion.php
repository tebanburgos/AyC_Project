<?php
$link=mysql_connect("localhost", "root", "");
mysql_set_charset('utf8');
$dbname="ayc_proyecto3";
mysql_select_db($dbname, $link) OR DIE ("Error: No es posible establecer la conexión");

?>
