<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Informacion de Proveedor</title>
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
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/alertify.min.js"></script>
    <script src="../assets/js/controlador.js"></script>
    <script src="../assets/js/sweetalert2.min.js"></script>
    <script src="../assets/js/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="../assets/css/sweet-alert.css">
    <link rel="stylesheet" href="../assets/css/sweetalert2.min.css">
    <script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.mask.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script type="text/javascript" src="../assets/datatable/js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../assets/datatable/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../assets/datatable/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="../assets/datatable/datatable.js"></script>
    <script type="text/javascript">
        function Modificar(){
            var empresa=document.getElementById('empresam').value;
            var proveedor=document.getElementById('proveedorm').value;
            var correo=document.getElementById('correom').value;
            var tel=document.getElementById('telefonom').value;
            if(empresa==""){
                 alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: nombre de la empresa no puede ir vacio', 'success', 5, function(){});
            }
            if(proveedor==""){
                 alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: nombre proveedor no puede ir vacio', 'success', 5, function(){});
            }
            if(tel==""){
                 alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: telefono no puede ir vacio', 'success', 5, function(){});
            }
            if(correo==""){
                 alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: correo no puede ir vacio', 'success', 5, function(){});
            }
            if(validar_email(correo)==false ){
                 alertify.error('<strong style="font-size: 14px;font-weight: bold;">Error</strong>: correo no valido', 'success', 5, function(){})
             }
             if(!proveedor=="" && !empresa=="" && !tel=="" & (!correo=="" && validar_email(correo))){
                   var datos=$("#frmmodificar").serialize();
                   $.ajax({
                    type:"POST",
                    url:"../metodosAjax/guardar-proveedor.php",
                    data:datos,
                    success:function(resp){
                       document.getElementById('miTabla').innerHTML=resp;
                       mostrarMensaje('Se Modifico','success',null,"El registro a sido modificado satisfactoriamente ",true);
                    }
                   });
                  
            }
        }
        function editar(id){
                  $.ajax({
                    type:"POST",
                    url:"../metodosAjax/guardar-proveedor.php",
                    data:{val:id},
                    success:function(resp){
                         document.getElementById('datos').innerHTML=resp;
                    }
                   });
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
                    url:"../metodosAjax/guardar-proveedor.php",
                    data:{valor:id},
                    success:function(resp){
                         document.getElementById('miTabla').innerHTML=resp;
                         mostrarMensaje('Se Elimino','success',null,"El registro fue eliminado satisfactoriamente",true);
                    }
                   });
                    }
                })
        }
        function validar_email(c) 
     {
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(c) ? true : false;
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
                    <h1 class="all-tittles">animal pet's <small>Administración</small></h1>
                </div>
            </div>
            <div class="container-fluid">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
              <li role="presentation"><a href="usuario.php">Gestionar Usuarios</a></li>
              <li role="presentation" class="active"><a href="proveedor.php">Gestionar Proveedores</a></li>
              <li role="presentation"><a href="#">Informacion Clinica</a></li>
            </ul>
        </div>
            <div class="container-fluid" style="margin: 10px 0;">
                <div class="row">
                    <div class="col-xs-12 lead">
                        <ol class="breadcrumb">
                            <li><a href="proveedor.php">Nuevo</a></li>
                            <li class="active">Listado</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="div-table">
                    <table id="miTabla" class="display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre Empresa</th>
                                <th>Nombre Proveedor</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "../config/conexion.php";
                            $result=$conexion->query("(SELECT e.nombre as empresa, p.nombre as nombre, p.telefono as tel, p.correo as correo, p.id_proveedor as id, f.id_proveedor as idfac FROM empresa as e INNER JOIN proveedores as p ON p.id_empresa = e.id_empresa RIGHT JOIN factcompra as f ON f.id_proveedor = p.id_proveedor)
                                UNION
                                (SELECT e.nombre as empresa, p.nombre as nombre, p.telefono as tel, p.correo as correo, p.id_proveedor as id,f.id_proveedor as idfac FROM empresa as e INNER JOIN proveedores as p ON p.id_empresa = e.id_empresa LEFT JOIN factcompra as f ON f.id_proveedor = p.id_proveedor)");
                            if($result){
                                while($fila = $result->fetch_object()){ ?>
                                <tr>
                                <td><?php echo $fila->empresa ?></td>
                                <td><?php echo $fila->nombre ?></td>
                                <td><?php echo $fila->tel ?></td>
                                <td><?php echo $fila->correo ?></td>
                                <td><?php
                                if($fila->idfac==null){?>
                                    <a href="#" data-toggle= "modal" data-target= "#modificarproveedor" class="material-control tooltips-general" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Editar" onclick="editar(<?php echo $fila->id?>)">
                                        <i class="zmdi zmdi-edit" style="color: #31920D;">
                                        </i>
                                    </a>
                                    &nbsp;&nbsp;
                                    <a href="#" class="material-control tooltips-general" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="eliminar(<?php echo $fila->id?>)">
                                        <i class="zmdi zmdi-delete" style="color: #F91D0B;"></i>
                                    </a>
                                <?php }
                                if($fila->idfac!=null){?>
                                    <a href="#" data-toggle= "modal" data-target= "#modificarproveedor" class="material-control tooltips-general" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Editar" onclick="editar(<?php echo $fila->id?>)">
                                        <i class="zmdi zmdi-edit" style="color: #31920D;">
                                        </i>
                                    </a>
                                <?php }?>
                                </td>
                            </tr>
                            <?php
        }
}
?>
                        </tbody>
                    </table>
                </div><div style="margin: 6.5% 0;"></div>
            </div>
            <div class="modal fade" id="modificarproveedor">
                <div class="modal-dialog" style="width: 50%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center>
                                <h5 class="modal-title"> Modificar Proveedor</h5></center>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> × </span>
                            </button>
                        </div>
                        <div class="modal-body" id="datos">
                            <div class="container-fluid">
                               <div class="col-xs-12 col-sm-offset-0">
                                    <div class="title-flat-form title-flat-blue">Modificar</div>
                                    <form id="frmmodificar" name="frmmodificar" method="post" action="">
                            <div class="col-xs-5 col-sm-5 col-sm-offset-1" style="margin-left: 9%;">
                            <div class="group-material">
                                <input id="empresam" name="empresam" type="text" class="material-control tooltips-general" placeholder="Nombre..." required="" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);">
                                <label>Nombre de la empresa</label>
                            </div></div><div class="col-xs-5 col-sm-5 col-sm-offset-0">
                        <div class="group-material">
                                <input id="proveedorm" name="proveedorm" type="text" class="material-control tooltips-general" placeholder="Proveedor..." required="" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);">
                                <label>Nombre</label>
                            </div></div>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                 $("#telefonom").mask("0000-0000");
                             });
                            </script>
                            <div class="col-xs-5 col-sm-5 col-sm-offset-1" style="margin-left: 9%;">
                            <div class="group-material">
                                <input id="telefonom" name="telefonom" type="text" class="material-control tooltips-general" placeholder="####-####" required="" data-toggle="tooltip" maxlength="9" data-placement="top" title="Numero de celular valido" onkeypress="return solonumero(event);">
                                <label>Telefono</label>
                            </div></div><div class="col-xs-5 col-sm-5 col-sm-offset-0">
                            <div class="group-material">
                                <input id="correom" name="correom" type="text" class="material-control tooltips-general" placeholder="ejemplo@gmail.com" required="" data-toggle="tooltip" data-placement="top" title="Digite un Correo valido">
                                <label>Correo</label>
                            </div></div></form>
                        </div>
                    </div>
                        </div>
                        <div class="modal-footer">
                            <center>
                             <button type="button" class="btn btn-success" data-dismiss="modal" style="margin-right: 20px;" onclick="Modificar()">
                                    <i class="zmdi zmdi-edit" style="color: #fff;">
                                        </i>&nbsp;&nbsp;Modificar</button>
                                <button type="button" data-dismiss="modal" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-refresh-alt"></i> Cancelar</button>
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