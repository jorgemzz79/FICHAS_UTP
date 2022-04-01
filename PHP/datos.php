<?php 
include '../conexion.php';
//Datos personales
$Nombre = $_POST["xNombre"];
$apellidoPaterno = $_POST["xApellidoPat"];
$apellidoMaterno = $_POST["xApellidoMat"];
$fechaNacimiento = $_POST["xFechaNac"];
$CURP = $_POST["xCURP"];
//-----------------------------------
$sexo = $_POST["optSexo"];

//-----------------------------------
$telefono = $_POST["id_telefono"];
$correoElectronico = $_POST["id_mail"];
$salud = $_POST["xDiscapacidad"];
$saludEspecificada = $_POST["xDiscapacidadEspecifique"];
$origenIndigena = $_POST["optLenguaIndigena"];
$origenIndigena = $_POST["optLenguaIndigena"];
$lenguaIndigena = $_POST["xLenguaIndigena"];
$estadoNacimiento = $_POST["xEstadoNacimiento"];
$municipioNacimiento = $_POST["xMunicipioNacimiento"];
$localidadNacimiento = $_POST["xLocalidadNacimiento"];
//Domicilio
$domicilioEstado = $_POST["xEstadoDomicilio"];
$domicilioMunicipio = $_POST["xMunicipioDomicilio"];
$domicilioColonia = $_POST["xAsentamiento"];
$domicilioCalle = $_POST["xCalle"];
//Escuela de procedencia
$procedenciaEstado = $_POST["xEstado"];
$procedenciaMunicipio = $_POST["xMunicipio"];
$procedenciaEscuela = $_POST["xCveEscProcedencia"];
$procedenciaPromedio = $_POST["xPromedioBach"];
//Elección de la carrera de TSU
$eleccionUnidadAcademica = $_POST["xUnidadAcademica"];
$eleccionCarrera = $_POST["xcarr"];
$eleccionTurno = $_POST["xCveTurno"];
//-------SELECCION DE SEGUNDA CARRERA-------------------------------------
$eleccionUnidadAcademica2 = $_POST["xUnidadAcademica2"];
$eleccionCarrera2 = $_POST["xcarr2"];
$eleccionTurno2 = $_POST["xCveTurno2"];

//¿Por qué medio te enteraste de la UTP?
$medioPublicitario = $_POST["rbMedios"];
//-----------------------------------------------------------------------//


echo "<br>";
echo  "Nombre: " . $Nombre;

echo "<br>";
echo  "apellidoPaterno: " . $apellidoPaterno;

echo "<br>";
echo "apellidoMaterno: " . $apellidoMaterno;

echo "<br>";
echo "fechaNacimiento: " . $fechaNacimiento;

echo "<br>";
echo "CURP: " . $CURP;
//-----------------------------------

echo "<br>";
echo "sexo: " . $sexo;

//-----------------------------------

echo "<br>";
echo "telefono: " . $telefono;

echo "<br>";
echo "correoElectronico: " . $correoElectronico;

echo "<br>";
echo "salud: " . $salud;

echo "<br>";
echo "salud especificada: " . $saludEspecificada;;


echo "<br>";
echo "origenIndigena: " . $origenIndigena;

echo "<br>";
echo "origenIndigena: " . $origenIndigena;

echo "<br>";
echo "lenguaIndigena: " . $lenguaIndigena;

echo "<br>";
echo "estadoNacimiento: " . $estadoNacimiento;

echo "<br>";
echo "municipioNacimiento: " . $municipioNacimiento;

echo "<br>";
echo "localidadNacimiento: " . $localidadNacimiento;
//Domicilio

echo "<br>";
echo "domicilioEstado: " . $domicilioEstado;

echo "<br>";
echo "domicilioMunicipio: " . $domicilioMunicipio;

echo "<br>";
echo "domicilioColonia: " . $domicilioColonia;

echo "<br>";
echo "domicilioCalle: " . $domicilioCalle;
//Escuela de procedencia

echo "<br>";
echo "procedenciaEstado: " . $procedenciaEstado;

echo "<br>";
echo "procedenciaMunicipio: " . $procedenciaMunicipio;

