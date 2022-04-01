
<?php    
include("conexion.php");
 ?>

<!DOCTYPE html>
<html lang="es-mx" dir="ltr">
<head><meta charset="gb18030">
  
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="buscar.js"></script>
  <style >
    .boton{
      width: 70px:
    }

    .entrada{
      width: 100%;
      margin-bottom: 10px;
    }
    .carreras,.estadosBach{
      margin-bottom: 10px;
      width: 100%;
    }

    .guardarAlumno{
      float:right;
    }

  </style>
</style>

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
    font-size: 12px;
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
    font-size: 12px;
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

	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Datos de aspirantes</title>

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
	</nav> <br> <br> <br>
	
    <center>
        <h1>Reimpresión de ficha</h1>
        <hr style="width:80%">
        <br>
    </center>
    <div class="container" style="width:80%;">
    <div class="row">
      <div class="col">
      <form action="consultar.php" method="POST">

INGRESE SU CURP
<input type="text" id="keywords" name="keywords" size="30" maxlength="30">
<input type="submit" name="search" id="search" value="Buscar">
</form>
      </div>
        
    </div>
    </div>
    <br>
    <table id='tabla' style="width:80%;margin:0 auto" class="table table-bordered table-striped table-responsive">
      <tr >
        <th>ID</th>
        <th>NOMBRES</th>
        <th>APELLIDO PATERNO</th>
        <th>APELLIDO MATERNO</th>
	    <th>CURP</th>
        <th>IMPRIMIR</th>
        <th>GUIA</th>
      </tr>

      <?php
        include "conexion.php";
if (isset($_POST['search'])) {
    //Recogemos las claves enviadas
    $keywords = $_POST['keywords'];


          $query="SELECT id, nombres, apaterno, amaterno, curp FROM aspirantes WHERE curp like '".$keywords."'";
         // echo $query;
        $resultado = $con->query($query);
        while($fila=mysqli_fetch_array($resultado)){
              $nombre=($fila['nombres']);

              echo "<tr class='fila'>".
              "<td>".$fila['id']."</td>".
              "<td>".$fila['nombres']."</td>".
              "<td>".($fila['apaterno'])."</td>".
  		"<td>".($fila['amaterno'])."</td>".
		"<td>".($fila['curp'])."</td>".
        
              "<td><form action='reimprimir.php' method='post'>".
              "<input type='hidden' name='CURP' value='$fila[curp]'>".
     "<input type='submit' style='width:160px;'  class='boton_2' value='IMPRIMIR FICHA'> <br><br> </form>".
     "<td><form action='res/GUIA_CENEVAL_PDF.pdf'  target = 'blank'>".
      "<input type='submit' style='width:160px;'  class='boton_1' value='GUIA CENEVAL PDF'> <br> </form>".
             
              "</form>".
		
"</form></td>";
              "</tr>";
        }
    }
    else {

 }
        ?>
    </table>

    </body>
</html>

<!-- LOAD DATA LOCAL INFILE 'dat.csv'
INTO TABLE alumnos
FIELDS TERMpINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n' -->
