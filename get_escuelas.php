<?php

include 'conexion.php';

//pasamos id del país
if(!empty($_POST["ESTADO"]) && !empty($_POST["MUNICIPIO"]))
{
   $query_utf8 = $con->set_charset("utf8");
    $sql ="SELECT id, nombre FROM `escuelas_procedencia` where cve_estado = '" . $_POST["ESTADO"] . "' and cve_municipio = '" . $_POST["MUNICIPIO"] . "'";
   	$consulta_ciudades = $con->query($sql);

   //construimos lista nueva dependiente
   ?>
     <option value="">Seleccionar - Carrera</option>
   <?php

   while($ciudad= $consulta_ciudades->fetch_object())
   {
	   ?>
		  <option value="<?php echo $ciudad->id; ?>"><?php echo $ciudad->nombre; ?></option>
	   <?php
   }
}
?>
