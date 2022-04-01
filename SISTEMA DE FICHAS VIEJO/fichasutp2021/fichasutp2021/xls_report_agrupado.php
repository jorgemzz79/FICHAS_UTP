<?php
//
header("Pragma: public");
header("Expires: 0");
$filename = "reporte.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
//
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

	<div class="container">
		<div class="content">

			<?php
            if (!empty($_POST)){
            $parametro = $_POST["keywords"];
            }
            else{
            $parametro = "";
            }
             $query_utf8 = $con->set_charset("utf8mb4");
			?>
	

			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
                    <th>ID</th>
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
				if($parametro != ""){
				$consulta = "SELECT * FROM aspirantes WHERE curp='$parametro' or apaterno like \"%".$parametro."%\" or amaterno like \"%".$parametro."%\" or nombres like \"%".$parametro."%\" ORDER BY id DESC ";
					$sql = mysqli_query($con,$consulta);

				}else{
					$sql = mysqli_query($con, "SELECT * FROM aspirantes ORDER BY carrera");
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