echo "<br>";
echo "procedenciaEscuela: " . $procedenciaEscuela;

echo "<br>";
echo "procedenciaPromedio: " . $procedenciaPromedio;
//Elección de la carrera de TSU

echo "<br>";
echo "eleccionUnidadAcademica: " . $eleccionUnidadAcademica;

echo "<br>";
echo "eleccionCarrera: " . $eleccionCarrera;

echo "<br>";
echo "eleccionTurno: " . $eleccionTurno;
//¿Por qué medio te enteraste de la UTP?

echo "<br>";
echo "medioPublicitario: " . $medioPublicitario;

//------------------------------------------------------------------------//
echo "----------------------------------------------------------------------------------";echo "<br>";
//Datos personales
echo $Nombre;echo "<br>";
echo $apellidoPaterno;echo "<br>";
echo $apellidoMaterno;echo "<br>";
echo $fechaNacimiento;echo "<br>";
echo $CURP;echo "<br>";
//-----------------------------------
echo $sexo;echo "<br>";
//-----------------------------------
echo $telefono;echo "<br>";
echo $correoElectronico;echo "<br>";
//-----------REVISAR---------------
echo $salud;echo "<br>";

echo $saludEspecificada;echo "<br>";
if($saludEspecificada == " " or $saludEspecificada == null){
    $saludEspecificada = "Sin Especificaciones";
}
//-----------REVISAR---------------
echo $origenIndigena;echo "<br>";

echo $lenguaIndigena;echo "<br>";

//****************************************************** */
$estadoNacimiento;
$ConsultaEstadoNacimiento = mysqli_query($con, "SELECT * FROM estados WHERE cve_estado='$estadoNacimiento'");
            if(mysqli_num_rows($ConsultaEstadoNacimiento) == 0){
            }else{
                while($row = mysqli_fetch_assoc($ConsultaEstadoNacimiento)){
                    $estadoNacimientoModificado = $row['nombre'];
            }
		  }
          echo $estadoNacimientoModificado;echo "<br>";
//****************************************************** */
$municipioNacimiento;
$ConsultaMunicipioNacimiento = mysqli_query($con, "SELECT * FROM municipios WHERE cve_estado='$estadoNacimiento' AND cve_municipio='$municipioNacimiento'");
            if(mysqli_num_rows($ConsultaMunicipioNacimiento) == 0){
            }else{
                while($row = mysqli_fetch_assoc($ConsultaMunicipioNacimiento)){
                    $municipioNacimientoModificado = $row['nombre'];
            }
            }
            echo  $municipioNacimientoModificado;echo "<br>";
            echo $localidadNacimiento;echo "<br>";
//Domicilio
//****************************************************** */
$domicilioEstado;
$ConsultaDomicilioEstado = mysqli_query($con, "SELECT * FROM estados WHERE cve_estado='$domicilioEstado'");
            if(mysqli_num_rows($ConsultaDomicilioEstado) == 0){
            }else{
                while($row = mysqli_fetch_assoc($ConsultaDomicilioEstado)){
                    $domicilioEstadoModificado = $row['nombre'];
            }
		  }
          echo $domicilioEstadoModificado;echo "<br>";
//******************************************************* */
$domicilioMunicipio;
$ConsultaDomicilioMunicipio = mysqli_query($con, "SELECT * FROM municipios WHERE cve_estado='$domicilioEstado' AND cve_municipio='$domicilioMunicipio'");
            if(mysqli_num_rows($ConsultaMunicipioNacimiento) == 0){
            }else{
                while($row = mysqli_fetch_assoc($ConsultaDomicilioMunicipio)){
                    $domicilioMunicipioModificado = $row['nombre'];
            }
            }
            echo $domicilioMunicipioModificado;echo "<br>";

            echo $domicilioColonia;echo "<br>";
            echo $domicilioCalle;echo "<br>";
//Escuela de procedencia
//*************************************************** */
$procedenciaEstado;
$ConsultaProcedenciaEstado = mysqli_query($con, "SELECT * FROM estados WHERE cve_estado='$procedenciaEstado'");
            if(mysqli_num_rows($ConsultaProcedenciaEstado) == 0){
            }else{
                while($row = mysqli_fetch_assoc($ConsultaProcedenciaEstado)){
                    $procedenciaEstadoModificado = $row['nombre'];
            }
		  }
          echo  $procedenciaEstadoModificado;echo "<br>";
