<?php session_start();
  if($_SESSION["logeado"] == false) {
header("location:login.php");
  }
  ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Gestionar Proveedor</title>
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
      function GuardarEmpresa(){
            var nombre=document.getElementById('nombreE').value;
            var telefono=document.getElementById('telefonoe').value;
            var direccion=document.getElementById('direccionE').value;
            if(nombre==""){
                 alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: nombre no puede ir vacio', 'success', 5, function(){});
            }
            if(telefono==""){
                 alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: telefono no puede ir vacio', 'success', 5, function(){});
            }
            if(direccion==""){
                 alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: direccion no puede ir vacio', 'success', 5, function(){});
            }
            if(!nombre=="" && !telefono=="" && !direccion==""){
                   var datos=$("#frmEmp").serialize();
                   $.ajax({
                    type:"POST",
                    url:"../metodosAjax/guardar-proveedor.php",
                    data:datos,
                    success:function(resp){
                            $("#frmEmp")[0].reset(); 
                            $('#nuevoproveedor').modal('hide'); 
                            document.getElementById('empresa').value=nombre;
                                mostrarMensaje('Se guardo correctamente','success',null,"El nombre de la empresa registrada es "+resp,true);

                    }
                   });
                  
            }
      }
      function GuardarProveedor(){
            var nombrempresa=document.getElementById('empresa').value;
            var proveedor=document.getElementById('nombreproveedor').value;
            var telefono=document.getElementById('telefono').value;
            var correo=document.getElementById('correo').value;
            if(nombrempresa==""){
                 alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: nombre de la empresa no puede ir vacio', 'success', 5, function(){});
            }
            if(proveedor==""){
                 alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: nombre proveedor no puede ir vacio', 'success', 5, function(){});
            }
            if(telefono==""){
                 alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: telefono no puede ir vacio', 'success', 5, function(){});
            }
            if(correo==""){
                 alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: correo no puede ir vacio', 'success', 5, function(){});
            }
            if(validar_email(correo)==false ){
                 alertify.error('<strong style="font-size: 14px;font-weight: bold;">Error</strong>: correo no valido', 'success', 5, function(){});
            }
            if(!proveedor=="" && !nombrempresa=="" && !telefono=="" & (!correo=="" && validar_email(correo))){
                   var datos=$("#frmproveedor").serialize();
                   $.ajax({
                    type:"POST",
                    url:"../metodosAjax/guardar-proveedor.php",
                    data:datos,
                    success:function(resp){
                            document.getElementById("frmproveedor").reset();
                            mostrarMensaje('Se guardo correctamente','success',null,"El nombre del proveedor registrado es "+resp,true);
                    }
                   });
                  
            }

      }
      function cancelar(){
        document.getElementById("frmproveedor").reset();
      }
      function validar_email(c) 
     {
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(c) ? true : false;
     }
      $(document).ready(function(){
            $("#telefonoe").mask("0000-0000");
            $("#telefono").mask("0000-0000");
        });
    </script>
