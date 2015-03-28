<?php
session_start();
setcookie("userinfo", "", time() - 3600, "/");
setcookie("userPass", "", time() - 3600, "/");
session_unset();
session_destroy();
header("Location:index.php");
?>