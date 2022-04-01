<?php

include 'conexion.php';

//pasamos id del país
if(!empty($_POST["id_pais"]))
{
   $query_utf8 = $con->set_charset("utf8");
    $sql ="SELECT cve_carrera, nombre FROM carreras_cgut WHERE cve_unidad_academica = '" . $_POST["id_pais"] . "'";
   	$consulta_ciudades = $con->query($sql);

   //construimos lista nueva dependiente
   ?>
     <option value="">Seleccionar - Carrera</option>
   <?php

   while($ciudad= $consulta_ciudades->fetch_object())
   {
	   ?>
		  <option value="<?php echo $ciudad->cve_carrera; ?>"><?php echo $ciudad->nombre; ?></option>
	   <?php
   }
}
?>
