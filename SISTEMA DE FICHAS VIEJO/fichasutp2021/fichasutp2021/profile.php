<?php
include("conexion.php");
include("conexion0.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<style>
.btn {
  border: none;
  color: white;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
}

.boton_1{
    text-decoration: none;
    padding: 3px;
    padding-left: 20px;
    padding-right: 20px;
    font-family: helvetica;
    font-weight: 300;
    font-size: 25px;
    font-style: italic;
    color: #fff;
    background-color: #c91812;
    border-radius: 15px;
    border: 3px double #006505;
  }
  .boton_1:hover{
    opacity: 0.6;
    text-decoration: none;
  }  
  .boton_2{
    text-decoration: none;
    padding: 3px;
    padding-left: 20px;
    padding-right: 20px;
    font-family: helvetica;
    font-weight: 300;
    font-size: 25px;
    font-style: italic;
    color: #fff;
    background-color: #82b085;
    border-radius: 15px;
    border: 3px double #006505;
  }
  .boton_2:hover{
    opacity: 0.6;
    text-decoration: none;
  } 
   .boton_3{
    text-decoration: none;
    padding: 3px;
    padding-left: 20px;
    padding-right: 20px;
    font-family: helvetica;
    font-weight: 300;
    font-size: 25px;
    font-style: italic;
    color: #fff;
    background-color: #c91812;
    border-radius: 15px;
    border: 3px double #006505;
  }
  .boton_3:hover{
    opacity: 0.6;
    text-decoration: none;
  } 
.success {background-color: #4CAF50;} /* Green */
.success:hover {background-color: #46a049;}

.info {background-color: #2196F3;} /* Blue */
.info:hover {background: #0b7dda;}

.warning {background-color: #ff9800;} /* Orange */
.warning:hover {background: #e68a00;}

.danger {background-color: #f44336;} /* Red */ 
.danger:hover {background: #da190b;}

.default {background-color: #e7e7e7; color: black;} /* Gray */ 
.default:hover {background: #ddd;}
</style>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FICHA DEL ASPIRANTE</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style_nav.css" rel="stylesheet">
	<style>
		.content {
			margin-top: 80px;
		}
	</style>

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<?php include("nav.php");?>

		<?php

			include("conexion.php");
 $query_utf8 = $con->set_charset("utf8mb4");
		if(isset($_POST['add'])){
		    
		$FECHA_PAGO = $_POST["FECHA_PAGO"];
        $FORMA_PAGO = $_POST["FORMA_PAGO"];
        $ESPECIFIQUE_VENTANILLA_PRACTICAJA = $_POST["ESPECIFIQUE_VENTANILLA_PRACTICAJA"];
        
        
        $DISCAPACIDAD = $_POST["DISCAPACIDAD"];
        $ESPECIFIQUE_DISCAPACIDAD = $_POST["ESPECIFIQUE_DISCAPACIDAD"];
        $ETNIA = $_POST["ETNIA"];
        $HIJOS = $_POST["HIJOS"];
        $ALTERNO = $_POST["ALTERNO"];
        
        
		$CURP = $_POST["CURP"];
		$RFC = $_POST["REF"];
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
		$CARRERA2 = $_POST["2CARRERA"];
		$TURNO = $_POST["TURNO"];
		$CORREO = $_POST["CORREO"];

		$INSERTA_ASPIRANTE = "INSERT INTO `aspirantes` (
		`fecha_pago`,
		`forma_pago`,
		`especifique_ventanilla_practicaja`,
		
		`discapacidad`,
		`especifique_discapacidad`,
		`etnia`,
		`hijos`,
		`telefono_alterno`,
		
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
		`2carrera`,
		`turno`,
		`correo`)
		VALUES (
		'".$FECHA_PAGO."',
		'".$FORMA_PAGO."',
		'".$ESPECIFIQUE_VENTANILLA_PRACTICAJA."',


        '".$DISCAPACIDAD."',
		'".$ESPECIFIQUE_DISCAPACIDAD."',
		'".$ETNIA."',
		'".$HIJOS."',
		'".$ALTERNO."',
		
		
		'".$CURP."',
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
		'".$CARRERA2."',
		'".$TURNO."',
		'".$CORREO."');";


		  $cek = mysqli_query($con, "SELECT * FROM aspirantes WHERE curp='$CURP'");
		  if(mysqli_num_rows($cek) == 0){
		      $insert = mysqli_query($con, $INSERTA_ASPIRANTE) or die(mysqli_error());
		      if($insert){
						$nik = $CURP;
		        echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido guardados con éxito.</div>';
		      }else{
		        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
		      }

		  }else{
		    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. CURP exite!</div>';
		  }
		}
		?>
	</nav>
	<div class="container">
		<div class="content">
			<h4>Datos del aspirante &raquo; Perfil</h4>
			<hr />
<p >La Universidad Tecnológica de Parral con domicilio en Avenida General Jesús Lozoya Solís km. 0.931, Colonia Paseos del Almanceña, C.P. 33827 da a conocer a los usuarios el siguiente aviso de privacidad, en cumplimiento a lo dispuesto en el artículo 67 de la Ley de Protección de Datos Personales del Estado de Chihuahua.
    La finalidad para la cual serán recabados sus datos personales es para integrar una base de datos de alumnos potenciales de conformidad con lo dispuesto en el artículo 15 del reglamento académico de estudiantes de la UTP, los cuales conformarán una base de datos para darle el oportuno seguimiento al programa de promoción y captación de alumnos y alumnas. Se recabarán datos personales como: nombre completo, fecha de nacimiento, domicilio particular, correo electrónico y teléfonos. El titular de los datos podrá ejercer sus Derechos de Acceso, Rectificación, Cancelación, Oposición y Portabilidad de Datos Personales, así como negativa al tratamiento de sus datos, ante la Unidad de Transparencia con domicilio en Avenida General Jesús Lozoya Solís.
    </p>
			<?php
			// escaping, additionally removing everything that could be (html/javascript-) code

$consulta = "SELECT * FROM aspirantes WHERE curp='$nik'";
			$sql = mysqli_query($con, $consulta);
			if(mysqli_num_rows($sql) == 0){
				//header("Location: add.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}

			if(isset($_GET['aksi']) == 'delete'){
				$delete = mysqli_query($con, "DELETE FROM aspirantes WHERE curp='.$nik.'");
				if($delete){
					echo '<div class="alert alert-danger alert-dismissable">><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil dihapus.</div>';
				}else{
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal dihapus.</div>';
				}
			}
		$estado_nacimiento = $row['enacimiento'];
		$municipio_nacimiento =	$row['cnacimiento'];
		
		$estado_prepa = $row['eprocedencia'];
		$municipio_prepa =	$row['cprocedencia'];
		
			$consulta_estado   = "select clave as 'valor', nombre as 'nombre' from estados where clave like '" .$estado_nacimiento. "'";
		    $consulta_municipio = "select estado_id as 'valor', nombre as 'nombre' from municipios where clave like '" .$municipio_nacimiento. "' and estado_id like " .$estado_nacimiento. "";
		    
		    $consulta_estado_prepa   = "select clave as 'valor', nombre as 'nombre' from estados where clave like '" .$estado_prepa. "'";
		    $consulta_municipio_prepa = "select estado_id as 'valor', nombre as 'nombre' from municipios where clave like '" .$municipio_prepa. "' and estado_id like " .$estado_prepa. "";

			$sql2 = mysqli_query($con2, $consulta_estado);
			if(mysqli_num_rows($sql2) == 0){
			}else{
				$row2 = mysqli_fetch_assoc($sql2);
			}
			
			$sql3 = mysqli_query($con2, $consulta_municipio);
			if(mysqli_num_rows($sql3) == 0){
			}else{
				$row3 = mysqli_fetch_assoc($sql3);
			}
			
			$sql4 = mysqli_query($con2, $consulta_estado_prepa);
			if(mysqli_num_rows($sql4) == 0){
			}else{
				$row4 = mysqli_fetch_assoc($sql4);
			}
			
			$sql5 = mysqli_query($con2, $consulta_municipio_prepa);
			if(mysqli_num_rows($sql5) == 0){
			}else{
				$row5 = mysqli_fetch_assoc($sql5);
			}
		    $COMPLETA_INFO = "UPDATE aspirantes SET estado_nacimiento = '".$row2['nombre']."', municipio_nacimiento = '".$row3['nombre']."',estado_preparatoria = '".$row4['nombre']."',municipio_preparatoria = '".$row5['nombre']."' WHERE curp ='".$CURP."'";
			$insert = mysqli_query($con, $COMPLETA_INFO) or die(mysqli_error());
			?>
			
			

			<table class="table table-striped table-condensed">
			    <tr>
					<td><h4>Datos Personales</h4><td>
					
				</tr>
				<tr>
					<th width="20%">CURP</th>
					<td><?php echo $row['curp']; ?></td>
				</tr>
				<tr>
					<th>Nombre</th>
					<td><?php echo $row['nombres'];?></td>
				</tr>
				<tr>
					<th>Apellido Paterno</th>
					<td><?php echo $row['apaterno'];?></td>
				</tr>
				<tr>
					<th>Apellido Materno</th>
					<td><?php echo $row['amaterno'];?></td>
				</tr>
				<tr>
					<th>Fecha de Nacimiento</th>
					<td><?php echo $row['fnacimiento']; ?></td>
				</tr>
				<tr>
					<th>Estado/Municipio</th>
					<td><?php echo $row2['nombre'].', '.$row3['nombre']; ?></td>
				
				</tr>
				<tr>
					<th>Discapacidad</th>
					<td><?php echo $row['discapacidad'].', '.$row['especifique_discapacidad']; ?></td>
				</tr>
				
				<tr>
					<th>Pertenece a una etnia indigena</th>
					<td><?php echo $row['etnia']; ?></td>
				</tr>
				<tr>
					<th>Si es papá o mamá cuantos hijos tiene</th>
					<td><?php echo $row['hijos']; ?></td>
				</tr>

				<tr>
					<th>Teléfono alterno</th>
					<td><?php echo $row['telefono_alterno']; ?></td>
				</tr>
				<tr>
					<th>celular</th>
					<td><?php echo $row['celular']; ?></td>
				</tr>
				<tr>
					<th>Domicilio</th>
					<td><?php echo $row['calle'].', '.$row['numero'].' , '.$row['colonia'];?></td>
				</tr>
				<tr>
				
					<td><h4>Información Escolar</h4><td>
					
				</tr>
				<tr>
					<th>Escuela</th>
					<td><?php echo $row['preparatoria']; ?></td>
				</tr>
				<tr>
					<th>Estado</th>
					<td><?php echo $row4['nombre']; ?></td>
				</tr>
				<tr>
					<th>Municipio</th>
					<td><?php echo $row5['nombre']; ?></td>
				</tr>
				<tr>
					<th>Carrera a la que aspira</th>
					<td><?php echo $row['carrera']; ?></td>
				</tr>
				<tr>
					<th>Turno</th>
					<td><?php echo $row['turno']; ?></td>
				</tr>
				<tr>
					<th>Información de pago</th>
					<td><?php echo $row['fecha_pago'] ." / ". $row['forma_pago']." / ". $row['especifique_ventanilla_practicaja'] ; ?></td>
				</tr>
				
				<tr>
					<th><h3 style="color:#FF0000">Matrícula:</h3></th>
					<td><h2><?php echo "<h3>" . "82021" . $row['id']. "</h3>"; ?></h2></td>
					</td>
				</tr>
				

			</table>

 <b><FONT SIZE=6 style="color:#dab41a">En el siguiente botón encontraras la información para el seguimiento y registro del CENEVAL:</FONT></b>
<br>
	<br>
	<div align='center'>
	<img src="res/ceneval.png"><br><br><br>
    <a class="boton_1" type="submit" href="res/GUIA_CENEVAL_PDF.pdf" target = "blank">GUIA CENEVAL PDF</a>
    <br><br><br><br>
    <img src="res/ficha.png"><br><br><br>
    <button class="boton_2" name="Imprimir" value="Imprimir" onclick="window.print();">IMPRIMIR FICHA</button>
    </div><br><br><br>
<div align='center'>
  <b><FONT SIZE=7 style="color:#dab41a">Tienes dudas:</FONT></b>
<br><b>
  Comunícate a Servicios Escolares<br>
  627 118 64 00 ext. 211  de lunes a viernes de 9:00 a 15:00 HRS<br>
  Correo: escolares@utparral.edu.mx</b><br><br>
<div>
</font>
		<br>
    <a class="boton_3" type="submit" href="index.php" target = "blank">Regresar</a>
        <BR>
        			</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
 
    <script>window.print();</script>
</body>
</html>
