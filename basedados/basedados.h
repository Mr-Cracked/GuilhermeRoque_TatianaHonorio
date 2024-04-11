<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysqli_connect($dbhost, $dbuser,$dbpass);
if(! $conn ){die('ERRO AO CONECTAR!!!! ' . mysqli_error($conn));}
mysqli_select_db($conn,'gestaocursos');
?>