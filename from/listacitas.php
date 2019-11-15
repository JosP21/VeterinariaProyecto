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
    <link rel="stylesheet" href="../assets/datatable/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../assets/datatable/css/responsive.dataTables.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="../assets/js/jquery-1.11.2.min.js"><\/script>')
    </script>
    <script src="../assets/js/modernizr.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script type="text/javascript" src="../assets/datatable/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../assets/datatable/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="../assets/datatable/datatable.js"></script>
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
                                <th>Expediente</th>
                                <th>Propietario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>PXO59687</td>
                                <td>Jose</td>
                                <td>
                                    <a href="#" data-toggle= "modal" data-target= "#modificarConsulta" class="material-control" required="" maxlength="50"  btnm-data-title="Editar">
                                        <i class="zmdi zmdi-edit" style="color: #31920D;">
                                        </i>
                                    </a>
                                    &nbsp;&nbsp;
                                    <a href="#" onclick="" class="material-control" required="" maxlength="50"btne-data-title="Eliminar">
                                        <i class="zmdi zmdi-delete" style="color: #F91D0B;">
                                        </i>
                                    </a>
                                    &nbsp;&nbsp;
                                    <button href="#" data-toggle= "modal" data-target= "#Consulta" class="material-control tooltips-general btn btn-return" required="" maxlength="50">Pasar Consulta
                                        <i class="zmdi zmdi-mail-send" style="color: #fff; margin-left: 6%">
                                        </i></button>
                                </td>
                            </tr>
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
                        <div class="modal-body">
                            <div class="container-fluid" style="margin: 20px 0;"></div>
                            <div class="col-xs-4 col-sm-5 col-sm-offset-1">
                        <div class="group-material">
                                    <input type="text" name="" id="nombreexp" class="material-control tooltips-general" placeholder="OP956069" required=""  data-min-length='1'data-selection-required='true'data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);" list="listaExp">
                                    <datalist id="listaExp">
                                        <option value='Expediente 1'>Expediente 1</option>
                                        <option value='Expediente 2'>Expediente 2</option>
                                        <option value='Expediente 3'>Expediente 3</option>
                                        <option value='Expediente 4'>Expediente 4</option>
                                        <option value='Expediente 5'>Expediente 5</option>
                                    </datalist>
                                <label>Expediente</label>
                            </div></div>
                            <div class="col-xs-4 col-sm-5 col-sm-offset-1">
                        <div class="group-material">
                                     <input id="nombreclinica" name="nombreclinica" type="text" class="material-control tooltips-general" placeholder="Medico..." required="" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);" list="listadoc">
                                    <datalist id="listadoc">
                                        <option value='Doctor 1'>Doctor 1</option>
                                        <option value='Doctor 2'>Doctor 2</option>
                                        <option value='Doctor 3'>Doctor 3</option>
                                        <option value='Doctor 4'>Doctor 4</option>
                                        <option value='Doctor 5'>Doctor 5</option>
                                    </datalist>
                                <label>Nombre</label>
                            </div></div>
                            <div class="col-xs-4 col-sm-5 col-sm-offset-1">
                                <fieldset>
                                    <legend>Prioridad</legend>
                                    <div><center>
                                    <div class="contenedorad">
                                <div class="radio">
                                    <input type="radio" name="prioridad" id="normal" value="Normal">
                                    <label for="normal">Normal</label>
                                    <input type="radio" name="prioridad" id="emergencia" value="Emergencia">
                                    <label for="emergencia">Emergencia</label>
                            </div></div></center></div>
                                </fieldset></div>
                            <div class="col-xs-4 col-sm-5 col-sm-offset-1">
                                <fieldset>
                                    <legend>Tipo</legend>
                                    <div><center>
                                    <div class="contenedorad">
                                <div class="radio">
                                    <input type="radio" name="tipo" id="consulta" value="Consulta">
                                    <label for="consulta">Consulta</label>
                                    <input type="radio" name="tipo" id="cita" value="Cita">
                                    <label for="cita">Cita</label>
                            </div>
                        </div></center>
                    </div>
                                </fieldset>
                            </div>
                            <div id="realizar">
                                <div class="container-fluid">
                                </div>
                                <hr style="color: #0056b2;" />
                                <div class="col-xs-4 col-sm-5 col-sm-offset-1">
                                   <div class="group-material">
                                       <input id="nombreclinica" name="nombreclinica" type="date" class="material-control tooltips-general" placeholder="Proveedor..." required="" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);">
                                <label>Fecha</label>
                                   </div>
                                </div>
                                <div class="col-xs-4 col-sm-5 col-sm-offset-1">
                                    <div class="group-material">
                                        <select class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Selecciones la empresa a la cual pertenece el proveedor">
                                    <option value="" disabled="" selected="">Hora</option>
                                    <option value="8:00 AM">8:00 AM</option>
                                    <option value="8:30 AM">8:30 AM</option>
                                    <option value="9:00 AM">9:00 AM</option>
                                    <option value="9:30 AM">9:30 AM</option>
                                    <option value="10:00 AM">10:00 AM</option>
                                    <option value="10:30 AM">10:30 AM</option>
                                    <option value="11:00 AM">11:00 AM</option>
                                    <option value="11:30 AM">11:30 AM</option>
                                    <option value="1:00 PM">1:00 PM</option>
                                    <option value="1:30 PM">1:30 PM</option>
                                </select>
                                <label>Hora</label>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="modal-footer">
                            <div class="col-sm-8">
                                <button type="button" class="btn btn-success">
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
                            <div class="container-fluid" style="margin: 1px 0;"></div>
                            <div class="col-xs-12 col-sm-12 col-sm-offset-0">
                                <fieldset>
                                    <legend>Datos</legend>
                                    <div style="margin-bottom: -20px;margin-left: 1%;" class="col-xs-4 col-sm-3 col-sm-offset-0">
                                        <div class="container-fluid" style="margin: 10px 0;"></div>
                                        <div class="group-material">
                                            <input id="nombreclinica" name="nombreclinica" type="text" class="material-control tooltips-general" placeholder="Propietario..." required="" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" style="pointer-events: none;" data-original-title="Solo letras">
                                            <label>Propietario</label>
                                        </div>
                                    </div>
                                    <div style="margin-bottom: -20px;" class="col-xs-4 col-sm-3 col-sm-offset-0">
                                        <div class="container-fluid" style="margin: 10px 0;"></div>
                                        <div class="group-material">
                                            <input id="nombreclinica" name="nombreclinica" type="text" class="material-control tooltips-general" placeholder="Nombre..." required="" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" style="pointer-events: none;" data-original-title="Solo letras">
                                            <label>Mascota</label>
                                        </div>
                                    </div>
                                    <div style="margin-bottom: -20px;" class="col-xs-4 col-sm-3 col-sm-offset-0">
                                        <div class="container-fluid" style="margin: 10px 0;"></div>
                                        <div class="group-material">
                                            <input id="nombreclinica" name="nombreclinica" type="text" class="material-control tooltips-general" placeholder="OS5969696" required="" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" style="pointer-events: none;" data-original-title="Solo letras">
                                            <label>Expediente</label>
                                        </div>
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
                                            <textarea id="nombreclinica" name="nombreclinica" type="text" class="material-control tooltips-general" placeholder="OS5969696" required="" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);" style="width: 100%;"></textarea>
                                        </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-sm-offset-0">
                                <fieldset>
                                    <legend>Receta</legend>
                                    <div class="col-xs-4 col-sm-4 col-sm-offset-0" style="margin-bottom: -20px;margin-left: 1%;">
                                        <div class="container-fluid" style="margin: 10px 0;"></div>
                                        <div class="group-material">
                                            <input id="nombreclinica" name="nombreclinica" type="text" class="material-control tooltips-general" placeholder="Nombre..." required="" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);">
                                            <label>Medicina</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-sm-offset-0" style="margin-bottom: -20px;">
                                        <div class="container-fluid" style="margin: 10px 0;"></div>
                                        <div class="group-material">
                                            <input id="nombreclinica" name="nombreclinica" type="text" class="material-control tooltips-general" placeholder="5" required="" data-toggle="tooltip" data-placement="top" title="Solo Numeros" onkeypress="return solonumero(event);">
                                            <label>Cantidad</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-1" style="margin-top: 3.3%">
                            <button type="submit" class="btn btn-add" data-toggle= "modal" data-target= "#" ><i class="zmdi zmdi-plus"></i> &nbsp;&nbsp; Agregar</button> </div>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                <div class="div-table">
                    <table id="Tabla" class="display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Medicina</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>VetPlus Coatex</td>
                                <td>6</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="col-sm-12 text-center">
                                <button type="button" class="btn btn-primary">
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