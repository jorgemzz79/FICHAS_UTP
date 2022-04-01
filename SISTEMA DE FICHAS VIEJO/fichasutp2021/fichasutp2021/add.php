<?php
include("conexion.php");
include("conexion0.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UT|Parral</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-datepicker.css" rel="stylesheet">
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

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
</head>

<body>

    <script>
        function obtenerCiudades(val) {
            $.ajax({
                type: "POST",
                url: "get_ciudad.php",
                data: 'id_pais=' + val,
                success: function(data) {
                    $("#lista_ciudades").html(data);
                }
            });
        }

        function obtenerCiudades2(val) {
            $.ajax({
                type: "POST",
                url: "get_ciudad.php",
                data: 'id_pais=' + val,
                success: function(data) {
                    $("#lista_ciudades2").html(data);
                }
            });
        }

    </script>


    <nav class="navbar navbar-default navbar-fixed-top">
        <?php include("nav.php");?>
    </nav>
    <div class="container">
        <div class="content">
            <h2>Datos del aspirante &raquo; Agregar datos</h2>
            <hr />


            <?php
            $query_utf8 = $con->set_charset("utf8mb4");
             
            
			$consulta_paises   = $con2->query("select clave as 'valor', nombre as 'descripcion' from estados order by clave");
			$consulta_ciudades = $con2->query("select estado_id as 'valor', nombre as 'descripcion' from municipios order by clave");
				$consulta_preparatorias   = $con->query("select nombre as 'nombre' from carreras");
				
				
			if(isset($_POST['username'])){
    			$REFERENCIA = $_POST["username"];
                $password = $_POST["password"]; 
            if($REFERENCIA == $password){
                $REFERENCIA = $_POST["username"];
                $password = $_POST["password"];  
                
                $FECHA_PAGO = $_POST["FECHA_PAGO"];  
                $FORMA_PAGO = $_POST["FORMA_PAGO"];  
                $ESPECIFIQUE_VENTANILLA_PRACTICAJA = $_POST["ESPECIFIQUE_VENTANILLA_PRACTICAJA"];  
                
                
            }
            else{
                $REFERENCIA = "Verifique su folio de transferencia ó número de operación";
            }
            
            }

		?>

            <form class="form-horizontal" action="profile.php" method="post">
                
            <h2>Folio de transferencia o número de operación</h2> <h2 style="color:#FF0000";><?php echo $REFERENCIA; ?></h2></p>  
            <br>
             <div class="form-group">
             <div class="col-sm-2">
                        <input type="hidden" name="REF" class="form-control" value="<?php echo $REFERENCIA; ?>">
                        
                        <input type="hidden" name="FECHA_PAGO" class="form-control" value="<?php echo $FECHA_PAGO; ?>">
                        <input type="hidden" name="FORMA_PAGO" class="form-control" value="<?php echo $FORMA_PAGO; ?>">
                        <input type="hidden" name="ESPECIFIQUE_VENTANILLA_PRACTICAJA" class="form-control" value="<?php echo $ESPECIFIQUE_VENTANILLA_PRACTICAJA; ?>">
            </div></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">CURP</label>
                    <div class="col-sm-2">
                        <input type="text" name="CURP" onkeyup="javascript:this.value=this.value.toUpperCase();" style="text-transform:uppercase;" class="form-control" placeholder="CURP" required>

                    </div>
                    <div class="col-1"></div><a href="https://www.gob.mx/curp/" target="_blank" class="btn btn-info">CURP</a>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">E-MAIL</label>
                    <div class="col-sm-4">
                        <input type="email" name="CORREO" class="form-control" placeholder="Correo electrónico" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nombres</label>
                    <div class="col-sm-4">
                        <input type="text" name="NOMBRES" onkeyup="javascript:this.value=this.value.toUpperCase();" style="text-transform:uppercase;"  class="form-control" placeholder="Nombres" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Apellido Paterno</label>
                    <div class="col-sm-4">
                        <input type="text" name="APATERNO" onkeyup="javascript:this.value=this.value.toUpperCase();" style="text-transform:uppercase;" class="form-control" placeholder="Apellido Paterno" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Apellido Materno</label>
                    <div class="col-sm-4">
                        <input type="text" name="AMATERNO" onkeyup="javascript:this.value=this.value.toUpperCase();" style="text-transform:uppercase;" class="form-control" placeholder="Apellido Materno" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Tipo de sangre</label>
                    <div class="col-sm-3">
                        <select name="SANGRE" class="form-control" required>
                            <option value=""> SELECCIONE </option>
                            <option value="A+">A+</option>
                            <option value="B+">B+</option>
                            <option value="A-">A-</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="NO_RECUERDO">NO RECUERDO-</option>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-3 control-label">Sexo</label>
                    <div class="col-sm-3">
                        <select name="GENERO" class="form-control" required>
                            <option value=""> Seleccione </option>
                            <option value="Hombre">Hombre</option>
                            <option value="Mujer">Mujer</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Estado civil</label>
                    <div class="col-sm-3">
                        <select name="ECIVIL" class="form-control" required>
                            <option value="DESCONOCIDO"> DESCONOCIDO </option>
                            <option value="CASADO/A">CASADO/A</option>
                            <option value="DIVORCIADO/A">DIVORCIADO/A</option>
                            <option value="VIUDO/A">VIUDO/A</option>
                            <option value="UNIÓN LIBRE">UNIÓN LIBRE</option>
                            <option value="SOLTERO/A">SOLTERO/A</option>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-3 control-label">Fecha de nacimiento</label>
                    <div class="col-sm-4">
                        <input type="text" name="FNACIMIENTO" class="input-group date form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-aaaa" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Estado de nacimiento</label>
                    <div class="col-sm-3">

                        <select name="ENACIMIENTO" class="form-control" id="lista_paises" onChange="obtenerCiudades(this.value);" required>
                            <option value=''>Seleccionar estado</option>
                            <?php
                         	while($row= $consulta_paises->fetch_object())
							{
								echo "<option value='".$row->valor."'>".utf8_encode($row->descripcion)."</option>";
							}
						?>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-3 control-label">Municipio de nacimiento</label>
                    <div class="col-sm-3">
                        <select name="CNACIMIENTO" id="lista_ciudades" class="form-control" required>
                            <option value=''>Seleccionar municipio</option>
                            <?php
                   			while($row= $consulta_ciudades->fetch_object())
							 {
								echo "<option value='".$row->valor."'>".utf8_encode($row->descripcion)."</option>";
							 }
						?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-3 control-label">Cuentas con alguna discapacidad</label>
                    <div class="col-sm-3">
                        <select name="DISCAPACIDAD" class="form-control" required>
                            <option value=""> Seleccione </option>
                            <option value="SI">Si</option>
                            <option value="NO">No</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">En caso de ser SI, específica</label>
                    <div class="col-sm-3">
                        <input type="text" name="ESPECIFIQUE_DISCAPACIDAD" onkeyup="javascript:this.value=this.value.toUpperCase();" style="text-transform:uppercase;" class="form-control" placeholder="Especifique">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Perteneces a una etnia indígena</label>
                    <div class="col-sm-3">
                        <select name="ETNIA" class="form-control" required>
                            <option value=""> Seleccione </option>
                            <option value="SI">Si</option>
                            <option value="NO">No</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Si eres papá o mamá cuantos hijos tienes</label>
                    <div class="col-sm-3">
                        <input type="number" name="HIJOS" onkeyup="javascript:this.value=this.value.toUpperCase();" style="text-transform:uppercase;" class="form-control" placeholder="Especifique">
                    </div>
                </div>
     
     

                <H3>DOMICILIO ACTUAL</H3>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Calle</label>
                    <div class="col-sm-3">
                        <input type="text" name="CALLE" onkeyup="javascript:this.value=this.value.toUpperCase();" style="text-transform:uppercase;" class="form-control" placeholder="Calle" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Número</label>
                    <div class="col-sm-3">
                        <input type="text" name="NUMERO" onkeyup="javascript:this.value=this.value.toUpperCase();" style="text-transform:uppercase;" class="form-control" placeholder="Número" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Colonia</label>
                    <div class="col-sm-3">
                        <input type="text" name="COLONIA" onkeyup="javascript:this.value=this.value.toUpperCase();" style="text-transform:uppercase;" class="form-control" placeholder="Colonia" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Teléfono fijo</label>
                    <div class="col-sm-3">
                        <input type="number" name="TELEFONO"  class="form-control" placeholder="Dato no obligatorio">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Celular</label>
                    <div class="col-sm-3">
                        <input type="number" name="CELULAR" class="form-control" placeholder="Número celular" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-3 control-label">Teléfono alterno</label>
                    <div class="col-sm-3">
                        <input type="number" name="ALTERNO" class="form-control" placeholder="Puede ser de algún familiar" required>
                    </div>
                </div>

                <H3>ESCUELA DE PROCEDENCIA</H3>
                <?php
                $query_utf8 = $con2->set_charset("utf8mb4");
				$consulta_paises   = $con2->query("select clave as 'valor', nombre as 'descripcion' from estados order by clave");
				$consulta_ciudades = $con2->query("select estado_id as 'valor', nombre as 'descripcion' from municipios order by clave");
				$consulta_carreras  = $con->query("select nombre as 'nombre_carrera' from carreras");
				$consulta_carreras2  = $con->query("select nombre as 'nombre_carrera' from carreras");
				$consulta_preparatorias  = $con->query("select nombre as 'nombre_preparatoria' from preparatoria");
			?>



                <div class="form-group">
                    <label class="col-sm-3 control-label">Estado</label>
                    <div class="col-sm-3">

                        <select name="EPROCEDENCIA" class="form-control" id="lista_paises" onChange="obtenerCiudades2(this.value);" required>
                            <option value=''>Seleccionar estado</option>
                            <?php

							while($row= $consulta_paises->fetch_object())
							{
								echo "<option value='".$row->valor."'>".$row->descripcion."</option>";
							}
						?>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-3 control-label">Municipio</label>
                    <div class="col-sm-3">
                        <select name="CPROCEDENCIA" id="lista_ciudades2" class="form-control" required>
                            <option value=''>Seleccionar municipio</option>
                            <?php
							while($row= $consulta_ciudades->fetch_object())
						   {
							  echo "<option value='".$row->valor."'>".$row->descripcion."</option>";
						   }
						?>
                        </select>
                    </div>
                </div>




                <div class="form-group">
                    <label class="col-sm-3 control-label">Preparatoria</label>
                    <div class="col-sm-3">

                        <select name="PREPARATORIA" class="form-control" id="lista_preparatoria" required>
                            <option value=''>Seleccionar preparatoria</option>
                            <?php
						while($row= $consulta_preparatorias->fetch_object())
						{
							echo "<option value='".$row->nombre_preparatoria."'>".$row->nombre_preparatoria."</option>";
						}
					?>
                        </select>
                    </div>
                </div>

                <H3>CARRERA SELECCIONADA</H3>


                <div class="form-group">
                    <label class="col-sm-3 control-label">Carrera a elegir</label>
                    <div class="col-sm-3">

                        <select name="CARRERA" class="form-control" id="carrera_seleccionada" required>
                            <option value=''>Seleccionar carrera</option>
                            <?php
							while($row= $consulta_carreras2->fetch_object())
							{
								echo "<option value='".$row->nombre_carrera."'>".$row->nombre_carrera."</option>";
							}
						?>
                        </select>
                    </div>
                </div>

<H3>CARRERA ALTERNATIVA</H3>


                <div class="form-group">
                    <label class="col-sm-3 control-label">Carrera a elegir</label>
                    <div class="col-sm-3">

                        <select name="2CARRERA" class="form-control" id="2carrera_seleccionada">
                            <option value=''>Seleccionar carrera</option>
                            <?php
							while($row= $consulta_carreras->fetch_object())
							{
								echo "<option value='".$row->nombre_carrera."'>".$row->nombre_carrera."</option>";
							}
						?>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-3 control-label">Turno</label>
                    <div class="col-sm-3">
                        <select name="TURNO" class="form-control" required>
                            <option value=""> Seleccione </option>
                            <option value="Escolarizado">Escolarizado</option>
                            <option value="Despresurizado">Despresurizado</option>
                            <option value="Escolarizado">Balleza</option>
                            <option value="otro">otro</option>
                        </select>
                    </div>
                </div>


                <!-- Optional JavaScript -->
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
                <div class="form-group">
                    <label class="col-sm-3 control-label">&nbsp;</label>
                    <div class="col-sm-6">
                        <input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
                        <a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script>
        $('.date').datepicker({
            format: 'dd-mm-yyyy',
        })

        function ShowSelected() {
            <?php
		$busca_estado="SELECT nombre FROM municipios  WHERE clave = $id";
		 $resultado=$con ->query($busca_estado);
		 while($fila=mysqli_fetch_array($resultado)){
			 $nombre=($fila['nombre']);
			 echo $nombre;
		 }
		?>
            alert("<?php echo "ok"; ?>");
        }

    </script>



</body>

</html>
