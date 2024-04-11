<?php
session_start();
$_SESSION['tipo_utilizador']=0;
header("Location: index.php");
session_destroy();
exit();
?>