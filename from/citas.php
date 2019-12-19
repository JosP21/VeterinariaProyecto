<?php session_start();
  if($_SESSION["logeado"] == false) {
header("location:login.php");
  }
  $nombres="";
if($_SESSION["nombres"] != null){
    $nombres=$_SESSION["nombres"];
}
  ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Gestionar Citas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="../assets/img/logoclinica.png" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/alertify.min.css">
    <link rel="stylesheet" href="../assets/css/default.min.css">
    <script src="../assets/js/jquery-1.4.4.min.js"></script>
  <script src="../assets/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="../assets/css/style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="../assets/js/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="../assets/css/sweetalert2.min.css">
    <script src="../assets/js/modernizr.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/alertify.min.js"></script>
    <script src="../assets/js/controlador.js"></script>
    <link rel="stylesheet" href="../assets/datatable/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../assets/datatable/css/responsive.dataTables.min.css">
    <script type="text/javascript" src="../assets/datatable/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../assets/datatable/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="../assets/datatable/datatable.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="../assets/js/sweet-alert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/sweet-alert.css">
    <link rel="stylesheet" href="../assets/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../assets/css/normalize.css">
    <script type="text/javascript">
$(document).ready(function(){
$("#cita").click(function(){
cita();
});
$("#servicio").click(function(){
servicio();
});
});
function cita(){
var datos=$("#frmaccion").serialize();
$.ajax({
        type:"POST",
        url:"../metodosAjax/guardar-cita.php",
        data:datos,
        success:function(resp){
            $("#acciones").hide();
            $("#busqueda").show();
            document.getElementById('campoC').innerHTML=resp;
            validarhora();
        }
    });
}
function servicio(){
var datos=$("#frmaccion").serialize();
$.ajax({
        type:"POST",
        url:"../metodosAjax/guardar-cita.php",
        data:datos,
        success:function(resp){
            $("#acciones").hide();
            $("#busqueda").show();
            $("#tablaS").show();
            document.getElementById('campoC').innerHTML=resp;
        }
    });
}
function buscarPrecio(value){
    $.ajax({
        type:"POST",
        url:"../metodosAjax/guardar-cita.php",
        data:{precioS:value},
        success:function(resp){
            if(resp!=null){
                document.getElementById("precio").value=resp;
            }
        }
    });
}
function buscar(filtro){
    //document.getElementById('raza').value="";
    $.ajax({
        type:"POST",
        url:"../metodosAjax/guardar-cita.php",
        data:{val:filtro},
        success:function(resp){
            document.getElementById('raza').innerHTML=resp;
        }
    });
}
function buscarP(filtro){
    $.ajax({
        type:"POST",
        url:"../metodosAjax/guardar-cita.php",
        data:{valor:filtro},
        success:function(resp){
            //alert(resp);
            document.getElementById('propi').innerHTML=resp;
        }
    });
}
$(document).ready(function(){
    $("input[name=mascota]").change(function() {
        var value=$("input[name=mascota]").val();
        buscar(value);
    });
});
$(document).ready(function(){
    $("input[name=razamascota]").change(function() {
        var value=$("input[name=razamascota]").val();
        buscarP(value);
    });
});

function limpiar(){
    document.getElementById('campos').innerHTML="";
    document.getElementById("frmaccion").reset();
}

function inicio(){
    $("#busqueda").hide();
    $("#tablaS").hide();
}

//function modall(){
   // $('#myModal').modal('toggle');
    //$("#acciones").html("");
//}
</script>
</head>
<body onload="mensaje();inicio();">
    <?php
    include "../from/menu.php"
    ?>
