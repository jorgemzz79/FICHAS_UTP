<?php

	include("conexion.php");

if(isset($_POST['add'])){
  echo "curp --------------------------------".$_POST["CURP"];
$CURP = $_POST["CURP"];
$RFC = $_POST["RFC"];
$NOMBRES = $_POST["NOMBRES"];
$APATERNO = $_POST["APATERNO"];
$AMATERNO = $_POST["AMATERNO"];
$SANGRE = $_POST["SANGRE"];
$GENERO = $_POST["GENERO"];
$ECIVIL = $_POST["ECIVIL"];
$FNACIMIENTO = $_POST["FNACIMIENTO"];
$ENACIMIENTO = $_POST["ENACIMIENTO"];
$CNACIMIENTO = $_POST["CNACIMIENTO"];
$CALLE = $_POST["CALLE"];
$NUMERO = $_POST["NUMERO"];
$COLONIA = $_POST["COLONIA"];
$TELEFONO = $_POST["TELEFONO"];
$CELULAR = $_POST["CELULAR"];
$EPROCEDENCIA = $_POST["EPROCEDENCIA"];
$CPROCEDENCIA = $_POST["CPROCEDENCIA"];
$PREPARATORIA = $_POST["PREPARATORIA"];
$CARRERA = $_POST["CARRERA"];
$TURNO = $_POST["TURNO"];
$CORREO = $_POST["CORREO"];

$INSERTA_ASPIRANTE = "INSERT INTO `aspirantes` (
`curp`,
`rfc`,
`nombres`,
`apaterno`,
`amaterno`,
`sangre`,
`genero`,
`ecivil`,
`fnacimiento`,
`enacimiento`,
`cnacimiento`,
`calle`,
`numero`,
`colonia`,
`telefono`,
`celular`,
`eprocedencia`,
`cprocedencia`,
`preparatoria`,
`carrera`,
`turno`,
`correo`)
VALUES ('".$CURP."',
'".$RFC."',
'".$NOMBRES."',
'".$APATERNO."',
'".$AMATERNO."',
'".$SANGRE."',
'".$GENERO."',
'".$ECIVIL."',
'".$FNACIMIENTO."',
'".$ENACIMIENTO."',
'".$CNACIMIENTO."',
'".$CALLE."',
'".$NUMERO."',
'".$COLONIA."',
'".$TELEFONO."',
'".$CELULAR."',
'".$EPROCEDENCIA."',
'".$CPROCEDENCIA."',
'".$PREPARATORIA."',
'".$CARRERA."',
'".$TURNO."',
'".$CORREO."');";


  $cek = mysqli_query($con, "SELECT * FROM aspirantes WHERE curp='$CURP'");
  if(mysqli_num_rows($cek) == 0){
      $insert = mysqli_query($con, $INSERTA_ASPIRANTE) or die(mysqli_error());
      if($insert){
        echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido guardados con éxito.</div>';
      }else{
        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
      }

  }else{
    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. CURP exite!</div>';
  }
}
?>
