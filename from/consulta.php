<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Proveedor</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="../assets/img/logoclinica.png" />
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
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
              <li role="presentation"><a href="personal.php">Usuarios</a></li>
              <li role="presentation" class="active"><a href="proveedor.php">Proveedores</a></li>
              <li role="presentation"><a href="datosclinica.php">Datos Clinica</a></li>
            </ul>
        </div>
        <div class="container-fluid"  style="margin: 20px 0;">
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
                <div class="title-flat-form title-flat-blue">Registrar un nuevo proveedor</div>
                <form>
                     <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                        <div class="group-material">
                                <div style="width: 80%;float:left;">
                                    <input itype="search" name="" id="input-search" class="material-control tooltips-general" placeholder="Proveedor..." required="" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);" list="listaEmpre">
                                    <datalist id="listaEmpre">
                                        <option value='Empresa 1'>
                                        <option value='Empresa 2'>
                                        <option value='Empresa 3'>
                                        <option value='Empresa 4'>
                                        <option value='soola'>
                                    </datalist>
                                <label>Nombre de la empresa</label>
                </div>
                                <div style="float:left;margin-left: 2%;margin-top: 1%;">
                
                                <button type="submit" class="btn btn-add" data-toggle= "modal" data-target= "#nuevoproveedor" ><i class="zmdi zmdi-plus"></i> &nbsp;&nbsp; Agregar</button>
                                </div>
                            </div>
                            <div style="margin: 15% 0;"></div>
                            <div class="group-material">
                                <div style="width: 50%;float:left">
                                    <input id="nombreclinica" name="nombreclinica" type="text" class="material-control tooltips-general" placeholder="Proveedor..." required="" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);">
                                <label>Nombre</label>
                                </div>
                                <div style="width: 45%;float:left;margin-left: 5%;">
                                  <input id="nombreclinica" name="nombreclinica" type="text" class="material-control tooltips-general" placeholder="####-####" required="" data-toggle="tooltip" data-placement="top" title="Numero de celular valido" onkeypress="return olonumero(event);">
                                <label style="margin-left: 55%;">Telefono</label>  
                                </div>
                            </div>
                            <div style="margin: 30% 0;"></div>
                            <div class="group-material">
                                <input id="nombreclinica" name="nombreclinica" type="text" class="material-control tooltips-general" placeholder="Nombre..." required="" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);">
                                <label>Correo</label>
                            </div>
                            <p class="text-center" style="margin-top: 10%">
                                <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                                <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-refresh-alt"></i> &nbsp;&nbsp; Cancelar</button>
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
                            Datos de la empresa
                        </div>
                        <div class="modal-footer">
                            <center>
                                <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                                <button type="button" data-dismiss="modal" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-refresh-alt"></i> Cancelar</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        <footer class="footer full-reset">
            <div class="footer-copyright full-reset all-tittles"> <center>Pie de pagina en construccion...</center></div>
        </footer>
    </div>
</body>
</html>