<div class="content-page-container full-reset custom-scroll-containers">
    <div style="margin: 40px 0;"></div>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">animal pet's <small>Atencion Medica</small></h1>
            </div>
        </div>
        <div class="container-fluid">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
              <li role="presentation" class="active"><a href="citas.php">Gestionar Citas</a></li>
              <li role="presentation"><a href="cirugia.php">Gestionar Cirugias</a></li>
            </ul>
        </div>
        <div class="container-fluid"  style="margin: 20px 0;">
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                      <li class="active">Nuevo</li>
                      <li><a href="listacitas.php">Listado</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Registrar</div>
                <div id="acciones">
                <div class="container-fluid"  style="margin: 20px 0;"></div>
                <form id="frmaccion" name="frmaccion" method="post" action="">
                <div class="col-sm-10 col-sm-offset-1" style="margin-top: -2%;">
                <fieldset>
                  <legend>¿QUE ACCION DESEA REALIZAR?</legend>
                  <div>
                    <center>
                      <div class="contenedorad">
                        <div class="radio">
                         <input type="radio" name="accion" id="cita" value="Cita">
                         <label for="cita" onclick="cita()">Registrar Cita</label>
                         <input type="radio" name="accion" id="servicio" value="Servicio">
                         <label for="servicio">Realizar Cita de servicio</label>
                       </div>
                     </div>
                   </center>
                 </div>
               </fieldset>
             </div> 
                </form>
                <div class="container-fluid"  style="margin: 20px 0;"></div>
            </div>
            <div id="campos">
               <form id="frmcita" name="frmcita" method="post" action="">
                <input type="hidden" name="usu" id="usu" value="<?php echo $nombres?>">
                <div class="row text-center">
                    <div id="busqueda">
                        <div style="margin-left: 13%;" class="col-sm-3 col-sm-offset-1">
                        <div class="group-material">
                                    <input type="text" name="mascota" id="mascota" class="material-control tooltips-general" placeholder="Nombre Mascota..."  data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras" list="listaexpe" autocomplete="off">
                                    <datalist id="listaexpe">
                                        <?php
                                            include"../config/conexion2.php";
                                            $cosulta="SELECT DISTINCT(nombre),id_mascota,alias FROM mascotas ORDER BY nombre";
                                             $resultado = $conexion->query($cosulta);
                                              if($resultado){
                                               while($fila = $resultado->fetch_object()){
                                            list($n1, $n2) = explode(' ', $fila->nombre);
                                                echo  "<option value='".$n1." ".$fila->alias." ".$n2."'>".$n1." ".$fila->alias." ".$n2."</option>";
                                                 }
                                               }
                                            ?>
                                    </datalist>
                                <label>Mascota</label>
                            </div></div>
                            <div class="col-sm-1" style="margin-top: 0.5%;margin-left: -3%;">
                            <button type="button" class="btn btn-add" data-toggle="modal" data-target="#exped"><i class="zmdi zmdi-plus"></i> &nbsp;&nbsp; Agregar</button> </div>
                            <div style="margin-left: 3%;" class="col-sm-2 col-xs-offset-0">
                        <div class="group-material" id="filtroespecie">
                                    <input type="text" name="razamascota" id="razamascota" class="material-control tooltips-general" placeholder="Nombre Raza..."  data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras" list="listar" autocomplete="off">
                                    <div id="raza">
                                    <datalist id="listar">
                                        <?php
                                            include"../config/conexion2.php";
                                            $cosulta="SELECT DISTINCT(nombre) FROM `raza` ORDER BY nombre";
                                             $resultado = $conexion->query($cosulta);
                                              if($resultado){
                                               while($fila = $resultado->fetch_object()){
                                                echo  "<option value='$fila->nombre'>";
                                                 }
                                               }
                                            ?>
                                    </datalist>
                                    </div>
                                <label>Raza</label>
                            </div></div><div id="propi">
                            <div  class="col-sm-3 col-sm-offset-0">
                        <div class="group-material" id="propietarioG"><div id="autocompletar">
                                    <input type="text" name="nombrepropietario" id="nombrepropietario" class="material-control tooltips-general" placeholder="Nombre..."  data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" value="">
                                <label>Propietario</label>
                            </div>
                            </div></div>
                            <div style="margin-left: 13%;" class="col-sm-4 col-sm-offset-1">
                                <div class="group-material" id="propietarioG">
                                    <input type="text" name="expediente" id="expediente" class="material-control tooltips-general" placeholder="# Expediente..."  data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" value="" data-original-title=""><label>Expediente</label>
                                </div></div></div></div><div id="campoC">
                                
                            </div>
                            <div id="tablaS">
                                 <div class="col-sm-4 col-sm-offset-0" style="margin-left: 14%;">
                        <div class="group-material">
                                    <input type="text" name="servicio" id="servicio" class="material-control tooltips-general" placeholder="Nombre de Servicio.." required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);" list="listaServ">
                                    <datalist id="listaServ">
                                        <?php
                                            include"../config/conexion2.php";
                                            $cosulta="SELECT servicios.nombre as n FROM servicios ORDER BY servicios.nombre";
                                             $resultado = $conexion->query($cosulta);
                                              if($resultado){
                                               while($fila = $resultado->fetch_object()){
                                                echo  "<option value='$fila->n'>";
                                                 }
                                               }
                                            ?>
                                    </datalist>
                                <label>Servicio</label>
                            </div></div><div id="precioSer">
                            <div class="col-sm-3 col-sm-offset-0">
                            <div class="group-material">
                                    <input type="text" name="precio" id="precio" class="material-control tooltips-general" placeholder="0.00" required="" autocomplete="off" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="Solo numeros" value="" onkeypress="return solonumero(event);">
                                <label>Precio ($)</label>
                            </div></div></div>
                            <div class="col-sm-1" style="margin-top: 0.5%;margin-left: 2%;">
                            <button type="button" class="btn btn-add" onclick="agregarServicio()" data-toggle="modal"><i class="zmdi zmdi-plus"></i> &nbsp;&nbsp; Agregar</button> </div>
                                <div class="col-sm-6 col-sm-offset-2" style="margin-left: 9%;">
                            <div class="div-table">
                                <table id="miTablaS" class="display responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Servicios Citados</th>
                                            <th>Precio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Baño anti-pulgas</td>
                                            <td>$5.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><div style="margin: 6.5% 0;"></div>
                        </div>
                        <div class="col-sm-4 col-sm-offset-0">
                                    <div class="container-flat-form">
                                        
                                            <p></p><h3 align="center">TOTAL</h3>
                                                <input type="text-center" class="material-control tooltips-general" readonly="readonly" value="$4.50" style="text-align: center; width: 50%; margin-left:62px; background-color: #e5f4f7; color: black;">
                                            <p></p> 
                                            <hr style="color: blue" width="90%" size="3" align="center">
                                                <div class="col-sm-6 col-sm-offset-0" style="margin-top: -6%;">
                                                <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button></div><div class="col-sm-6 col-sm-offset-0" style="margin-top: -6%;">
                                                <button type="reset" class="btn btn-info" style="margin-right: 20px;" onclick="cancelar()"><i class="zmdi zmdi-refresh-alt"></i> &nbsp;&nbsp; Cancelar</button></div>
                                        
                                    </div>
                                </div>
                            </div>
                   </div>
               </form>
           </div>
            </div>
        </div>
        
