<?php

include 'conexion.php';

//pasamos id del país
if(!empty($_POST["id_pais"]))
{
   $query_utf8 = $con->set_charset("utf8");
    $sql ="SELECT cve_municipio, nombre FROM municipios WHERE cve_estado = '" . $_POST["id_pais"] . "'";
   	$consulta_ciudades = $con->query($sql);

   //construimos lista nueva dependiente
   ?>
     <option value="">Seleccionar - municipio</option>
   <?php

   while($ciudad= $consulta_ciudades->fetch_object())
   {
	   ?>
		  <option value="<?php echo $ciudad->cve_municipio; ?>"><?php echo $ciudad->nombre; ?></option>
	   <?php
   }
}
?>
