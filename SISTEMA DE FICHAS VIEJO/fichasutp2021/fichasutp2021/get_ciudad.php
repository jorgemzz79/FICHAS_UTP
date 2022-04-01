<?php

include 'conexion0.php';

//pasamos id del país
if(!empty($_POST["id_pais"]))
{
   $query_utf8 = $con2->set_charset("utf8");
    $sql ="SELECT clave, nombre FROM municipios WHERE estado_id = '" . $_POST["id_pais"] . "'";

   	$consulta_ciudades = $con2->query($sql);

   //construimos lista nueva dependiente
   ?>
     <option value="">Seleccionar municipio</option>
   <?php

   while($ciudad= $consulta_ciudades->fetch_object())
   {
	   ?>
		  <option value="<?php echo $ciudad->clave; ?>"><?php echo $ciudad->nombre; ?></option>
	   <?php
   }
}
?>