<?php
    include "../from/addexpediente.php"
    ?>
        <footer class="footer full-reset">
            <div class="footer-copyright full-reset all-tittles"><center>Universidad de EL Salvador-FMP 2019</center></div>
        </footer>
    </div>
    <script type="text/javascript">
        function guardar(){
    var datos=$("#frmcita").serialize();
    $.ajax({
        type:"POST",
        url:"../metodosAjax/guardar-cita.php",
        data:datos,
        success:function(resp){
            $("#frmcita")[0].reset(); 
            mostrarMensaje('Se guardo correctamente','success',null,"Registro Guardado exitosamente",true);
        }
    });
}

function validarhora(){
    $.ajax({
        type:"POST",
        url:"../metodosAjax/guardar-cita.php",
        data:{fdato:document.getElementById("fecha").value},
        success:function(resp){
                document.getElementById("horafl").innerHTML=resp;
        }
    });
}
/*function validarhora(){
    $.ajax({
        type:"POST",
        url:"../metodosAjax/guardar-cita.php",
        data:{fdatos:document.getElementById("fecha").value},
        success:function(resp){
                document.getElementById("horafl1").innerHTML=resp;
        }
    });
}*/

function agregarServicio(){
    var datos=$("#frmcita").serialize();
   $.ajax({
        type:"POST",
        url:"../metodosAjax/guardar-cita.php",
        data:datos,
        success:function(resp){
            alert(resp);
            document.getElementById("miTablaS").innerHTML=resp;
        }
    });
}
$(document).ready(function(){
    $("input[name=servicio]").change(function() {
        var value=$("input[name=servicio]").val();
        buscarPrecio(value);
    });
});


    </script>
</body>
</html>