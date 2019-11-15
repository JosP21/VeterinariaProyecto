<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Informacion Expediente</title>
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
        function editarE(id) {
            $.ajax({
              type:"POST",
              url:"../metodosAjax/guardar-expediente.php",
              data:{exp:id},
              success:function(resp){
                  document.getElementById('datos').innerHTML=resp;
              }
             });
        }
        function modifcarExp(){
            var ftdatos=$("#frmexpediente").serialize();
            $.ajax({
                    type:"POST",
                    url:"../metodosAjax/guardar-expediente.php",
                    data:ftdatos,
                    success:function(resp){
                       document.getElementById('miTabla').innerHTML=resp;
                       mostrarMensaje('Se Modifico','success',null,"El registro a sido modificado satisfactoriamente ",true);
                    }
                   });
        }
        function filtrar(){
            $.ajax({
                    type:"POST",
                    url:"../metodosAjax/guardar-expediente.php",
                    data:{valor:document.getElementById("mascota").value, apellidoM:document.getElementById("apellidomas").value,razaMas:document.getElementById("razamascota").value},
                    success:function(resp){
                        document.getElementById("corelativo").value=resp;
                    }
                   });
}
        function add()
        {
            document.getElementById('apellidomas').value = document.getElementById('apellidoprop').value;
        }
        function eliminar(id){
                swal({
                    title: 'Esta seguro?',
                    text: "Desea eliminar este registro",
                    type: 'warning',
                    showCancelButton: true ,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!',
                }).then((result)=>{
                    if(result.value){
                        $.ajax({
                    type:"POST",
                    url:"../metodosAjax/guardar-expediente.php",
                    data:{ExpedienteEli:id},
                    success:function(resp){
                         document.getElementById('miTabla').innerHTML=resp;
                         mostrarMensaje('Se Elimino','success',null,"El registro fue eliminado satisfactoriamente ",true);
                    }
                   });
                    }
                })
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
                    <h1 class="all-tittles">Sistema bibliotecario <small>&nbsp;&nbsp;Expediente</small></h1>
                </div>
            </div>
            <div class="container-fluid" style="border-bottom: 1px solid #00000042;margin-right: 1%;margin-left: 1%;">
                <ul class="nav nav-tabs nav-justified" style="font-size: 17px;width: 40%;">
                    <li role="presentation" class="active"><a href="expediente.php">Gestionar Expediente</a></li>
                </ul>
            </div>
            <div class="container-fluid" style="margin: 10px 0;">
                <div class="row">
                    <div class="col-xs-12 lead">
                        <ol class="breadcrumb">
                            <li><a href="expediente.php">Nuevo</a></li>
                            <li class="active">Listado</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="col-sm-11">
                    <div class="div-table">
                        <table id="miTabla" class="display responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Num. Expediente</th>
                                    <th>Propietario</th>
                                    <th>Nombre de Mascota</th>
                                    <th>Raza</th>
                                    <th>Especie</th>
                                    <th>Edad</th>
                                    <th>Sexo Mascota</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            include "../config/conexion.php";
                            include"../metodosAjax/filtrarfecha.php";
                            $result=$conexion->query("SELECT
                                mascotas.id_mascota as expediente,
                                propietario.nombres as nombre,
                                propietario.apellidos as apellido,
                                mascotas.nombre as mascota,
                                mascotas.alias as alias,
                                raza.nombre as raza,
                                especies.nombre as especie,
                                mascotas.fechanac as edad,
                                mascotas.sexo as sexo
                                FROM
                                propietario
                                INNER JOIN mascotas ON mascotas.id_propietario = propietario.id_propietario
                                INNER JOIN raza ON mascotas.id_raza = raza.id_raza
                                INNER JOIN especies ON raza.id_especie = especies.id_especie");
                            if($result){
                                while($fila = $result->fetch_object()){ ?>
                                    <tr>
                                        <td>
                                            <?php echo $fila->expediente ?>
                                        </td>
                                        <td>
                                            <?php echo $fila->nombre." ".$fila->apellido?>
                                        </td>
                                        <td>
                                            <?php 
                                $cadena=explode(' ',trim($fila->mascota));
                                echo $cadena[0]." ".$fila->alias." ".$cadena[1]
                                ?>
                                        </td>
                                        <td>
                                            <?php echo $fila->raza?>
                                        </td>
                                        <td>
                                            <?php echo $fila->especie?>
                                        </td>
                                        <td>
                                            <?php
                                $tiempo = tiempo_transcurrido(date("d-m-Y", strtotime($fila->edad)), date("d-m-Y"));
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
                                echo $anio.$meses.$dias;
                                ?>
                                        </td>
                                        <td>
                                            <?php echo $fila->sexo?>
                                        </td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#modificarExpe" class="material-control tooltips-general" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Editar" onclick="editarE(<?php echo " '".$fila->expediente."' "?>)">
                                                <i class="zmdi zmdi-edit" style="color: #31920D;">
                                        </i>
                                            </a>
                                            &nbsp;&nbsp;
                                            <a href="#" class="material-control tooltips-general" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="eliminar(<?php echo " '".$fila->expediente."' "?>)">
                                                <i class="zmdi zmdi-delete" style="color: #F91D0B;"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <?php
        }
}
?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div style="margin: 6.5% 0;"></div>
            </div>
            <div class="modal fade" id="modificarExpe">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center>
                                <h5 class="modal-title"> Modificar Expediente</h5></center>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> &times; </span>
                            </button>
                        </div>
                        <div class="modal-body" id="datos">
                            
                        </div>
                        <div class="modal-footer">
                            <center>
                                <button type="button" class="btn btn-success" data-dismiss="modal"    onclick="modifcarExp()">
                                    <i class="zmdi zmdi-edit" style="color: #fff;">
                                        </i>&nbsp;&nbsp;Modificar</button>
                                <button type="button" data-dismiss="modal" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-refresh-alt"></i> Cancelar</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin: 6.5% 0;"></div>
            <footer class="footer full-reset">
                <div class="footer-copyright full-reset all-tittles">
                    <center>Universidad de EL Salvador-FMP 2019</center>
                </div>
            </footer>
</body>

</html>