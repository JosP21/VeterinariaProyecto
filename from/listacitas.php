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
   <script src="../assets/js/sweet-alert.min.js"></script>
  <link rel="stylesheet" href="../assets/css/sweet-alert.css">
  <link rel="stylesheet" href="../assets/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" href="../assets/css/normalize.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/jquery.mCustomScrollbar.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/alertify.min.css">
  <link rel="stylesheet" href="../assets/css/default.min.css">
  <script src="../assets/js/jquery.js"></script>
  <script src="../assets/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="../assets/css/style.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="../assets/js/jquery-1.11.2.min.js"><\/script>')</script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.css" id="theme-styles">
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
    <script type="text/javascript">
        function pasarConsulta(id,idexp,idCita){
            $.ajax({
              type:"POST",
              url:"../metodosAjax/guardar-cita.php",
              data:{fecha:id,idE:idexp,idcita:idCita},
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
                document.getElementById('miTabla').innerHTML=resp;
                mostrarMensaje('Se guardo correctamente','success',null,"La consulta a sido guardada exitosamente",true);
              }
             });
        }
     function modificarCita(){
        var ftdatos=$("#frmcitaM").serialize();
        Swal.fire({
                    title: "<div>Motivo por el cual desea hacer una modificacion a la cita con # de expediente<span style='color: #182d7d;'>"+document.getElementById("exp").value+"</span>, que tiene como dueño a  <span style='color: #182d7d;'>"+document.getElementById("nombreP").value+"</span></div>",
                    input: "text",
                    showCancelButton: true,
                    confirmButtonText: "Guardar",
                    cancelButtonText: "Cancelar",
                }).then(resultado => {
                    if (resultado.value) {
                        let mot = resultado.value;
                        $.ajax({
                    type:"POST",
                    url:"../metodosAjax/guardar-cita.php",
                    data:{idcita:document.getElementById("idcita").value,exp:document.getElementById("exp").value,nombreM:document.getElementById("nombreM").value,nombreP:document.getElementById("nombreP").value,iddoctor:document.getElementById("iddoctor").value,nombreD:document.getElementById("nombreD").value,fecha:document.getElementById("fecha").value,hora:document.getElementById("hora").value,motivo:mot},
                    success:function(resp){ 
                document.getElementById('miTabla').innerHTML=resp;
                mostrarMensaje('Se modifico correctamente','success',null,"La consulta a sido modificada exitosamente",true);
                    }
                   });
                    }else {
                        Modificar();
                    }
                    });
     } 
     function eliminarcita(id,exp,prop){
        $.ajax({
                    type:"POST",
                    url:"../metodosAjax/guardar-cita.php",
                    data:{citaEli:id},
                    success:function(resp){
                         document.getElementById('miTabla').innerHTML=resp;
                         mostrarMensaje('Se Elimino','success',null,"El registro fue eliminado satisfactoriamente ",true);
                    }});
     }
     function regresarcita(id){
        $.ajax({
                    type:"POST",
                    url:"../metodosAjax/guardar-cita.php",
                    data:{regresarcita:id},
                    success:function(resp){
                         document.getElementById('miTabla').innerHTML=resp;
                         mostrarMensaje('Informacion','success',null,"Se mando al final de la cola por motivo de no estar presente",true);
                    }});
     }
     function historial(){
        $.ajax({
                    type:"POST",
                    url:"../metodosAjax/guardar-cita.php",
                    data:{historialexp:document.getElementById("expe").value},
                    success:function(resp){
                         document.getElementById('datosHistorial').innerHTML=resp;
                    }});
     }
     function eliminarclass(){
        $('table thead tr th').removeClass('sorting');
     }
    </script>
    <style type="text/css">
        
    </style>
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
                    <table id="miTabla" class="display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th class="sorting_desc">Hora</th>
                                <th>Expediente</th>
                                <th>Mascota</th>
                                <th>Propietario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "../config/conexion.php";
                            $result=$conexion->query("SELECT mascotas.id_mascota as idM, mascotas.nombre as nomM, mascotas.alias as alias, propietario.nombres as nomP,
propietario.apellidos as apP,citas.fecha as fecha,citas.hora as hora,citas.id_cita as idC FROM mascotas
INNER JOIN propietario ON mascotas.id_propietario = propietario.id_propietario
INNER JOIN citas ON citas.id_mascota = mascotas.id_mascota WHERE citas.estado='Pendiente' && citas.fecha=CURDATE() ORDER BY citas.hora asc");
                            $primero=true;
                            if($result){
                                while($fila = $result->fetch_object()){ 
                                    list($n1, $n2) = explode(' ', $fila->nomM);
                                    $mascota=$n1." ".$fila->alias." ".$n2;
                                    $nombrep=$fila->nomP." ".$fila->apP;
                                    $expM=$fila->idM;
                                    ?>
                            <tr>
                                <td><?php echo $fila->hora ?></td>
                                <td><?php echo $expM ?></td>
                                <td><?php echo $mascota ?></td>
                                <td><?php echo $nombrep ?></td>
                                <td>
                                    <a href="#" data-toggle= "modal" data-target= "#modificarConsulta" class="material-control" required="" onclick="modificarC(<?php echo " '".$fila->fecha."' "?>,<?php echo " '".$fila->idM."' "?>)" maxlength="50"  btnm-data-title="Editar">
                                        <i class="zmdi zmdi-edit" style="color: #31920D;">
                                        </i>
                                    </a>
                                    &nbsp;&nbsp;
                                    <a href="#" onclick="eliminarcita(<?php echo $fila->idC?>,<?php echo " '".$expM."' "?>,<?php echo " '".$nombrep."' "?>)" class="material-control" required="" maxlength="50"btne-data-title="Eliminar">
                                        <i class="zmdi zmdi-delete" style="color: #F91D0B;">
                                        </i>
                                    </a>
                                    &nbsp;&nbsp;
                                    <?php if($primero){ ?>
                                    <a onclick="regresarcita(<?php echo $fila->idC?>)" class="material-control" required="" maxlength="50" btnf-data-title="Regresar al Final" href="#">
                                        <i class="zmdi zmdi-download" style="color: #10568A;">
                                        </i>
                                    </a>&nbsp;&nbsp;
                                    <button href="#" data-toggle= "modal" data-target= "#Consulta" data-backdrop="static" data-keyboard="false" tabindex="-1" class="material-control tooltips-general btn btn-return" required="" maxlength="50" onclick="pasarConsulta(<?php echo $fila->fecha?>,<?php echo " '".$fila->idM."' "?>,<?php echo $fila->idC?>)">Pasar Consulta
                                        <i class="zmdi zmdi-mail-send" style="color: #fff; margin-left: 6%">
                                        </i></button>
                                     <?php $primero=false;}else{?> 
                                     <button href="#" data-toggle= "modal"  disabled data-target= "#Consulta" data-backdrop="static" data-keyboard="false" tabindex="-1" class="material-control tooltips-general btn btn-return" required="" maxlength="50" onclick="pasarConsulta(<?php echo $fila->fecha?>,<?php echo " '".$fila->idM."' "?>,<?php echo $fila->idC?>)" >Pasar Consulta
                                        <i class="zmdi zmdi-mail-send" style="color: #fff; margin-left: 6%">
                                        </i></button><?php } ?>  
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
                                <button type="button" data-dismiss="modal" class="btn btn-success" onclick="modificarCita()">
                                    <i class="zmdi zmdi-edit" style="color: #fff;">
                                        </i>&nbsp;&nbsp;Modificar</button>
                                <button type="button" data-dismiss="modal" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-refresh-alt"></i> Cancelar</button></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="Consulta">
                <div class="modal-dialog" style="/*margin-top: 5%;*/">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center>
                                <h5 class="modal-title"> Consulta</h5></center>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> &times; </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="frmconsulta" name="frmconsulta" method="post" action="listacitas.php">
                            <div class="container-fluid" style="margin: 1px 0;"></div>
                            <div class="col-xs-12 col-sm-12 col-sm-offset-0">
                                <fieldset>
                                    <legend>Datos</legend>
                                    <div id="datosExp">
                                    </div>
                                    <div class="col-sm-3 col-sm-offset-0" style="margin-top: 3.5%;">
                                <button type="button" class="btn btn-history" data-toggle= "modal" data-target= "#historiame" id="histiralclinico">
                                    <i style="color: #fff;" class="zmdi zmdi-folder-person" >
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
             <div class="modal fade" id="historiame" >
                <div class="modal-dialog" style="width: 70%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center>
                                <h5 class="modal-title">Historial Medico</h5></center>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> &times; </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- tabla de historial del paciente o mascota!-->
                            <div class="container-fluid" style="margin: 1px 0;"></div>
                            <div id="datosHistorial">
                                <?php
                                include "../config/conexion.php";
                                include"../metodosAjax/filtrarfecha.php";
                                $idexpediente;
$result=$conexion->query("SELECT  mascotas.id_mascota as idM FROM mascotas
                         INNER JOIN propietario ON mascotas.id_propietario = propietario.id_propietario
                         INNER JOIN citas ON citas.id_mascota = mascotas.id_mascota WHERE citas.estado='Pendiente' && citas.fecha=CURDATE() ORDER BY citas.hora limit 1");
if($result){
    if($fila = $result->fetch_object()){ 
        $idexpediente=$fila->idM;
    }
}
//
                                $result1=$conexion->query("SELECT
mascotas.id_mascota AS idM,
propietario.nombres as nomP,
propietario.apellidos as apP,
propietario.sexo as sexP,
propietario.direccion as dirP,
propietario.telefono as telP,
mascotas.nombre as nomM,
mascotas.alias as alias,
mascotas.sexo as sexM,
mascotas.fechanac as nac,
raza.nombre as razM
FROM
mascotas
INNER JOIN propietario ON mascotas.id_propietario = propietario.id_propietario
INNER JOIN raza ON mascotas.id_raza = raza.id_raza
WHERE
mascotas.id_mascota = '".$idexpediente."'
");
      if($result1){
        if($fila = $result1->fetch_object()){
            $tiempo = tiempo_transcurrido(date("d-m-Y", strtotime($fila->nac)), date("d-m-Y"));
                                if($tiempo[0]==0 && $tiempo[1]==0 && $tiempo[2]==0){
                                    echo "Nacio Hoy";
                                }
                                if($tiempo[0]==0){
                                    $anio="";
                                }
                                if($tiempo[1]==0){
                                    $meses="";
                                }
                                if($tiempo[2]==0){
                                    $dias="";
                                }
                                if($tiempo[0]!=0){
                                    $anio="$tiempo[0] años, ";
                                }
                                if($tiempo[1]!=0){
                                    $meses="$tiempo[1] meses, ";
                                }
                                if($tiempo[2]!=0){
                                    $dias="$tiempo[2] dias";
                                }
                                $nacio= $anio.$meses.$dias;
                                list($n1, $n2) = explode(' ', $fila->nomM);
                                    $nombremascota=$n1." ".$fila->alias." ".$n2;
            ?>
          <div class="col-xs-12 col-sm-12 col-sm-offset-0">
                                <fieldset>
                                    <legend># Expediente: <strong style="font-size: 18px;font-weight: bold;color:#2a1cd5;"><?php echo $idexpediente?></strong></legend>
                                    <div>
                                      <fieldset>
                                    <legend>Datos Mascota</legend>
                                    <div>
                                        <div style="margin-bottom: -20px;margin-left: 1%;" class="col-xs-4 col-sm-3 col-sm-offset-0">
                                        <div class="container-fluid" style="margin: 10px 0;"></div>
                                        <div class="group-material">
                                            <input id="nombreP" name="nombreP" type="text" class="material-control tooltips-general" placeholder="Propietario..." required="" data-toggle="tooltip" value="<?php echo $fila->razM?>" data-placement="top" title="" onkeypress="return sololetras(event);" style="pointer-events: none;" data-original-title="Solo letras">
                                            <label>Raza</label>
                                        </div>
                                    </div>
                                      <div style="margin-bottom: -20px;" class="col-xs-4 col-sm-3 col-sm-offset-0">
                                        <div class="container-fluid" style="margin: 10px 0;"></div>
                                        <div class="group-material">
                                            <input id="expe" name="expe" type="text" class="material-control tooltips-general" placeholder="OS5969696" required="" data-toggle="tooltip" data-placement="top" value="<?php echo $nombremascota?>" title="" onkeypress="return sololetras(event);" style="pointer-events: none;" data-original-title="Solo letras">
                                            <label>Mascota</label>
                                        </div>
                                    </div>
                                    <div style="margin-bottom: -20px;" class="col-xs-4 col-sm-3 col-sm-offset-0">
                                        <div class="container-fluid" style="margin: 10px 0;"></div>
                                        <div class="group-material">
                                            <input id="nomMascota" name="nomMascota" type="text" class="material-control tooltips-general" placeholder="Nombre..." required="" data-toggle="tooltip" value="<?php echo $fila->sexM?>" data-placement="top" title="" onkeypress="return sololetras(event);" style="pointer-events: none;" data-original-title="Solo letras">
                                            <label>Sexo Mascota</label>
                                        </div>
                                    </div>
                                    <div style="margin-bottom: -20px;margin-left: 1%;" class="col-xs-4 col-sm-3 col-sm-offset-0">
                                        <div class="container-fluid" style="margin: 10px 0;"></div>
                                        <div class="group-material">
                                            <input id="nombreP" name="nombreP" type="text" class="material-control tooltips-general" placeholder="Propietario..." required="" data-toggle="tooltip" value="<?php echo $nacio?>" data-placement="top" title="" onkeypress="return sololetras(event);" style="pointer-events: none;" data-original-title="Solo letras">
                                            <label>Edad</label>
                                        </div>
                                    </div>

                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Datos Propietario</legend>
                                    <div>
                                        <div style="margin-bottom: -20px;" class="col-xs-4 col-sm-2 col-sm-offset-0">
                                        <div class="container-fluid" style="margin: 10px 0;"></div>
                                        <div class="group-material">
                                            <input id="nombreP" name="nombreP" type="text" class="material-control tooltips-general" placeholder="Propietario..." required="" data-toggle="tooltip" value="<?php echo $fila->nomP?>" data-placement="top" title="" onkeypress="return sololetras(event);" style="pointer-events: none;" data-original-title="Solo letras">
                                            <label>Nombre</label>
                                        </div>
                                    </div>
                                      <div style="margin-bottom: -20px;" class="col-xs-4 col-sm-2 col-sm-offset-0">
                                        <div class="container-fluid" style="margin: 10px 0;"></div>
                                        <div class="group-material">
                                            <input id="expe" name="expe" type="text" class="material-control tooltips-general" placeholder="OS5969696" required="" data-toggle="tooltip" data-placement="top" value="<?php echo $fila->apP?>" title="" onkeypress="return sololetras(event);" style="pointer-events: none;" data-original-title="Solo letras">
                                            <label>Apellido</label>
                                        </div>
                                    </div>
                                    <div style="margin-bottom: -20px;" class="col-xs-4 col-sm-2 col-sm-offset-0">
                                        <div class="container-fluid" style="margin: 10px 0;"></div>
                                        <div class="group-material">
                                            <input id="nomMascota" name="nomMascota" type="text" class="material-control tooltips-general" placeholder="Nombre..." required="" data-toggle="tooltip" value="<?php echo $fila->sexP?>" data-placement="top" title="" onkeypress="return sololetras(event);" style="pointer-events: none;" data-original-title="Solo letras">
                                            <label>Sexo</label>
                                        </div>
                                    </div>
                                    <div style="margin-bottom: -20px;" class="col-xs-4 col-sm-2 col-sm-offset-0">
                                        <div class="container-fluid" style="margin: 10px 0;"></div>
                                        <div class="group-material">
                                            <input id="nombreP" name="nombreP" type="text" class="material-control tooltips-general" placeholder="Propietario..." required="" data-toggle="tooltip" value="<?php echo $fila->telP?>" data-placement="top" title="" onkeypress="return sololetras(event);" style="pointer-events: none;" data-original-title="Solo letras">
                                            <label>Telefono</label>
                                        </div>
                                    </div>
                                    <div style="margin-bottom: -20px;" class="col-xs-4 col-sm-5 col-sm-offset-0">
                                        <div class="container-fluid" style="margin: 10px 0;"></div>
                                        <div class="group-material">
                                            <input id="nombreP" name="nombreP" type="text" class="material-control tooltips-general" placeholder="Propietario..." required="" data-toggle="tooltip" value="<?php echo $fila->dirP?>" data-placement="top" title="" onkeypress="return sololetras(event);" style="pointer-events: none;" data-original-title="Solo letras">
                                            <label>Direccion</label>
                                        </div>
                                    </div>
                                    </div>
                                </fieldset>  
                                    </div>
                                </fieldset>
                            </div>
          <?php
          
        }

    }
                                ?>
                            </div>
                            <div class="col-sm-12 col-sm-offset-0">
                <div class="div-table">
                    <table id="miTablaS" style="width:100%;" class="display1 nowrap">
                        <thead>
                            <tr>
                                <th>Fecha de Consulta</th>
                                <th>Motivo de la Consulta</th>
                                <th>Medicamento Recetado</th>
                                <th>Cantidad Recetada</th>
                                <th>Dosis</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "../config/conexion.php";
                            $result1=$conexion->query("SELECT
citas.fecha as fecha,
consulta.descripcion as des,
receta.medicamento as med,
receta.cantidad as can,
receta.dosis as dosis
FROM
mascotas
INNER JOIN citas ON citas.id_mascota = mascotas.id_mascota
INNER JOIN consulta ON consulta.id_cita = citas.id_cita
INNER JOIN receta ON receta.id_consulta = consulta.id_consulta
INNER JOIN propietario ON mascotas.id_propietario = propietario.id_propietario
INNER JOIN raza ON mascotas.id_raza = raza.id_raza
where mascotas.id_mascota='".$idexpediente."' and citas.estado='Consulta Realizada'");
                            if($result1){
                                while($fila = $result1->fetch_object()){
                                    echo "<tr>
                                        <td>$fila->fecha</td>
                                        <td>$fila->des</td>
                                        <td>$fila->med</td>
                                        <td>$fila->can</td>
                                        <td>$fila->dosis</td>
                                    </tr>";
                            }
                        }
                            ?>
                        </tbody>
                    </table>
                </div></div>
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
    <script src="../assets/js/jquery.table.marge.js"></script>
    <script>
        //$('#textTable').margetable({
        //    colindex:[{
        //        index:0
        //    },{
        //        index:1,
        //        dependent:[0]
        //    },{
        //        index:2,
        //        dependent:[0,1]
        //    }]
        //});
        $('#miTablaS').margetable({
            type: 2,
            colindex: [0,1]
        });
    </script>
</body>

</html>