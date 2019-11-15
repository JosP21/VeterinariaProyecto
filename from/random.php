<?php
/*$letra=ord('A')+1;
echo ord('Z');
    echo chr("A");

    $caracterM=substr( "Hola", 0,1);
    $caracter=substr( "Hola", 1);
    $numero="1"+1;
*/
$fecha_actual = date("Y-m-d");
//resto 1 anio
$anio=2;
$retarA=date("Y-m-d",strtotime($fecha_actual.-$anio." year"));
//resto 1 mes
$restarM=date("Y-m-d",strtotime($retarA."- 1 month")); 
$restarS=date("Y-m-d",strtotime($restarM."- 1 week")); 
//$myvalue = 'Test me more'; $arr = explode(' ',trim($myvalue)); echo $arr[1]; 

$originalDate = "2017-03-08";
$newDate = date("d/m/Y", strtotime($originalDate));
echo $newDate;

/////////////////////////////
include"../metodosAjax/filtrarfecha.php";
$fecha_nacimiento = "03-10-2017";
   $fecha_control = "06-10-2017";

   $tiempo = tiempo_transcurrido($fecha_nacimiento, $fecha_control);
   if($tiempo[0]==0){
   	
   }
   $texto = "$tiempo[0] años con $tiempo[1] meses y $tiempo[2] días";
  print "edad: ".$texto."<br>";

  // $fecha=date("d-m-y");
   //echo $fecha;
?>