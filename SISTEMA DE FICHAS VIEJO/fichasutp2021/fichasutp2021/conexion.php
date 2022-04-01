<?php
/*Datos de conexion a la base de datos*/
$db_host = "www.sistemasutp.com";
$db_user = "sisutp";
$db_pass = "Sistemas2020";
$db_name = "i7300611_ma1";

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
	echo 'No se pudo conectar a la base de datos : '.mysqli_connect_error();
}

?>
