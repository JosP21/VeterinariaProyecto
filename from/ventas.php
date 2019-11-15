<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Gestionar Venta</title>
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
<body onload="mensaje()">
  <?php
  include "../from/menu.php"
  ?>
  <div class="content-page-container full-reset custom-scroll-containers">
    <div style="margin: 40px 0;"></div>
    <div class="container">
      <div class="page-header">
        <h1 class="all-tittles">Animal Pet's <small>&nbsp;&nbsp;Ventas</small></h1>
      </div>
    </div>
    <div class="container-fluid" style="border-bottom: 1px solid #00000042;margin-right: 1%;margin-left: 1%;">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;width: 40%;">
              <li role="presentation" class="active"><a href="ventas.php">Gestionar Factura</a></li>
            </ul>
        </div>
    <div class="container-fluid"  style="margin: 20px 0;">
    </div>

    <div class="container-fluid">
          <div class="container-flat-form">
            <div class="title-flat-form title-flat-blue">Facturar</div>
            <form>
              <div class="row">
                <div class="col-sm-2 col-sm-offset-10" style="margin-left: 76%;margin-top: -4%;">
                        <div class="group-material">
                                    <input type="text" name="" id="nombreexp" class="material-control tooltips-general" placeholder="Factura #" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);" style="pointer-events: none;border: 1px solid #404142;">
                            </div></div>
                       <div class="col-sm-4 col-sm-offset-1">
                        <div class="group-material">
                                    <input type="text" name="" id="nombreexp" class="material-control tooltips-general" placeholder="Nombre..." required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);" list="listaclien">
                                    <datalist id="listaclien">
                                        <option value="Cliente 1">Cliente 1</option>
                                        <option value="Cliente 2">Cliente 2</option>
                                        <option value="Cliente 3">Cliente 3</option>
                                        <option value="Cliente 4">Cliente 4</option>
                                        <option value="Cliente 5">Cliente 5</option>
                                    </datalist>
                                <label>Cliente</label>
                            </div></div>
                            <div class="col-sm-1" style="margin-top: 0.5%;margin-left: -1.5%;">
                            <button type="submit" class="btn btn-add" data-toggle="modal" data-target="#cliente"><i class="zmdi zmdi-plus"></i> &nbsp;&nbsp; Agregar</button> </div>
                            <div class="col-sm-5 col-sm-offset-1">
                        <div class="group-material">
                                    <input type="text" name="" id="nombreexp" class="material-control tooltips-general" placeholder="Nombre..." required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);" style="pointer-events: none;">
                                <label>Empleado</label>
                            </div></div>
                            <hr style="margin-top: 10%;margin-left: -86%;width: 85%;border-top: 1px solid #0000009e;">

                            <div class="col-sm-4 col-sm-offset-1">
                        <div class="group-material">
                                    <input type="text" name="" id="nombreexp" class="material-control tooltips-general" placeholder="Nombre..." required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);" list="listap">
                                    <datalist id="listap">
                                        <option value="Producto 1">Producto 1</option>
                                        <option value="Producto 2">Producto 2</option>
                                        <option value="Producto 3">Producto 3</option>
                                        <option value="Producto 4">Producto 4</option>
                                        <option value="Producto 5">Producto 5</option>
                                    </datalist>
                                <label>Producto</label>
                            </div></div>
                            <div class="col-sm-2 col-sm-offset-0">
                            <div class="group-material">
                                    <input type="number" name="" id="nombreexp" class="material-control tooltips-general" min="1" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="Solo Numeros" onkeypress="return sololnumero(event);">
                                <label>Cantidad</label>
                            </div></div>
                            <div class="col-sm-2 col-sm-offset-0">
                            <div class="group-material">
                                    <input type="text" name="" id="nombreexp" class="material-control tooltips-general" placeholder="Nombre.." required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="Solo Numeros" style="pointer-events: none;">
                                <label>Stock</label>
                            </div></div>
                            <div class="col-sm-3 col-sm-offset-0">
                            <div class="group-material">
                                    <input type="text" name="" id="nombreexp" class="material-control tooltips-general" placeholder="0.00" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="Solo Numeros"  style="pointer-events: none;">
                                <label>Precio ($)</label>
                            </div></div>
                            <p class="" style="margin-left: 8%;">
                                <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-plus"></i> &nbsp;&nbsp; Agregar Venta</button>
                            </p> 
                            <div class="container-fluid col-sm-6 col-sm-offset-1">
                      <div class="div-table">
                        <table id="miTabla" class="display responsive nowrap" style="width:100%">
                          <thead>
                            <tr>
                              <th>Cantidad</th>
                              <th>Nombre Producto</th>
                              <th>Precio Unitario</th>
                              <th>Total</th>
                              <th>Acción</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>Comida para perros</td>
                              <td>$ 4.50</td>
                              <td>$ 4.50</td>
                              <td>
                                <a href="#" onclick="" class="material-control" required="" maxlength="50" btne-data-title="Eliminar">
                                  <i class="zmdi zmdi-delete" style="color: #F91D0B;">
                                  </i>
                                </a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div><div style="margin: 6.5% 0;"></div>
                    </div> 

                    <div class="col-sm-4 col-sm-offset-1">
                       <div class="container-flat-form">
                         
                          <div class="container-fluid">
                            <div class="row">
                              <div class="col-sm-9">
                                <p></p><h4 style="margin-top: 20%;">Cantidad de Productos: </h4><p></p> 
                              </div> 
                              <div class="col-sm-3">
                                <input type="text" min="1" style="/*! height: 1px; */ margin-top: 21px;" class="material-control" readonly="readonly" value="01">
                              </div> 
                            </div>
                          </div>                              
                          <hr style="color: blue" width="90%" size="3" align="center">
                          <p></p><h4 align="center">TOTAL A PAGAR</h4>
                            <input type="text-center" class="material-control tooltips-general" readonly="readonly" style="text-align: center; width: 50%; margin-left:62px; background-color: #f4f4f4; color: black;" value="$4.50">
                          <p></p> 
                          <hr style="color: blue" width="90%" size="3" align="center">
                          <!--BotonFacturar-->
                          <p class="text-center" style="margin-top: 10%">
                            <button type="button" class="btn btn-add" data-toggle="modal" data-target="#modal-Factura"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Facturar</button>
                            <button type="reset" class="btn btn-info" style=""><i class="zmdi zmdi-refresh-alt"></i> &nbsp;&nbsp; Cancelar</button>
                          </p> 
                      </div>
                    </div>

                          </div>
             </form>
                        </div>
                      </div>
                      <!--Seccion2-->
                    <!--Modal-->
                    <div class="modal fade" id="modal-Factura" role="dialog">
                     <div class="modal-dialog">
                       <div class="modal-content">
                         <div class="modal-header">
                           <center>
                             <h5 class="modal-title">Facturación</h5></center>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true"> &times; </span>
                             </button>
                           </div>
                           <div class="modal-body">
                            <div class="container-fluid" style="margin: 20px 0;"></div>
                            Datos de la factura
                          </div>
                          <div class="modal-footer">
                            <center>
                              <button type="button" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Imprimir</button>
                              <button type="button" data-dismiss="modal" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-refresh-alt"></i> Cancelar</button>
                            </center>
                          </div>
                        </div>
                      </div>
                    </div>
                    <footer class="footer full-reset">
               <div class="footer-copyright full-reset all-tittles"><center>Universidad de EL Salvador-FMP 2019</center></div>
             </div>
           </footer>
                  </div> 
                </div>
                <div class="modal fade" id="cliente" style="overflow-y: scroll;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center>
                                <h5 class="modal-title"> Cliente</h5></center>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> &times; </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid" style="margin: 5px 0;"></div>

                            <div class="container-fluid">
                               <div class="col-xs-12 col-sm-offset-0">
                                    <div class="title-flat-form title-flat-blue">Registrar</div>
                                     <form>
                                        <div class="row">
                                            <div style="margin-left: 6%;/*! margin-right: -20%; */" class="col-sm-6 col-sm-offset-0">
                        <div class="group-material" style="margin-right: 15%;">
                                    <input type="text" name="" id="nombreexp" class="material-control tooltips-general" placeholder="Juan" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras">
                                <label>Nombre</label>
                            </div></div>
                            <div class="col-sm-5 col-sm-offset-0">
                        <div class="group-material">
                                    <input type="text" name="" id="nombreexp" class="material-control tooltips-general" placeholder="Perez" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras">
                                <label>Apellido</label>
                            </div></div>
                            <div style="margin-top: -2%;" class="col-sm-6 col-sm-offset-1">
                                <fieldset style="margin-right: 11%;">
                                    <legend>Genero</legend>
                                    <div style=""><center>
                                    <div class="contenedorad">
                                <div class="radio">
                                    <input type="radio" name="genero" id="masculino" value="Masculino">
                                    <label for="masculino">Masculino</label>
                                    <input type="radio" name="genero" id="femenino" value="Femenino">
                                    <label for="femenino">Femenino</label>
                            </div>
                        </div></center>
                    </div>
                                </fieldset>
                            </div>
                            <div style="margin-left: -1%;margin-top: 2%;" class="col-sm-5 col-sm-offset-0">
                        <div class="group-material">
                                    <input type="text" name="" id="nombreexp" class="material-control tooltips-general" placeholder="7777-7777" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" list="listaExp" data-original-title="Solo letras">
                                <label>Telefono</label>
                            </div></div>
                            <div class="col-xs-12 col-sm-1 col-sm-offset-1" style="margin-left: 6%;"><label style="color: #53a5b4;font-weight: bold;">Direccion</label></div>
                            <div style="margin-left: 6%;" class="col-xs-12 col-sm-11 col-sm-offset-0">
                                <div class="group-material" style="margin-bottom: 2%;margin-right: 5%;">
                                            <textarea id="nombreclinica" name="nombreclinica" type="text" class="material-control tooltips-general" placeholder="OS5969696" required="" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" style="width: 102%; height: 1%;" data-original-title="Solo letras"></textarea>
                                        </div>
                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <center>
                                <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
                
              </body>
           </html>