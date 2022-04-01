<?php
//Esta pequeña funcion me crea una fecha de entrega sin sabados ni domingos  
    $fechaInicial = date("Y-m-d"); //obtenemos la fecha de hoy, solo para usar como referencia al usuario  
  
    $MaxDias = 2; //Cantidad de dias maximo para el prestamo, este sera util para crear el for  
  
    $Segundos = 0;
         //Creamos un for desde 0 hasta 3  
         for ($i=0; $i<$MaxDias; $i++)  
    {  
                  //Acumulamos la cantidad de segundos que tiene un dia en cada vuelta del for  
        $Segundos = $Segundos + 86400;  
          
                  //Obtenemos el dia de la fecha, aumentando el tiempo en N cantidad de dias, segun la vuelta en la que estemos  
        $caduca = date("D",time()+$Segundos);  
          
                           //Comparamos si estamos en sabado o domingo, si es asi restamos una vuelta al for, para brincarnos el o los dias...  
           
                           if ($caduca == "Sat")  
            {  
                $i--;  
            }  
         
            if ($caduca == "Sun")  
            {  
                $i--;  
            }  
            else  
            {  
                                    //Si no es sabado o domingo, y el for termina y nos muestra la nueva fecha  
                $FechaFinal = date("Y-m-d",time()+$Segundos);  
            }  
    }  echo $FechaFinal;

    ?>