//**************************************************** */
$procedenciaMunicipio;
$ConsultaProcedenciaMunicipio = mysqli_query($con, "SELECT * FROM municipios WHERE cve_estado='$procedenciaEstado' AND cve_municipio='$procedenciaMunicipio'");
            if(mysqli_num_rows($ConsultaProcedenciaMunicipio) == 0){
            }else{
                while($row = mysqli_fetch_assoc($ConsultaProcedenciaMunicipio)){
                    $procedenciaMunicipioModificado = $row['nombre'];
            }
            }
            echo $procedenciaMunicipioModificado;echo "<br>";
//****************************************************** */
$procedenciaEscuela;
$ConsultaProcedenciaEscuela = mysqli_query($con, "SELECT * FROM escuelas_procedencia WHERE id = $procedenciaEscuela");
            if(mysqli_num_rows($ConsultaProcedenciaEscuela) == 0){
            }else{
                while($row = mysqli_fetch_assoc($ConsultaProcedenciaEscuela)){
                    $procedenciaEscuelaModificado = $row['nombre'];
            }
            }
            echo $procedenciaEscuelaModificado;echo "<br>";

echo $procedenciaPromedio;echo "<br>";
//Elección de la carrera de TSU
//****************************************************** */
$eleccionUnidadAcademica;
$ConsultaEleccionUnidadAcademica = mysqli_query($con, "SELECT * FROM unidades_academicas WHERE cve_unidad_academica = $eleccionUnidadAcademica");
            if(mysqli_num_rows($ConsultaEleccionUnidadAcademica) == 0){
            }else{
                while($row = mysqli_fetch_assoc($ConsultaEleccionUnidadAcademica)){
                    $eleccionUnidadAcademicaModificado = $row['nombre'];
            }
            }
            echo $eleccionUnidadAcademicaModificado;echo "<br>";

//***************************************************** */
$eleccionCarrera;
$ConsultaEleccionCarrera = mysqli_query($con, "SELECT * FROM carreras_cgut WHERE cve_carrera = $eleccionCarrera");
            if(mysqli_num_rows($ConsultaEleccionCarrera) == 0){
            }else{
                while($row = mysqli_fetch_assoc($ConsultaEleccionCarrera)){
                    $eleccionCarreraModificado = $row['nombre'];
            }
            }
            echo $eleccionCarreraModificado;echo "<br>";

            //***************************************************************************************** */


//Elección de la carrera de TSU SEGUNDA OPCION
//****************************************************** */
$eleccionUnidadAcademica2;
$ConsultaEleccionUnidadAcademica2 = mysqli_query($con, "SELECT * FROM unidades_academicas WHERE cve_unidad_academica = $eleccionUnidadAcademica2");
            if(mysqli_num_rows($ConsultaEleccionUnidadAcademica2) == 0){
            }else{
                while($row = mysqli_fetch_assoc($ConsultaEleccionUnidadAcademica2)){
                    $eleccionUnidadAcademicaModificado2 = $row['nombre'];
            }
            }
            echo $eleccionUnidadAcademicaModificado2;echo "<br>";

//***************************************************** */
$eleccionCarrera2;
$ConsultaEleccionCarrera2 = mysqli_query($con, "SELECT * FROM carreras_cgut WHERE cve_carrera = $eleccionCarrera2");
            if(mysqli_num_rows($ConsultaEleccionCarrera2) == 0){
            }else{
                while($row = mysqli_fetch_assoc($ConsultaEleccionCarrera2)){
                    $eleccionCarreraModificado2 = $row['nombre'];
            }
            }
            echo $eleccionCarreraModificado2;echo "<br>";



            echo $eleccionTurno2;echo "<br>";
//¿Por qué medio te enteraste de la UTP?
echo $medioPublicitario; echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

