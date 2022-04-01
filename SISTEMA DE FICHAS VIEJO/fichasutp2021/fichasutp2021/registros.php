<?php
/*/header("Pragma: public");
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
<form action="registros.php" method="POST">
Palabras clave
<input type="text" id="keywords" name="keywords" size="30" maxlength="30">
<input type="submit" name="search" id="search" value="Buscar">
</form>
		
			<br />
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
                    			<th>ID</th>
					<th>CURP</th>
					<th>NOMBRES</th>
                    			<th>APELLIDO PATERNO</th>
                    			<th>APELLIDO MATERNO</th>
					<th>TIPO SANGRE</th>
					<th>SEXO</th>
					<th>ESTADO CIVIL</th>
                    			<th>FECHA DE NACIMINETO</th>
					<th>ESTADO DE NACIMIENTO</th>
					<th>MUNICIPIO DE NACIMIENTO</th>
                    			<th>CALLE</th>
                    			<th>NUMERO</th>
					<th>COLONIA</th>
					<th>TELEFONO</th>
					<th>CELULAR</th>
                    			<th>ESTADO DE PREPARATORIA</th>
                    			<th>MUNICIPIO DE PREPARATORIA</th>
                    			<th>PREPARATORIA</th>
					<th>CARRERA</th>
					<th>TURNO</th>
					
					<th>Acciones</th>
				</tr>
				<?php
				if($parametro != ""){
				$consulta = "SELECT * FROM aspirantes WHERE curp='$parametro' ORDER BY id DESC ";
					$sql = mysqli_query($con,$consulta);

				}else{
					$sql = mysqli_query($con, "SELECT * FROM aspirantes ORDER BY id DESC ");
				}
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">No hay datos.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$row['curp'].'</td>
							<td><a href="profile.php?nik='.$row['curp'].'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$row['nombres'].'</a></td>
                            				<td>'.$row['apaterno'].'</td>
                            				<td>'.$row['amaterno'].'</td>
							<td>'.$row['sangre'].'</td>
                            				<td>'.$row['genero'].'</td>
							<td>'.$row['ecivil'].'</td>

							<td>'.$row['fnacimiento'].'</td>
                            			<td>'.$row['enacimiento'].'</td>
						<td>'.$row['cnacimiento'].'</td>
							<td>'.$row['calle'].'</td>
                            				<td>'.$row['numero'].'</td>
							<td>'.$row['colonia'].'</td>
							<td>'.$row['telefono'].'</td>
                            				<td>'.$row['celular'].'</td>


							<td>'.$row['eprocedencia'].'</td>
                            				<td>'.$row['cprocedencia'].'</td>
							<td>'.$row['preparatoria'].'</td>
							<td>'.$row['carrera'].'</td>
                            				<td>'.$row['turno'].'</td>
							<td>

							<a href="edit.php?nik='.$row['curp'].'" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
							<a href="index.php?aksi=delete&nik='.$row['curp'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '.$row['nombres'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
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
