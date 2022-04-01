<?php
/*/
header("Pragma: public");
header("Expires: 0");
$filename = "reporte.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
/*/
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Datos del aspirante</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style_nav.css" rel="stylesheet">

	<style>
		.content {
			margin-top: 80px;
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
	</style>

</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<?php include('nav.php');?>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Lista de aspirantes</h2>
			<hr />

			<?php
if (!empty($_POST)){
$parametro = $_POST["keywords"];
}
else{
$parametro = "";
}
 $query_utf8 = $con->set_charset("utf8mb4");
			if(isset($_GET['aksi']) == 'delete'){
				// escaping, additionally removing everything that could be (html/javascript-) code
				$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));

				$cek = mysqli_query($con, "SELECT * FROM aspirantes WHERE curp='$nik'");
				echo $cek;
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
				}else{
					$delete = mysqli_query($con, "DELETE FROM aspirantes WHERE curp='$nik'");
					if($delete){
						echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Datos eliminado correctamente.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
					}
				}
			}
			?>
<form action="registros_basico.php" method="POST">
Buscar por nombre o CURP
<input type="text" id="keywords" name="keywords" size="30" maxlength="30">
<input type="submit" name="search" id="search" value="Buscar">
</form>
<div align= "center">
<form  action="xls_report.php" method="post"> 
<input  type=hidden id="keywords2" name="keywords" value = "<?php echo $parametro;?>">
<input class = "boton_2" type="submit" value="GENERAR EXCEL"> 
</form> 
<br>
<form action="xls_report_agrupado.php" method="post"> 
<input type=hidden id="keywords2" name="keywords" value = "<?php echo $parametro;?>">
<input class = "boton_1" type="submit" value="GENERAR EXCEL (POR CARRERA)"> 
</form> 
	</div>	
			<br />
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
                    <th>MATRICULA</th>
					<th>CURP</th>
					<th>NOMBRES</th>
                    <th>APELLIDO PATERNO</th>
                    <th>APELLIDO MATERNO</th>
					<th>CELULAR</th>
					<th>TELEFONO ALTERNO</th>
                    <th>TELEFONO CASA</th>
					<th>COLONIA</th>
					<th>CALLE</th>
					
					<th>NUMERO</th>
					<th>TIPO DE SANGRE</th>
					<th>GENERO</th>
                    <th>CORREO</th>
                    <th>ESTADO CIVIL</th>
					<th>HIJOS</th>
					<th>ETNIA</th>
                    <th>DISCAPACIDAD</th>
					<th>ESPECIFICACION DE DISCAPACIDAD</th>
					<th>FECHA DE NACIMIENTO</th>
					
					<th>ID ESTADO NACIMIENTO</th>
					<th>ESTADO NACIMIENTO</th>
					<th>ID MUNICIPIO DE NACIMIENTO</th>
                    <th>MUNICIPIO DE NACIMIENTO</th>
                    <th>ID ESTADO PREPARATORIO</th>
					<th>ESTADO PREPARATORIA</th>
					<th>ID MUNICIPIO PREPARATORIA</th>
                    <th>MUNICIPIO PREPARATORIA</th>
					<th>PREPARATORIA</th>
					<th>CARRERA ELEJIDA</th>
					
					<th>2da OPCION CARRERA ELEJIDA</th>
					<th>TURNO</th>
					<th>FECHA DE REGISTRO</th>
					<th>REFERENCIA BANCARIA</th>
                    <th>FECHA DE PAGO</th>
                    <th>FORMA DE PAGO</th>
					<th>VENTANILLA O PRACTICAJA</th>
					
	
				</tr>
				<?php
				$var1 = "%";
				if($parametro != ""){
				$consulta = "SELECT * FROM aspirantes WHERE curp='$parametro' or apaterno like \"%".$parametro."%\" or amaterno like \"%".$parametro."%\" or nombres like \"%".$parametro."%\" ORDER BY id DESC ";
					echo $consulta;
					$sql = mysqli_query($con,$consulta);

				}else{
					$sql = mysqli_query($con, "SELECT * FROM aspirantes ORDER BY id DESC");
				}
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">No hay datos.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
						    <td>'."82021".$row['id'].'</td>
							<td>'.$row['curp'].'</td>
							<td>'.$row['nombres'].'</td>
                            <td>'.$row['apaterno'].'</td>
                            <td>'.$row['amaterno'].'</td>
							<td>'.$row['celular'].'</td>
                            <td>'.$row['telefono_alterno'].'</td>
							<td>'.$row['telefono'].'</td>
							<td>'.$row['colonia'].'</td>
                            <td>'.$row['calle'].'</td>
                            
							<td>'.$row['numero'].'</td>
							<td>'.$row['sangre'].'</td>
                            <td>'.$row['genero'].'</td>
                            <td>'.$row['correo'].'</td>
							<td>'.$row['ecivil'].'</td>
                            <td>'.$row['hijos'].'</td>
							<td>'.$row['etnia'].'</td>
							<td>'.$row['discapacidad'].'</td>
                            <td>'.$row['especifique_discapacidad'].'</td>
                            <td>'.$row['fnacimiento'].'</td>
                            
							<td>'.$row['enacimiento'].'</td>
                            <td>'.$row['estado_nacimiento'].'</td>
                            <td>'.$row['cnacimiento'].'</td>
							<td>'.$row['municipio_nacimiento'].'</td>
                            <td>'.$row['eprocedencia'].'</td>
							<td>'.$row['estado_preparatoria'].'</td>
							<td>'.$row['cprocedencia'].'</td>
                            <td>'.$row['municipio_preparatoria'].'</td>
                            <td>'.$row['preparatoria'].'</td>
							<td>'.$row['carrera'].'</td>
							
                            <td>'.$row['2carrera'].'</td>
                            <td>'.$row['turno'].'</td>
							<td>'.$row['fecha_registro'].'</td>
                            <td>'.$row['rfc'].'</td>
							<td>'.$row['fecha_pago'].'</td>
							<td>'.$row['forma_pago'].'</td>
                            <td>'.$row['especifique_ventanilla_practicaja'].'</td>
                            
                            
						
						</tr>
						';
						$no++;
					}
				}
				?>
			</table>
			</div>
		</div>
	</div><center>
	<p>&copy; SISTEMAS UTP JORGE MUNOZ<?php echo date("Y");?></p
		</center>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
