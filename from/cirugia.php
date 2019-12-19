<?php session_start();
if($_SESSION["logeado"] == false) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Gestionar Cirugias</title>
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
              <h1 class="all-tittles">animal pet's <small>Atencion Medica</small></h1>
            </div>
        </div>
        <div class="container-fluid">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
              <li role="presentation"><a href="citas.php">Gestionar Citas</a></li>
              <li role="presentation" class="active"><a href="cirugia.php">Gestionar Cirugias</a></li>
            </ul>
        </div>
        <div class="container-fluid"  style="margin: 20px 0;">
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                      <li class="active">Nuevo</li>
                      <li><a href="listacirugias.php">Listado</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form" style="width: 70%;">
                <div class="title-flat-form title-flat-blue">Registrar</div>
                <form>
                      <div class="row">
                       <div class="col-sm-4 col-sm-offset-1">
                        <div class="group-material">
                                    <input type="text" name="" id="nombreexp" class="material-control tooltips-general" placeholder="OP956069" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" list="listaExp" data-original-title="Solo letras">
                                    <datalist id="listaExp">
                                        <option value="Expediente 1">Expediente 1</option>
                                        <option value="Expediente 2">Expediente 2</option>
                                        <option value="Expediente 3">Expediente 3</option>
                                        <option value="Expediente 4">Expediente 4</option>
                                        <option value="Expediente 5">Expediente 5</option>
                                    </datalist>
                                <label>Expediente</label>
                            </div></div>
                            <div class="col-sm-1" style="margin-top: 0.5%;margin-left: -3%;">
                            <button type="submit" class="btn btn-add" data-toggle="modal" data-target="#exped"><i class="zmdi zmdi-plus"></i> &nbsp;&nbsp; Agregar</button> </div>
                            <div class="col-xs-3 col-sm-5 col-sm-offset-1">
                        <div class="group-material">
                                     <input id="nombreclinica" name="nombreclinica" type="text" class="material-control tooltips-general" placeholder="Medico..." required="" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" list="listadoc" data-original-title="Solo letras">
                                    <datalist id="listadoc">
                                        <option value="Doctor 1">Doctor 1</option>
                                        <option value="Doctor 2">Doctor 2</option>
                                        <option value="Doctor 3">Doctor 3</option>
                                        <option value="Doctor 4">Doctor 4</option>
                                        <option value="Doctor 5">Doctor 5</option>
                                    </datalist>
                                <label>Nombre</label>
                            </div></div>
                            <div class="col-sm-5 col-sm-offset-1">
                        <div class="group-material">
                                    <input type="text" name="" id="nombreexp" class="material-control tooltips-general" placeholder="Nombre de cirugia..." required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" list="listacir" data-original-title="Solo letras">
                                    <datalist id="listacir">
                                        <option value="Expediente 1">Expediente 1</option>
                                        <option value="Expediente 2">Expediente 2</option>
                                        <option value="Expediente 3">Expediente 3</option>
                                        <option value="Expediente 4">Expediente 4</option>
                                        <option value="Expediente 5">Expediente 5</option>
                                    </datalist>
                                <label>Cirugia</label>
                            </div></div>
                            <div style="margin-left: 2%;" class="col-sm-3 col-sm-offset-1">
                        <div class="group-material">
                                    <input type="date" name="" id="nombreexp" class="material-control tooltips-general" placeholder="OP956069" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras">
                                <label>Fecha</label>
                            </div></div>
                            <div class="col-sm-2 col-sm-offset-0" style="margin-left: 0.6%;">
                        <div class="group-material">
                                    <input type="time" name="" id="nombreexp" class="material-control tooltips-general" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras">
                                <label>Hora</label>
                            </div></div>
                            <div style="margin-top: -2%;margin-lef: 5%;" class="col-xs-12 col-sm-12 col-sm-offset-1"><label style="color: #53a5b4;font-weight: bold;">Diagnostico</label></div>
                            <div class="col-xs-12 col-sm-11 col-sm-offset-1">
                                <div class="group-material" style="margin-bottom: 2%;">
                                            <textarea id="nombreclinica" name="nombreclinica" type="text" class="material-control tooltips-general" placeholder="OS5969696" required="" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" style="width: 93%;" data-original-title="Solo letras"></textarea>
                                        </div>
                            </div>
                            <p class="text-center" style="margin-top: 20%">
                                <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                                <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-refresh-alt"></i> &nbsp;&nbsp; Cancelar</button>
                            </p> 
                   </div>
                      
               </form>

            </div>
        </div>
<?php
    include "../from/addexpediente.php"
    ?>
        <footer class="footer full-reset">
            <div class="footer-copyright full-reset all-tittles"> <center>Universidad de EL Salvador-FMP 2019</center></div>
        </footer>
    </div>
</body>
</html>