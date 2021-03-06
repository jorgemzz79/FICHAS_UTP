
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Registro de Aspirantes</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/display-1.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


    
    </head>
    <?php include("conexion.php"); ?>


    <body class="bg-light bg-gradient"> 

    <script type = "text/javascript">
        var  ESTADO_ESCUELA_PROCEDENCIA;

        function obtenerCiudades(val) {
            console.log("ESTE ES EL VALOR: " + val);
            $.ajax({
                type: "POST",
                url: "get_ciudad.php",
                data: 'id_pais=' + val,
                success: function(data) {
                    $("#xMunicipioDomicilio").html(data);
                }
            });
        }

        function obtenerEstadoNAcimiento(val) {
            console.log("ESTE ES EL VALOR: " + val);
            $.ajax({
                type: "POST",
                url: "get_ciudad.php",
                data: 'id_pais=' + val,
                success: function(data) {
                    $("#xMunicipioNacimiento").html(data);
                }
            });
        }

        function obtenerEstadoEscuelaProcedencia(val) {

              ESTADO_ESCUELA_PROCEDENCIA = val;
            console.log("ESTADO_ESCUELA_PROCEDENCIA " + ESTADO_ESCUELA_PROCEDENCIA);
            console.log("ESTE ES EL VALOR: " + val);
            $.ajax({
                type: "POST",
                url: "get_ciudad.php",
                data: 'id_pais=' + val,
                success: function(data) {
                    $("#xMunicipio").html(data);
                }
            });
        }

        function obtenerCarrera(val) {
            console.log("ESTE ES EL VALOR: " + val);
            $.ajax({
                type: "POST",
                url: "get_carreras.php",
                data: 'id_pais=' + val,
                success: function(data) {
                    $("#xcarr").html(data);
                }
            });
        }
        
        function obtenerCarrera2(val) {
            console.log("ESTE ES EL VALOR: " + val);
            $.ajax({
                type: "POST",
                url: "get_carreras2.php",
                data: 'id_pais=' + val,
                success: function(data) {
                    $("#xcarr2").html(data);
                }
            });
        }

        function obtenerNombreEscuelaProcedencia(val) {
            var MUNICIPIO = val;
            console.log("MUNICIPIO " + MUNICIPIO);
            console.log("ESTADO_ESCUELA_PROCEDENCIA : " + ESTADO_ESCUELA_PROCEDENCIA);
            $.ajax({
                type: "POST",
                url: "get_escuelas.php",
                data: {'ESTADO' : ESTADO_ESCUELA_PROCEDENCIA , 'MUNICIPIO' : MUNICIPIO},
                success: function(data) {
                    $("#xCveEscProcedencia").html(data);
                }
            });
        }

    </script>

                <?php
                $consulta_paises   = $con->query("select cve_estado as 'valor', nombre as 'descripcion' from estados order by cve_estado");
                $consulta_estado_nacimiento = $con->query("select cve_estado as 'valor', nombre as 'descripcion' from estados order by cve_estado");
                $consulta_estado_procedencia = $con->query("select cve_estado as 'valor', nombre as 'descripcion' from estados order by cve_estado");
                $consulta_unidad_academica = $con->query("select cve_unidad_academica as 'valor', nombre as 'descripcion' from unidades_academicas order by id");
                $consulta_unidad_academica2 = $con->query("select cve_unidad_academica as 'valor', nombre as 'descripcion' from unidades_academicas order by id");
				//$consulta_ciudades = $con2->query("select estado_id as 'valor', nombre as 'descripcion' from municipios order by clave");
                ?>
        <div class="container">         
            <div class="row">
                <div  class="col-md-12">
                    <center><img src="assets/images/logo.jpg"/></center>
                    <br/><br/>
                </div>
                <hr>
                <h1 class="display-5 text-center" >Registro de aspirante</h1>
                <div class="col-md-6 text-md-end text-lg-start textoCentrado">
                    <button type="button" class="btn btn-success " onClick="regresar()">Regresar</button>
                    <button type="button" id="btnImpPreficha" name="btnImpPreficha" class="btn btn-success " onClick="imprimir(23465)">Imprimir preficha</button>
                </div>
                <form name="forma" id="forma" action="php/datos.php" method="post" class="row g-3">
                    <hr>
                    <h1 class="display-5 text-center">Datos personales</h1>
                    <div class="col-md-4">
                        <label for="xNombre" class="form-label">Nombre:</label>                        
                        <input name="xNombre" id="xNombre" class="form-control" type="text" size="23" maxlength="60" value="" onKeyDown="this.value = this.value.toUpperCase()" onKeyUp="this.value = this.value.toUpperCase()">
                    </div>
                    <div class="col-md-4">
                        <label for="xApellidoPat" class="form-label">Apellido Paterno:</label>
                        <input name="xApellidoPat" id="xApellidoPat" class="form-control" type="text" size="23" maxlength="60" value="" onKeyDown="this.value = this.value.toUpperCase()" onKeyUp="this.value = this.value.toUpperCase()">
                    </div>
                    <div class="col-md-4">
                        <label for="xApellidoMat" class="form-label">Apellido materno:</label>
                        <input name="xApellidoMat" id="xApellidoMat" class="form-control" type="text" class="captura" size="23" maxlength="60" value="" onKeyDown="this.value = this.value.toUpperCase()" onKeyUp="this.value = this.value.toUpperCase()"></td>
                    </div>
                    <div class="col-md-4">
                        <label for="xFechaNac" class="form-label">Fecha de nacimiento:</label>           
                        <div class="input-group date">
                            <!--<input type="text" name="xFechaNac"  id="xFechaNac" class="form-control" size="20" maxlength="10" value="" readonly>-->
                            <input type="date"  name="xFechaNac"  id="xFechaNac" value="2000-01-01" min="1900-01-01" max="2010-12-31" class="form-control">
                        </div>
                    </div>                    
                    <div class="col-md-4">
                        <label for="xCURP" class="form-label">CURP:</label>
                        <input name="xCURP" id="xCURP" class="form-control" type="text" size="25" maxlength="18" value="" onKeyDown="this.value = this.value.toUpperCase()" onKeyUp="this.value = this.value.toUpperCase()"  onBlur="buscarPersonaByCurp(this.value);">                        
                    </div>                    
                    <div class="col-md-4">
                        <label for="optSexo" class="form-label">Sexo:</label>
                        <div class="form-check">
                             <input type="radio" class="form-check-input" value="M" name="optSexo" id="M">
                            <label class="form-check-label" for="optSexo"><b>M</b></label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="F" name="optSexo" id="F">
                        <label class="form-check-label" for="optSexo"><b>F</b></label>
                        </div>                            
                    </div>
                    <div class="col-md-4">
                        <label for="id_telefono" class="form-label">Tel??fono:</label>
                        <input type="text" id="id_telefono" name="id_telefono"
                               class="form-control" value=""
                               size="15" maxlength="50"
                               title="direccion de correo"/>
                    </div>
                    <div class="col-md-4">
                         <label for="id_mail" class="form-label">Correo electr??nico:</label>
                        <input type="text" id="id_mail" name="id_mail"
                            class="form-control" value=""
                            size="30" maxlength="50"
                            title="direccion de correo"/>      
                    </div>
                    <div class="col-md-4">&nbsp;</div>        
                    <div class="col-md-4">
                        <label for="xDiscapacidad" class="form-label">??Padeces alguna condici??n de salud especial?</label>
                        <select name="xDiscapacidad" id="xDiscapacidad" class="form-select" required>
                            <option value="" selected> Seleccione una opci??n . . . </option>
                            
                            <option value="Ninguna">Ninguna</option>
                            
                            <option value="Visual">Visual</option>
                            
                            <option value="Auditiva">Auditiva</option>
                            
                            <option value="Motriz">Motriz</option>
                            
                            <option value="Lenguaje y habla">Lenguaje y habla</option>
                            
                            <option value="Intelectual">Intelectual</option>
                            
                            <option value="Conductual">Conductual</option>
                            
                            <option value="Org??nica">Org??nica</option>
                            
                            <option value="M??ltiples">M??ltiples</option>
                            
                            <option value="Otra (especifique)"> Otra (especifique)</option>
                            
                        </select>
                    </div>
                    <div id="divDiscapacidadEspecifique" class="col-md-4 ">
                        <label for="xCalle" class="form-label">Otra (especifique):</label> 
                        <input type="text" name="xDiscapacidadEspecifique" id="xDiscapacidadEspecifique"  class="form-control"  >
                    </div>
                    <div class="col-md-4">
                        <label for="optSexo" class="form-label">??Te consideras de origen ind&iacute;gena?</label>
                        <div class="form-check">
                             <input type="radio" class="form-check-input" value="SI" name="optLenguaIndigena" id="optLenguaIndigena" >
                            <label class="form-check-label" for="optLenguaIndigena1"><b>Si</b></label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" value="NO" name="optLenguaIndigena" id="optLenguaIndigena" >
                        <label class="form-check-label" for="optLenguaIndigena2"><b>No</b></label>
                        </div> 
                    </div>    
                    <div id="divLenguaIndigena" class="col-md-4 ">
                        <label for="xLenguaIndigena" class="form-label">??Hablas alguna lengua ind&iacute;gena?</label>
                        <select name="xLenguaIndigena" id="xLenguaIndigena" class="form-select">
                            <option value="-1" selected> Seleccione una opci??n . . . </option>
                            
                            <option value="0">NO DEFINIDO</option>
                            
                            <option value="1">N??huatl</option>
                            
                            <option value="2">Maya</option>
                            
                            <option value="3">Amuzgo</option>
                            
                            <option value="4">Chatino</option>
                            
                            <option value="5">Chol</option>
                            
                            <option value="6">Chontal</option>
                            
                            <option value="7">Cora</option>
                            
                            <option value="8">Cuicateco</option>
                            
                            <option value="9">Huasteco</option>
                            
                            <option value="10">Huave</option>
                            
                            <option value="11">Huichol</option>
                            
                            <option value="12">Lenguas chinantecas</option>
                            
                            <option value="13">Lenguas mixtecas</option>
                            
                            <option value="14">Lenguas zapotecas</option>
                            
                            <option value="15">Mayo</option>
                            
                            <option value="16">Mazahua</option>
                            
                            <option value="17">Mazateco</option>
                            
                            <option value="18">Mixe</option>
                            
                            <option value="19">Otom??</option>
                            
                            <option value="20">Popoluca</option>
                            
                            <option value="21">Pur??pecha</option>
                            
                            <option value="22">Tarahumara</option>
                            
                            <option value="23">Tepehuano</option>
                            
                            <option value="24">Tlapaneco</option>
                            
                            <option value="25">Tojolabal</option>
                            
                            <option value="26">Totonaca</option>
                            
                            <option value="27">Tzeltal</option>
                            
                            <option value="28">Tzotzil</option>
                            
                            <option value="29">Yaqui</option>
                            
                            <option value="30">Zoque</option>
                            
                            <option value="31">Otras lenguas</option>
                            
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="xEstadoNacimiento" class="form-label">Estado de nacimiento:</label>
                        <select name="xEstadoNacimiento" id="xEstadoNacimiento" class="form-select"  onChange="obtenerEstadoNAcimiento(this.value);" required>
                        <!-------------------------------------------------------->
                        <?php
							while($row= $consulta_estado_nacimiento->fetch_object())
							{
								echo "<option value='".$row->valor."'>".$row->descripcion."</option>";
							}
						?>
                        <!-------------------------------------------------------->
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="xMunicipioNacimiento" class="form-label">Municipio de nacimiento:</label>
                        <select name="xMunicipioNacimiento" id="xMunicipioNacimiento" class="form-select" >
                            <!-------------------------------------------------------->
                            <?php
							include 'get_municipio.php';
						?>
                        <!-------------------------------------------------------->
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="xLocalidadNacimiento" class="form-label">Localidad de nacimiento:</label>    
                        <input type="text" name="xLocalidadNacimiento" id="xLocalidadNacimiento"  class="form-control" value="">
                    </div>
                    <hr>
                    <h1 class="display-5 text-center">Domicilio</h1> 
                     <div class="col-md-4">
                        <label for="xEstadoDomicilio" class="form-label">Estado:</label>
                        <select name="xEstadoDomicilio" id="xEstadoDomicilio" class="form-select"  onChange="obtenerCiudades(this.value);" required>
                        <!-------------------------------------------------------->
                        <?php
							while($row= $consulta_paises->fetch_object())
							{
								echo "<option value='".$row->valor."'>".$row->descripcion."</option>";
							}
						?>
                        <!-------------------------------------------------------->
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="xMunicipioDomicilio" class="form-label">Municipio:</label>
                        <select name="xMunicipioDomicilio" id="xMunicipioDomicilio" class="form-select" >
                            <!-------------------------------------------------------->
                            <?php
							include 'get_ciudad.php';
						?>
                        <!-------------------------------------------------------->
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="xAsentamiento" class="form-label">Colonia</label> 
                        <input type="text" name="xAsentamiento" id="xAsentamiento"  class="form-control"  size="80" maxlength="50" value="" onKeyDown="this.value = this.value.toUpperCase()" onKeyUp="this.value = this.value.toUpperCase()">
                    </div>
                    <div class="col-md-14">
                        <label for="xCalle" class="form-label">Calle - N??mero:</label> 
                        <input type="text" name="xCalle" id="xCalle"  class="form-control"  size="80" maxlength="150" value="" onKeyDown="this.value = this.value.toUpperCase()" onKeyUp="this.value = this.value.toUpperCase()">
                    </div>
                    <hr>
                    <h1 class="display-5 text-center">Escuela de procedencia</h1>
                    <div class="col-md-4">
                        <span></span>
                        <label for="xEstado" class="form-label">Estado:</label>
                        <select name="xEstado" id="xEstado" class="form-select"  onChange="obtenerEstadoEscuelaProcedencia(this.value);" required>
                        <!-------------------------------------------------------->
                        <?php
							while($row= $consulta_estado_procedencia->fetch_object())
							{
								echo "<option value='".$row->valor."'>".$row->descripcion."</option>";
							}
						?>
                        <!-------------------------------------------------------->
                        </select>
                    </div>
                    <div class="col-md-4">                        
                        <label for="xMunicipio" class="form-label">Municipio:</label>
                        <select name="xMunicipio" id="xMunicipio" class="form-select" onChange="obtenerNombreEscuelaProcedencia(this.value);" required>
                            <!-------------------------------------------------------->
                            <?php
							include 'get_ciudad.php';
						?>
                        <!-------------------------------------------------------->
                        </select>
                    </div>
                    <div class="col-md-4">                        
                        <label for="xCveEscProcedencia" class="form-label">Escuela:</label>
                        <select name="xCveEscProcedencia" id="xCveEscProcedencia" class="form-control">
                        <?php
							include 'get_escuelas.php';
						?>
                        </select>
                    </div>                        
                    <div class="col-md-4">                        
                        <label for="xCveEscProcedencia" class="form-label">Promedio:</label>
                        <input type="text" name="xPromedioBach" id="xPromedioBach"  class="form-control" size="8" maxlength="4" value=""  onblur="soloNumeros(this)">
                    </div>
                    <hr>
                    <h1 class="display-5 text-center">Elecci??n de la carrera de TSU</h1>                    
                    <div class="col-md-6">                        
                        <label for="xUnidadAcademica" class="form-label">Unidad acad&eacute;mica:</label>
                        <select name="xUnidadAcademica" id="xUnidadAcademica" class="form-select"  onChange="obtenerCarrera(this.value);" required>
                        <!-------------------------------------------------------->
                        <?php
							while($row= $consulta_unidad_academica->fetch_object())
							{
								echo "<option value='".$row->valor."'>".$row->descripcion."</option>";
							}
						?>
                        <!-------------------------------------------------------->
                        </select>
                    </div>
                    <div class="col-md-6">
                            <label for="xcarr" class="form-label">Carrera:</label>
                            <select name="xcarr" id="xcarr" class="form-select" >
                            <!-------------------------------------------------------->
                            <?php
							include 'get_carreras.php';
						?>
                        <!-------------------------------------------------------->
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="xCveTurno" class="form-label">Turno:</label>
                        <select name="xCveTurno" id="xCveTurno" class="form-select">
                        <option value="">Seleccione.</option>
                            <option value="MATUTINO">MATUTINO</option>
                            <option value="VESPERTINO">VESPERTINO</option>
                        </select><br/><br/>
                    </div>
                    <hr>

                    <h3 class="display-5 text-center">Elecci??n de la carrera de TSU (2?? opci??n)</h3>                    
                    <div class="col-md-6">                        
                        <label for="xUnidadAcademica2" class="form-label">Unidad acad&eacute;mica:</label>
                        <select name="xUnidadAcademica2" id="xUnidadAcademica2" class="form-select"  onChange="obtenerCarrera2(this.value);" required>
                        <!-------------------------------------------------------->
                        <?php
							while($row= $consulta_unidad_academica2->fetch_object())
							{
								echo "<option value='".$row->valor."'>".$row->descripcion."</option>";
							}
						?>
                        <!-------------------------------------------------------->
                        </select>
                    </div>
                    <div class="col-md-6">
                            <label for="xcarr" class="form-label">Carrera:</label>
                            <select name="xcarr2" id="xcarr2" class="form-select" >
                            <!-------------------------------------------------------->
                            <?php
							include 'get_carreras2.php';
						?>
                        <!-------------------------------------------------------->
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="xCveTurno2" class="form-label">Turno:</label>
                        <select name="xCveTurno2" id="xCveTurno2" class="form-select">
                        <option value="">Seleccione.</option>
                            <option value="MATUTINO">MATUTINO</option>
                            <option value="VESPERTINO">VESPERTINO</option>
                        </select><br/><br/>
                    </div>
                    <hr>


                    <h1 class="display-5 text-center">??Por qu?? medio te enteraste de la UTP?</h1> 
                    <div class="col-md-2"></div>
                    <div class="col-md-8 .offset-md-2">
                        
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rbMedios" id="preparatoria" value="4">
                            <label class="form-check-label" for="rbMedios">
                              Visita a tu preparatoria
                            </label>
                        </div>
                        
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rbMedios" id="TV" value="7">
                            <label class="form-check-label" for="rbMedios">
                              Televisi??n
                            </label>
                        </div>
                        
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rbMedios" id="familiar-amigo" value="8">
                            <label class="form-check-label" for="rbMedios">
                              Familiar, amigo o alumno de la UT
                            </label>
                        </div>
                        
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rbMedios" id="visita-guiada" value="10">
                            <label class="form-check-label" for="rbMedios">
                              Visita guiada a la UT
                            </label>
                        </div>
                        
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rbMedios" id="periodicos" value="14">
                            <label class="form-check-label" for="rbMedios">
                              Peri??dicos
                            </label>
                        </div>
                        
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rbMedios" id="radio" value="20">
                            <label class="form-check-label" for="rbMedios">
                              Radio
                            </label>
                        </div>
                        
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rbMedios" id="redes" value="29">
                            <label class="form-check-label" for="rbMedios">
                              Redes sociales
                            </label>
                        </div>
                        
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rbMedios" id="web" value="30">
                            <label class="form-check-label" for="rbMedios">
                              Pagina web
                            </label>
                        </div>
                        
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rbMedios" id="espectacular" value="31">
                            <label class="form-check-label" for="rbMedios">
                              Espectacular
                            </label>
                        </div>
                        
                    </div>
                    <div class="col-md-12 text-center">
                        <input type="submit" name="btnGrabarRegistro" id="btnGrabarRegistro" class="btn btn-success" value="Grabar registro" onclick="">
                       <!-- <input type="hidden" name="xCvePersona" id="xCvePersona" value="0">
                        <input type="hidden" name="xCveAspirante" id="xCveAspirante" value="23465">
                        <input type="hidden" name="xCveMedioDifusionAnterior" id="xCveMedioDifusionAnterior" value="0">
                        <input type="hidden" name="xFolioCeneval" id="xFolioCeneval" value="">
                        -->
                    </div>
                </form>                
            </div>
        </div>        
</body>


xUnidadAcademica
</html>