</head>
<body onload="mensaje()">
    <?php
    include "../from/menu.php"
    ?>
        <div class="content-page-container full-reset custom-scroll-containers">
            <div style="margin: 40px 0;"></div>
            <div class="container">
                <div class="page-header">
                    <h1 class="all-tittles">Animal Pet's <small>Administración</small></h1>
                </div>
            </div>
            <div class="container-fluid">
                <ul class="nav nav-tabs nav-justified" style="font-size: 17px;">
                    <li role="presentation"><a href="usuario.php">Gestionar Usuarios</a></li>
                    <li role="presentation" class="active"><a href="proveedor.php">Gestionar Proveedores</a></li>
                    <li role="presentation"><a href="datosclinica.php">Informacion Clinica</a></li>
                </ul>
            </div>
            <div class="container-fluid" style="margin: 20px 0;">
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 lead">
                        <ol class="breadcrumb">
                            <li class="active">Nuevo</li>
                            <li><a href="listaproveedor.php">Listado</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="container-flat-form">
                    <div class="title-flat-form title-flat-blue">Registrar</div>
                    <form id="frmproveedor" name="frmproveedor" method="post" action="">
                      <input type="hidden" name="bandera" id="bandera" value="">
                        <div class="row">
                            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                <div class="group-material">
                                    <div style="width: 70%;float:left;margin-right: 10%;">
                                        <input type="text" name="empresa" id="empresa" class="material-control tooltips-general" placeholder="Empresa..."  data-toggle="tooltip" autocomplete="off" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);" list="listaEmpre">
                                        <datalist id="listaEmpre">
                                            <?php
                                            include"../config/conexion.php";
                                            $cosulta="SELECT distinct(nombre) FROM `empresa` ORDER BY nombre";
                                             $resultado = $conexion->query($cosulta);
                                              if($resultado){
                                               while($fila = $resultado->fetch_object()){
                                                echo  "<option value='$fila->nombre'> ";
                                                 }
                                               }
                                            ?>
                                        </datalist>
                                        <label>Nombre de la empresa</label>
                                    </div>
                                    <div style="float:left;margin-left: 2%;margin-top: 1%;">

                                        <button type="submit" class="btn btn-add" data-toggle="modal" data-target="#nuevoproveedor"><i class="zmdi zmdi-plus"></i> &nbsp;&nbsp; Agregar</button>
                                    </div>
                                </div>
                                <div style="margin: 15% 0;"></div>
                                <div class="group-material">
                                    <div style="width: 50%;float:left">
                                        <input id="nombreproveedor" name="nombreproveedor" type="text" class="material-control tooltips-general" placeholder="Nombre Completo"  data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);">
                                        <label>Nombre</label>
                                    </div>
                                    <div style="width: 45%;float:left;margin-left: 5%;">
                                        <input id="telefono" name="telefono" type="text" class="material-control tooltips-general" placeholder="####-####" required="" data-toggle="tooltip" maxlength="9" data-placement="top" title="Numero de celular valido" onkeypress="return solonumero(event);">
                                        <label style="margin-left: 55%;">Telefono</label>
                                    </div>
                                </div>
                                <div style="margin: 30% 0;"></div>
                                <div class="group-material">
                                    <input id="correo" name="correo" type="email" class="material-control tooltips-general" placeholder="Ejemplo@gmail.com..." data-toggle="tooltip" data-placement="top" title="Correo">
                                    <label>Correo</label>
                                </div>
                                <p class="text-center" style="margin-top: 10%">
                                    <button type="button" class="btn btn-primary" onclick="GuardarProveedor()"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                                    <button type="reset" class="btn btn-info" style="margin-right: 20px;" onclick="cancelar()"><i class="zmdi zmdi-refresh-alt"></i> &nbsp;&nbsp; Cancelar</button>
                                </p>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="modal fade" id="nuevoproveedor">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center>
                                <h5 class="modal-title"> Registrar Empresa</h5></center>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> &times; </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid" style="margin: 20px 0;"></div>
                            <div class="container-fluid">
                                <div class="col-xs-12 col-sm-offset-0">
                                    <div class="title-flat-form title-flat-blue">Registrar</div>
                            <form id="frmEmp" name="frmEmp" method="post" action="">
                             <input type="hidden" name="bandera" id="bandera" value="">
                                <div class="col-xs-4 col-sm-5 col-sm-offset-1">
                                    <div class="group-material">
                                        <input id="nombreE" name="nombreE" type="text" class="material-control tooltips-general" placeholder="Empresa" required="" data-toggle="tooltip" data-placement="top" title="Contraseña" onkeypress="return olonumero(event);">
                                        <label style="margin-left: 0%;">Nombre</label>

                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-5 col-sm-offset-1">
                                    <div class="group-material">
                                        <input id="telefonoe" name="telefonoe" type="text" class="material-control tooltips-general" placeholder="####-####" required="" data-toggle="tooltip" maxlength="9" data-placement="top" title="Solo numeros" onkeypress="return solonumero(event);">
                                        <label>Teléfono</label>
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-5 col-sm-offset-1" style="margin-left: 6%;">
                                    <label style="color: #53a5b4;font-weight: bold;">Dirección</label>
                                </div>
                                <div style="margin-left: 6%;" class="col-xs-8 col-sm-11 col-sm-offset-1">
                                    <div class="group-material" style="margin-bottom: 2%;margin-right: 5%;">
                                        <textarea id="direccionE" name="direccionE" type="text" class="material-control tooltips-general" placeholder="San Vicente" required="" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" style="width: 100%; height: 1%;" data-original-title="Solo letras"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                        </div>
                        <div class="modal-footer">

                                <center>
                                    <button type="submit" class="btn btn-primary" onclick="GuardarEmpresa()"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                                </center>

                            </div>
                    </div>
                </div>
            </div>
            <footer class="footer full-reset">
                <div class="footer-copyright full-reset all-tittles">
                    <center>Universidad de EL Salvador-FMP 2019</center>
                </div>
            </footer>
        </div>
</body>
</html>