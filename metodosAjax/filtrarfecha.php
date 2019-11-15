<?php
if(!empty($_POST['fecha'])){?>
<div style='margin-bottom: -10%;margin-top: 10%;' class='col-sm-12'>
  <div class='group-material'>
    <input type='date' name='fechanacimiento' id='fechanacimiento' class='material-control tooltips-general' placeholder='8/04/2019' data-min-length='1' max="<?php echo date('Y-m-d');?>" data-selection-required='true' data-toggle='tooltip' data-placement='top' title='' data-original-title=''>
    <label>Fecha de Nacimiento</label>
    </div>
</div>
<?php
  }
  if(!empty($_POST['edad'])){
                              echo "<div class='col-sm-4 col-sm-offset-0' style='margin-bottom: -10%;margin-top: 10%;'>
                                    <div class='group-material'>
                                    <input type='number' name='anio' id='anio' class='material-control tooltips-general' min='1'  data-min-length='1' data-selection-required='true' data-toggle='tooltip' data-placement='top' title='Solo Numeros' onkeypress='return sololnumero(event);'>
                                    <label>Año(s)</label>
                                    </div></div>
                                    <div class='col-sm-4 col-sm-offset-0' style='margin-bottom: -10%;margin-top: 10%;'>
                                    <div class='group-material'>
                                    <input type='number' name='mes' id='mes' class='material-control tooltips-general' min='1'  data-min-length='1' data-selection-required='true' data-toggle='tooltip' data-placement='top' title='Solo Numeros' onkeypress='return sololnumero(event);'>
                                    <label>Mes(es)</label>
                                    </div></div>
                                    <div class='col-sm-4 col-sm-offset-0' style='margin-bottom: -10%;margin-top: 10%;''>
                                    <div class='group-material'>
                                    <input type='number' name='semana' id='semana' class='material-control tooltips-general' min='1'  data-min-length='1' data-selection-required='true' data-toggle='tooltip' data-placement='top' title='Solo Numeros' onkeypress='return sololnumero(event);'>
                                    <label>Semana(s)</label>
                                    </div></div>";
  }


function tiempo_transcurrido($fecha_nacimiento, $fecha_control)
{
   $fecha_actual = $fecha_control;
   
   if(!strlen($fecha_actual))
   {
      $fecha_actual = date('d-m-Y');
   }

   // separamos en partes las fechas 
   $array_nacimiento = explode ( "-", $fecha_nacimiento ); 
   $array_actual = explode ( "-", $fecha_actual ); 

   $anos =  $array_actual[2] - $array_nacimiento[2]; // calculamos años 
   $meses = $array_actual[1] - $array_nacimiento[1]; // calculamos meses 
   $dias =  $array_actual[0] - $array_nacimiento[0]; // calculamos días 

   //ajuste de posible negativo en $días 
   if ($dias < 0) 
   { 
      --$meses; 

      //ahora hay que sumar a $dias los dias que tiene el mes anterior de la fecha actual 
      switch ($array_actual[1]) { 
         case 1: 
            $dias_mes_anterior=31;
            break; 
         case 2:     
            $dias_mes_anterior=31;
            break; 
         case 3:  
            if (bisiesto($array_actual[2])) 
            { 
               $dias_mes_anterior=29;
               break; 
            } 
            else 
            { 
               $dias_mes_anterior=28;
               break; 
            } 
         case 4:
            $dias_mes_anterior=31;
            break; 
         case 5:
            $dias_mes_anterior=30;
            break; 
         case 6:
            $dias_mes_anterior=31;
            break; 
         case 7:
            $dias_mes_anterior=30;
            break; 
         case 8:
            $dias_mes_anterior=31;
            break; 
         case 9:
            $dias_mes_anterior=31;
            break; 
         case 10:
            $dias_mes_anterior=30;
            break; 
         case 11:
            $dias_mes_anterior=31;
            break; 
         case 12:
            $dias_mes_anterior=30;
            break; 
      } 

      $dias=$dias + $dias_mes_anterior;

      if ($dias < 0)
      {
         --$meses;
         if($dias == -1)
         {
            $dias = 30;
         }
         if($dias == -2)
         {
            $dias = 29;
         }
      }
   }

   //ajuste de posible negativo en $meses 
   if ($meses < 0) 
   { 
      --$anos; 
      $meses=$meses + 12; 
   }

   $tiempo[0] = $anos;
   $tiempo[1] = $meses;
   $tiempo[2] = $dias;

   return $tiempo;
}

function bisiesto($anio_actual){ 
   $bisiesto=false; 
   //probamos si el mes de febrero del año actual tiene 29 días 
     if (checkdate(2,29,$anio_actual)) 
     { 
      $bisiesto=true; 
   } 
   return $bisiesto; 
}
	
?>

