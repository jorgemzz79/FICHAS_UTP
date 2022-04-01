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
    background-color: #82b085;
    border-radius: 15px;
    border: 3px double #006505;
  }
  .boton_1:hover{
    opacity: 0.6;
    text-decoration: none;
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

    <nav class="navbar navbar-default navbar-fixed-top">
        <?php include("nav.php");?>
    </nav>
    <div class="container">
        <div class="content">
            <h2>Registro de Pago</h2>
            <hr />


            <?php
            $query_utf8 = $con->set_charset("utf8mb4");
             
    
		?>

<h2 style="color:#FF0000" >!!!AVISO IMPORTANTE!!! </p> <p style="color:#FF0000"></h2> <h4 style="color:#152161" >SI TU FOLIO DE TRANSFERENCIA O NÚMERO DE OPERACIÓN ES INCORRECTO, TU REGISTRO SERÁ CANCELADO </h4> </p></p>
		<form role="form" name="login" action="add.php" method="post">
		  
		  <div class="form-group">
		    <label>Folio de transferencia o número de operación</label>
		    <input type="text" class="form-control" id="password" name="password" placeholder="Folio de transferencia o número de operación"  required>
		  </div>
		  
		  <div class="form-group">
		    <label>Confirma</label>
		    <input type="text" class="form-control" id="username" name="username" placeholder="Folio de transferencia o número de operación"  required>
		  </div>
		   <div align='center'>
		  <img src="res/ejemplos.jpg">
		  </div>
		  <div class="form-group">
                    <label class="col-sm-3 control-label">Fecha en la que realizaste el pago</label>
                    <div class="col-sm-4">
                        <input type="text" name="FECHA_PAGO" class="input-group date form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-aaaa" required>
                    </div>
                </div>
                
                <br>
                <br>
		  <div class="form-group">
                    <label class="col-sm-3 control-label">Forma de pago:</label>
                    <div class="col-sm-3">
                        <select name="FORMA_PAGO" class="form-control" required>
                            <option value="CAJA_UNIVERSIDAD">CAJA DE LA UNIVERSIDAD</option>
                            <option value="TRANSFERENCIA_BANCARIA">TRANSFERENCIA BANCARIA</option>
                            <option value="BANCO">BANCO</option>
                        </select>
                    </div>
                </div>
                <br>
                <br>
                 <label class="col-sm-3 control-label">Si tu respuesta fue banco, específica donde:</label>
                <br>
                <br>
                <br>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Específica</label>
                    <div class="col-sm-3">
                        <select name="ESPECIFIQUE_VENTANILLA_PRACTICAJA" class="form-control" required>
                            <option value="VENTANILLA">NINGUNA</option>
                            <option value="VENTANILLA">VENTANILLA</option>
                            <option value="PRACTICAJA">PRACTICAJA</option>
                        </select>
                    </div>
                </div>
                <br>
                <br>
 <div align='center'>
		  <button type="submit" class="boton_1">Registrar</button>
</div>		  
		</form>
</div>
</div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script>
        $('.date').datepicker({
            format: 'dd-mm-yyyy',
        })

 
    </script>



</body>

</html>
