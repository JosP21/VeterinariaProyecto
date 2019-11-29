<?php session_start();
  if($_SESSION["logeado"] == false) {
header("location:login.php");
  }
  ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Informacion de Consultas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="../assets/img/icon-clinica.jpg" />
    <link rel="stylesheet" href="../assets/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../assets/css/normalize.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/datatable/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../assets/datatable/css/responsive.dataTables.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="../assets/js/jquery-1.11.2.min.js"><\/script>')
    </script>
    <script src="../assets/js/modernizr.js"></script>
    <script src="../assets/js/alertify.min.js"></script>
    <script src="../assets/js/controlador.js"></script>
    <script src="../assets/js/sweetalert2.min.js"></script>
    <script src="../assets/js/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="../assets/css/sweet-alert.css">
    <link rel="stylesheet" href="../assets/css/sweetalert2.min.css">
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script type="text/javascript" src="../assets/datatable/js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../assets/datatable/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../assets/datatable/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="../assets/datatable/datatable.js"></script>
    <script type="text/javascript">
        function pasarConsulta(id,idexp){
            $.ajax({
              type:"POST",
              url:"../metodosAjax/guardar-cita.php",
              data:{idC:id,idE:idexp},
              success:function(resp){
                document.getElementById('datosExp').innerHTML=resp;
              }
             });
        }
         function modificarC(id,idexp){
            $.ajax({
              type:"POST",
              url:"../metodosAjax/guardar-cita.php",
              data:{idCita:id,idExp:idexp},
              success:function(resp){
                document.getElementById('datos').innerHTML=resp;
              }
             });
        }
        function agregarMedicamento(){
            var diagnostico=document.getElementById("diagnostico").value;
            var medicamento=document.getElementById("nombreM").value;
            var cantidad=document.getElementById("cantida").value;
            var dosis=document.getElementById("dosis").value;
            if(diagnostico==""){
                 alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: Para poder recetar medicamento previamente debe de haber un diagnostico de la consulta que se a realizado', 'success', 10, function(){});
               }
               if(medicamento==""){
                 alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: El nombre del medicamento no puede ir vacio', 'success', 5, function(){});
            }
            if(cantidad==""){
                 alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: Cantidad de medicamento no puede ir vacio', 'success', 5, function(){});
            }
            if(dosis==""){
                 alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: Dosis no puede ir vacio', 'success', 5, function(){});
            }
               if(diagnostico!=""){
                var datos=$("#frmconsulta").serialize();
                $.ajax({
                    type:"POST",
                    url:"../metodosAjax/guardar-cita.php",
                    data:datos,
                    success:function(resp){
                        document.getElementById('Tabla').innerHTML=resp;
                        //document.getElementById('datosExp').innerHTML=resp;
                    }
                });
               }
        }
        function GuardarConsulta(){
            $.ajax({
              type:"POST",
              url:"../metodosAjax/guardar-cita.php",
              data:{id_cita:document.getElementById("idCita").value},
              success:function(resp){
                $("#Consulta")[0].reset(); 
                document.getElementById('miTabla').innerHTML=resp;
                mostrarMensaje('Se guardo correctamente','success',null,"La consulta a sido guardada exitosamente",true);
              }
             });
        }
     function modificarCita(){
        var ftdatos=$("#frmcitaM").serialize();
         $.ajax({
                    type:"POST",
                    url:"../metodosAjax/guardar-cita.php",
                    data:ftdatos,
                    success:function(resp){
                        $("#Consulta")[0].reset(); 
                document.getElementById('miTabla').innerHTML=resp;
                mostrarMensaje('Se modifico correctamente','success',null,"La consulta a sido modificada exitosamente",true);
                    }
                   });
     } 
     function eliminarcita(id){
        $.ajax({
                    type:"POST",
                    url:"../metodosAjax/guardar-cita.php",
                    data:{citaEli:id},
                    success:function(resp){
                         document.getElementById('miTabla').innerHTML=resp;
                         mostrarMensaje('Se Elimino','success',null,"El registro fue eliminado satisfactoriamente ",true);
                    }});
     }
    </script>
</head>