$INSERTA_ASPIRANTE = "INSERT INTO `aspirante` (`id`, `nombre`, `apellido_paterno`, `apellido_materno`, `fecha_nacimiento`, `curp`, `sexo`, `telefono`, `correo_electronico`, `salud`, `salud_especificada`, `origen_indigena`, `lengua_indigena`, `estado_nacimiento`, `municipio_nacimiento`, `localidad_nacimiento`, `domicilio_estado`, `domicilio_municipio`, `domicilio_colonia`, `domicilio_calle`, `procedencia_estado`, `procedencia_municipio`, `procedencia_escuela`, `procedencia_promedio`, `eleccion_unidad_academica`, `eleccion_carrera`, `eleccion_turno`, `eleccion_unidad_academica2`, `eleccion_carrera2`, `eleccion_turno2`, `medio_publicitario`) VALUES (NULL, '$Nombre', '$apellidoPaterno', '$apellidoMaterno', '$fechaNacimiento', '$CURP', '$sexo', '$telefono', '$correoElectronico', '$salud', '$saludEspecificada', '$origenIndigena', '$lenguaIndigena', '$estadoNacimiento', '$municipioNacimiento', '$localidadNacimiento', '$domicilioEstado', '$domicilioMunicipio', '$domicilioColonia', '$domicilioCalle', '$procedenciaEstado', '$procedenciaMunicipio', '$procedenciaEscuela', '$procedenciaPromedio', '$eleccionUnidadAcademica', '$eleccionCarrera', '$eleccionTurno', '$eleccionUnidadAcademica2', '$eleccionCarrera2', '$eleccionTurno2', '$medioPublicitario');";

$cek = mysqli_query($con, "SELECT * FROM aspirante WHERE curp='$CURP'");
		  if(mysqli_num_rows($cek) == 0){
		      $insert = mysqli_query($con, $INSERTA_ASPIRANTE) or die(mysqli_connect_error());
		      if($insert){
		        echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido guardados con éxito.</div>';
		      }
            else{
		        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
		      }
		  }
          else{
		    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. CURP exite!</div>';
		  }


$INSERTA_ASPIRANTE = "INSERT INTO `aspirante_detalle` (`id`, `nombre`, `apellido_paterno`, `apellido_materno`, `fecha_nacimiento`, `curp`, `sexo`, `telefono`, `correo_electronico`, `salud`, `salud_especificada`, `origen_indigena`, `lengua_indigena`, `estado_nacimiento`, `municipio_nacimiento`, `localidad_nacimiento`, `domicilio_estado`, `domicilio_municipio`, `domicilio_colonia`, `domicilio_calle`, `procedencia_estado`, `procedencia_municipio`, `procedencia_escuela`, `procedencia_promedio`, `eleccion_unidad_academica`, `eleccion_carrera`, `eleccion_turno`, `eleccion_unidad_academica2`, `eleccion_carrera2`, `eleccion_turno2`, `medio_publicitario`) VALUES (NULL, '$Nombre', '$apellidoPaterno', '$apellidoMaterno', '$fechaNacimiento', '$CURP', '$sexo', '$telefono', '$correoElectronico', '$salud', '$saludEspecificada', '$origenIndigena', '$lenguaIndigena', '$estadoNacimientoModificado', '$municipioNacimientoModificado', '$localidadNacimiento', '$domicilioEstadoModificado', '$domicilioMunicipioModificado', '$domicilioColonia', '$domicilioCalle', '$procedenciaEstadoModificado', '$procedenciaMunicipioModificado', '$procedenciaEscuelaModificado', '$procedenciaPromedio', '$eleccionUnidadAcademicaModificado', '$eleccionCarreraModificado', '$eleccionTurno', '$eleccionUnidadAcademicaModificado2', '$eleccionCarreraModificado2', '$eleccionTurno2', '$medioPublicitario');";

$cek = mysqli_query($con, "SELECT * FROM aspirante_detalle WHERE curp='$CURP'");
		  if(mysqli_num_rows($cek) == 0){
		      $insert = mysqli_query($con, $INSERTA_ASPIRANTE) or die(mysqli_connect_error());
		      if($insert){
		        echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido guardados con éxito.</div>';
		      }
            else{
		        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
		      }
		  }
          else{
		    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. CURP exite!</div>';
		  }

?>