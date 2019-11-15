<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Gestionar Servicios</title>
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
    <link rel="stylesheet" href="../assets/datatable/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../assets/datatable/css/responsive.dataTables.min.css">
    <script type="text/javascript" src="../assets/datatable/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../assets/datatable/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="../assets/datatable/datatable.js"></script>
</head>
</head>
<body onload="mensaje()">
    <?php
    include "../from/menu.php"
    ?>
    <div class="content-page-container full-reset custom-scroll-containers">
        <div style="margin: 40px 0;"></div>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Animal Pet's <small>&nbsp;&nbsp;Servicios</small></h1>
          </div>
      </div>
      <div class="container-fluid">
      <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
        <li role="presentation" class="active"><a href="servicios.php">Gestionar Servicios</a></li>
        <li role="presentation"><a href="inventarioser.php">Inventario</a></li>
      </ul>
    </div>
        <div class="container-fluid"  style="margin: 20px 0;"></div>
  <div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb">
              <li class="active">Nuevo</li>
              <li><a href="listaservicios.php">Servicios Realizados</a></li>
          </ol>
      </div>
  </div>
</div>

<div class="container-fluid">
        <div class="container-flat-form" style="width: 80%;">
            <form>
               <div class="title-flat-form title-flat-blue">Registrar</div>
               <div class="row">
                <div class="col-sm-4 col-sm-offset-1" style="margin-left: 10%;">
                        <div class="group-material">
                                    <input type="text" name="" id="nombreexp" class="material-control tooltips-general" placeholder="OP956069" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);" list="listaExp">
                                    <datalist id="listaExp">
                                        <option value="Expediente 1">Expediente 1</option>
                                        <option value="Expediente 2">Expediente 2</option>
                                        <option value="Expediente 3">Expediente 3</option>
                                        <option value="Expediente 4">Expediente 4</option>
                                        <option value="Expediente 5">Expediente 5</option>
                                    </datalist>
                                <label>Expediente</label>
                            </div></div>
                            <div class="col-sm-1" style="margin-top: 0.5%">
                            <button type="submit" class="btn btn-add" data-toggle="modal" data-target="#exped"><i class="zmdi zmdi-plus"></i> &nbsp;&nbsp; Agregar</button> </div>
                            <div class="col-sm-4 col-sm-offset-1">
                        <div class="group-material">
                                    <input type="text" name="" id="nombreexp" class="material-control tooltips-general" placeholder="Nombre..." required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);" list="listaEmp">
                                    <datalist id="listaEmp">
                                        <option value="Empleado 1">Empleado 1</option>
                                        <option value="Empleado 2">Empleado 2</option>
                                        <option value="Empleado 3">Empleado 3</option>
                                        <option value="Empleado 4">Empleado 4</option>
                                        <option value="Empleado 5">Empleado 5</option>
                                    </datalist>
                                <label>Empleado</label>
                            </div></div>
                            <hr style="color: #0056b2;width: 80%;margin-left: -80%;margin-top: 7%;">
                            <div class="col-sm-4 col-sm-offset-1" style="margin-left: 10%;">
                        <div class="group-material">
                                    <input type="text" name="" id="nombreexp" class="material-control tooltips-general" placeholder="Nombre.." required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);" list="listaServ">
                                    <datalist id="listaServ">
                                        <option value="Servicio 1">Servicio 1</option>
                                        <option value="Servicio 2">Servicio 2</option>
                                        <option value="Servicio 3">Servicio 3</option>
                                        <option value="Servicio 4">Servicio 4</option>
                                        <option value="Servicio 5">Servicio 5</option>
                                    </datalist>
                                <label>Servicio</label>
                            </div></div>
                            <div class="col-sm-3 col-sm-offset-1">
                            <div class="group-material">
                                    <input type="text" name="" id="nombreexp" class="material-control tooltips-general" placeholder="Nombre.." required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="Solo numeros" onkeypress="return solonumero(event);">
                                <label>Precio ($)</label>
                            </div></div>
                            <div class="col-sm-1" style="margin-top: 0.5%;margin-left: 2%;">
                            <button type="submit" class="btn btn-add" data-toggle="modal" data-target="#exped"><i class="zmdi zmdi-plus"></i> &nbsp;&nbsp; Agregar</button> </div>

                            <!--Tabla!-->
                            <div class="col-sm-7 col-sm-offset-1" style="margin-left: 8%;">
                            <div class="div-table">
                                <table id="miTabla" class="display responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Servicio efectuado</th>
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
                                                <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-refresh-alt"></i> &nbsp;&nbsp; Cancelar</button></div>
                                        
                                    </div>
                                </div>
                          </div>
            </form>
                            </div>
                        </div> 
                        <?php
    include "../from/addexpediente.php"
    ?>
                        <footer class="footer full-reset">
                            <div class="footer-copyright full-reset all-tittles"><center>Universidad de EL Salvador-FMP 2019</center></div>
                        </footer>
                    </div>
                    </div>
                </body>
                </html>