<body>
    <?php
    include "../from/menu.php"
    ?>
        <div class="content-page-container full-reset custom-scroll-containers">
            <div style="margin: 6.5% 0;"></div>
            <div class="container">
                <div class="page-header">
                    <h1 class="all-tittles">animal pet's <small>Atencion Medica</small></h1>
                </div>
            </div>
            <div class="container-fluid">
                <ul class="nav nav-tabs nav-justified" style="font-size: 17px;">
                    <li role="presentation" class="active"><a href="citas.php">Gestionar Citas</a></li>
              <li role="presentation"><a href="cirugia.php">Gestionar Cirugias</a></li>
                </ul>
            </div>
            <div class="container-fluid"  style="margin: 20px 0;"></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 lead">
                        <ol class="breadcrumb">
                            <li><a href="citas.php">Nuevo</a></li>
                            <li class="active">Listado</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
             <div class="col-sm-8 col-sm-offset-2">
                <div class="div-table">
                    <table id="miTabla" style="width:100%">
                        <thead>
                            <tr>
                                <th>Hora</th>
                                <th>Expediente</th>
                                <th>Mascota</th>
                                <th>Propietario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "../config/conexion.php";
                            $result=$conexion->query("SELECT
                                                    mascotas.id_mascota as idM,
                                                    mascotas.nombre as nomM,
                                                    mascotas.alias as alias,
                                                    propietario.nombres as nomP,
                                                    propietario.apellidos as apP,
                                                    citas.fecha as fecha,
                                                    citas.hora as hora,
                                                    citas.id_cita as idC
                                                    FROM mascotas
                                        INNER JOIN propietario ON mascotas.id_propietario = propietario.id_propietario
                                INNER JOIN citas ON citas.id_mascota = mascotas.id_mascota WHERE citas.estado='Pendiente' && citas.fecha=CURDATE()
 ORDER BY citas.hora");
                            if($result){
                                while($fila = $result->fetch_object()){ 
                                    list($n1, $n2) = explode(' ', $fila->nomM);
                                    $mascota=$n1." ".$fila->alias." ".$n2;
                                    $nombrep=$fila->nomP." ".$fila->apP;
                                    ?>
                            <tr>
                                <td><?php echo $fila->hora ?></td>
                                <td><?php echo $fila->idM ?></td>
                                <td><?php echo $mascota ?></td>
                                <td><?php echo $nombrep ?></td>
                                <td>
                                    <a href="#" data-toggle= "modal" data-target= "#modificarConsulta" class="material-control" required="" onclick="modificarC(<?php echo " '".$fila->fecha."' "?>,<?php echo " '".$fila->idM."' "?>)" maxlength="50"  btnm-data-title="Editar">
                                        <i class="zmdi zmdi-edit" style="color: #31920D;">
                                        </i>
                                    </a>
                                    &nbsp;&nbsp;
                                    <a href="#" onclick="eliminarcita(<?php echo $fila->idC?>)" class="material-control" required="" maxlength="50"btne-data-title="Eliminar">
                                        <i class="zmdi zmdi-delete" style="color: #F91D0B;">
                                        </i>
                                    </a>
                                    &nbsp;&nbsp;
                                    <button href="#" data-toggle= "modal" data-target= "#Consulta" data-backdrop="static" data-keyboard="false" tabindex="-1" class="material-control tooltips-general btn btn-return" required="" maxlength="50" onclick="pasarConsulta(<?php echo $fila->fecha?>,<?php echo " '".$fila->idM."' "?>)">Pasar Consulta
                                        <i class="zmdi zmdi-mail-send" style="color: #fff; margin-left: 6%">
                                        </i></button>
                                </td>
                            </tr>
                             <?php
        }
}
?>
                        </tbody>
                    </table>
                </div></div><div style="margin: 6.5% 0;"></div>
            </div>
            <div class="modal fade" id="modificarConsulta">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center>
                                <h5 class="modal-title"> Modificar Cita</h5></center>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> &times; </span>
                            </button>
                        </div>
                        <div class="modal-body" id="datos">
                            
                        </div>
                        <div class="modal-footer">
                            <div class="col-sm-8">
                                <button type="button" class="btn btn-success" onclick="modificarCita()">
                                    <i class="zmdi zmdi-edit" style="color: #fff;">
                                        </i>&nbsp;&nbsp;Modificar</button>
                                <button type="button" data-dismiss="modal" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-refresh-alt"></i> Cancelar</button></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="Consulta">
                <div class="modal-dialog" style="margin-top: 5%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center>
                                <h5 class="modal-title"> Consulta</h5></center>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> &times; </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="frmconsulta" name="frmconsulta" method="post" action="">
                            <div class="container-fluid" style="margin: 1px 0;"></div>
                            <div class="col-xs-12 col-sm-12 col-sm-offset-0">
                                <fieldset>
                                    <legend>Datos</legend>
                                    <div id="datosExp">
                                    </div>
                                    <div class="col-sm-3 col-sm-offset-0" style="margin-top: 3.5%;">
                                <button type="button" class="btn btn-history" data-toggle= "modal" data-target= "#historiame" >
                                    <i style="color: #fff;" class="zmdi zmdi-folder-person">
                                        </i>&nbsp;&nbsp;Historial Medico</button></div>
                                </fieldset>
                            </div>
                            <div class="container-fluid" style="margin: 5px 0;"></div>
                            <div class="col-xs-12 col-sm-12 col-sm-offset-0"><label style="color: #53a5b4;font-weight: bold;">Diagnostico</label></div>

                            <div class="col-xs-12 col-sm-12 col-sm-offset-0">
                                <div class="group-material" style="margin-bottom: 2%;">
                                            <textarea id="diagnostico" name="diagnostico" type="text" class="material-control tooltips-general" placeholder="Aqui va el motivo por el cual esta pasando consulta" required="" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);" style="width: 100%;"></textarea>
                                        </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-sm-offset-0">
                                <fieldset>
                                    <legend>Receta</legend>
                                    <div class="col-xs-4 col-sm-4 col-sm-offset-0" style="margin-bottom: -20px;margin-left: 1%;">
                                        <div class="container-fluid" style="margin: 10px 0;"></div>
                                        <div class="group-material">
                                            <input id="nombreM" name="nombreM" type="text" class="material-control tooltips-general" placeholder="Nombre..." required="" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);">
                                            <label>Medicina</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 col-sm-offset-0" style="margin-bottom: -20px;">
                                        <div class="container-fluid" style="margin: 10px 0;"></div>
                                        <div class="group-material">
                                            <input id="cantida" name="cantida" type="text" class="material-control tooltips-general" placeholder="5" required="" data-toggle="tooltip" data-placement="top" title="Solo Numeros" onkeypress="return solonumero(event);">
                                            <label>Cantidad</label>
                                        </div>
                                    </div>
                                   <div class="col-xs-4 col-sm-4 col-sm-offset-0" style="margin-bottom: -20px;">
                                        <div class="container-fluid" style="margin: 10px 0;"></div>
                                        <div class="group-material">
                                            <input id="dosis" name="dosis" type="text" class="material-control tooltips-general" placeholder="Dosis..." required="" data-toggle="tooltip" data-placement="top">
                                            <label>Dosis</label>
                                        </div>
                                    </div> 
                                    <div class="col-sm-1" style="margin-top: 3.3%">
                            <button type="button" onclick="agregarMedicamento()" class="btn btn-add" data-toggle= "modal" data-target= "#" ><i class="zmdi zmdi-plus"></i> &nbsp;&nbsp; Agregar</button> </div>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                <div class="div-table">
                    <table id="Tabla" class="display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Medicina</th>
                                <th>Cantidad</th>
                                <th>Dosis</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                            </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <div class="col-sm-12 text-center">
                                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="GuardarConsulta()">
                                    <i class="zmdi zmdi-floppy" style="color: #fff;">
                                        </i>&nbsp;&nbsp;Guardar </button></div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="modal fade" id="historiame">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center>
                                <h5 class="modal-title"> Control</h5></center>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> &times; </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid" style="margin: 1px 0;"></div>
                            Aqui va a ir el historia medico que tiene ese expediente
                        </div>
                        <div class="modal-footer">
                            <center>
                                <button type="button" class="btn btn-return" data-dismiss="modal"><i class="zmdi zmdi-mail-reply"></i> &nbsp;&nbsp; Volver</button>
                          </center>
                        </div>
                    </div>
                </div>
            </div>
                  <footer class="footer full-reset">
            <div class="footer-copyright full-reset all-tittles"><center>Universidad de EL Salvador-FMP 2019</center></div>
        </footer>
</body>

</html>