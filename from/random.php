<?php
/*$letra=ord('A')+1;
echo ord('Z');
    echo chr("A");

    $caracterM=substr( "Hola", 0,1);
    $caracter=substr( "Hola", 1);
    $numero="1"+1;
*/
/*$fecha_actual = date("Y-m-d");
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
   //echo $fecha;*/

  /*$cadena = 'Hola Mundo Hermoso';

    list($palabra1, $palabra2,$palabra3) = explode(' ', $cadena);

    echo $palabra1 . '<br>';

    echo $palabra2 . '<br>';

    echo $palabra3 . '<br>';

    $date = date('h:i',strtotime("05:59"));
    $NuevaFecha = strtotime ( '+18 minute' , strtotime ($date) ) ;
    $NuevaFecha = date ( 'h:i' , $NuevaFecha); 
echo $NuevaFecha;*/
/*include"../config/conexion.php";
$result1=$conexion->query("SELECT citas.fecha as fecha, COUNT(citas.fecha) as historialexp FROM
        mascotas
        INNER JOIN citas ON citas.id_mascota = mascotas.id_mascota
        INNER JOIN consulta ON consulta.id_cita = citas.id_cita
        INNER JOIN receta ON receta.id_consulta = consulta.id_consulta
        INNER JOIN propietario ON mascotas.id_propietario = propietario.id_propietario
        INNER JOIN raza ON mascotas.id_raza = raza.id_raza
        where mascotas.id_mascota='JFBC1927' and citas.estado='Consulta Realizada'
        GROUP BY citas.fecha");
$total = $result1->num_rows;
echo 'Número de total de registros: ' . $total;*/
/*date_default_timezone_set("America/El_Salvador");
$horas1 = date('H:i');
$horas2 = date('H:i',strtotime("08:00"));
if($horas1>=$horas2){
  echo $horas1;
   }else{
     echo $horas2;
   }*/
?>

<!--<html>

<HEAD>

     <TITLE>Anyadir Filas Dinámicamente en HTML by jotaerre.net</TITLE>

     <SCRIPT language="javascript">

          function addRow(tableID) {

               var table = document.getElementById(tableID);

 

               var rowCount = table.rows.length;

               var row = table.insertRow(rowCount);

 

               var cell1 = row.insertCell(0);

               var element1 = document.createElement("input");

               element1.type = "checkbox";

               cell1.appendChild(element1);

 

               var cell2 = row.insertCell(1);

               var element2 = document.createElement("input");

               element2.type = "text";

               cell2.appendChild(element2);

          }

 

          function deleteRow(tableID) {

               try {

               var table = document.getElementById(tableID);

               var rowCount = table.rows.length;

 

               for(var i=0; i<rowCount; i++) {

                    var row = table.rows[i];

                    var chkbox = row.cells[0].childNodes[0];

                    if(null != chkbox && true == chkbox.checked) {

                         table.deleteRow(i);

                         rowCount--;

                         i--;

                    }

               }

               }catch(e) {

                    alert(e);

               }

          }

 

     </SCRIPT>

</HEAD>

<BODY>

 

     <INPUT type="button" value="Add Row" onclick="addRow('dataTable');" />

 

     <INPUT type="button" value="Delete Row" onclick="deleteRow('dataTable');" />

 

     <TABLE id="dataTable" width="350px" border="1">

          <TR>

               <TD><INPUT type="checkbox" NAME="chk"/></TD>

               <TD> <INPUT type="text" /> </TD>

          </TR>

     </TABLE>

 

</BODY>

</html>!-->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    c<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</head>

<body>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"> Open modal </button>
    <!-- End of button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4> </div>
                <div class="modal-body"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" onclick="adddata()">Add</button>
                    <button type="button" class="btn btn-default" onclick="modalclose()">Close</button>
                    <button type="button" class="btn btn-primary" onclick="savechanges()">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script type="text/javascript">
    function adddata() {
        $('#myModal').modal('hide');
        swal({
            title: "An input!",
            text: "Write something interesting:",
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            inputPlaceholder: "Write something"
        }, function(inputValue) {
            if (inputValue === false) return false;
            if (inputValue === "") {
                swal.showInputError("You need to write something!");
                return false
            }
            swal("Nice!", "You wrote: " + inputValue, "success");
        });
    }

    function modalclose() {
        swal({
            title: "Are you sure you want to exit?",
            text: "You will not be able to save and recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, I'm going out!",
            cancelButtonText: "No, I'm stay!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm) {
            if (isConfirm) {
                swal("Goodbye!", "Your imaginary file has not been save.", "success");
                $('#myModal').modal('hide');
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
    }

    function savechanges() {
        $('#myModal').modal('hide');
        swal("Good job!", "Your imaginary file has been successfully save!", "success");
    }
</script>
