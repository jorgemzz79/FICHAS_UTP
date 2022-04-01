<?php
/*Datos de conexion a la base de datos*/
$db_host = "www.utparral.edu.mx";
$db_user = "webamaster";
$db_pass = "Maestrodelweb2017";
$db_name = "cat_localidad";

$con2 = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if(mysqli_connect_errno()){
	echo 'No se pudo conectar a la base de datos : '.mysqli_connect_error();
}

?>
