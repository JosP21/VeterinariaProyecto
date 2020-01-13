<?php session_start();
  if($_SESSION["logeado"] == false) {
header("location:login.php");
  }
  ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio</title>
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
    <script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/controlador.js"></script>
    <script type="text/javascript" src="../assets/js/sweet-alert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/sweet-alert.css">
    <script src="../assets/js/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="../assets/css/sweetalert2.min.css">
    <script type="text/javascript" src="../assets/datatable/js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../assets/datatable/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../assets/datatable/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="../assets/datatable/datatable.js"></script>
   <script type="text/javascript" src="../assets/js/jquery.mask.min.js"></script>
    <script type="text/javascript">
        $('#expediente').on('shown.bs.modal', function() { $(document).off('focusin.modal'); });
        
    </script>
</head>
<body>
    <?php
    include "../from/menu.php"
    ?>
<div class="content-page-container full-reset custom-scroll-containers">
    <div style="margin: 40px 0;"></div>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">animal pet's <small>Inicio</small></h1>
            </div>
        </div>
        <?php if($rol=="Administrador"){?>
        <section class="full-reset text-center" style="padding: 40px 0;">
            <article class="tile" data-toggle="modal" data-target= "#expediente">
                <div class="tile-icon full-reset"><i class="zmdi zmdi-folder-person" style="color: #2f919f;"></i></div>
                <div class="tile-name all-tittles">expedientes</div>
                <div class="tile-num full-reset">0</div>
            </article>
            <article class="tile" data-toggle="modal" data-target= "#citas">
                <div class="tile-icon full-reset"><i class="zmdi zmdi-account-calendar" style="color: #2f919f;"></i></div>
                <div class="tile-name all-tittles">citas</div>
                <div class="tile-num full-reset">0</div>
            </article>
            <article class="tile" data-toggle="modal" data-target= "#cirugias">
                <div class="tile-icon full-reset"><i class="zmdi zmdi-calendar-note" style="color: #2f919f;"></i></div>
                <div class="tile-name all-tittles">cirugias</div>
                <div class="tile-num full-reset">0</div>
            </article>
            <article class="tile" data-toggle="modal" data-target= "#personal">
                <div class="tile-icon full-reset"><i class="zmdi zmdi-accounts" style="color: #2f919f;"></i></div>
                <div class="tile-name all-tittles">personal</div>
                <div class="tile-num full-reset">0</div>
            </article>
            <article class="tile" data-toggle="modal" data-target= "#proveedores">
                <div class="tile-icon full-reset"><i class="zmdi zmdi-truck" style="color: #2f919f;"></i></div>
                <div class="tile-name all-tittles">proveedores</div>
                <div class="tile-num full-reset">0</div>
            </article>
            <article class="tile" data-toggle="modal" data-target= "#servicios">
                <div class="tile-icon full-reset"><i class="zmdi zmdi-calendar-close" style="color: #2f919f;"></i></div>
                <div class="tile-name all-tittles">servicios</div>
                <div class="tile-num full-reset">0</div>
            </article>
            <article class="tile" data-toggle="modal" data-target= "#compras">
                <div class="tile-icon full-reset"><i class="zmdi zmdi-shopping-cart-plus" style="color: #2f919f;"></i></div>
                <div class="tile-name all-tittles" style="width: 90%;">compras</div>
                <div class="tile-num full-reset">0</div>
            </article>
            <article class="tile" data-toggle="modal" data-target= "#ventas">
                <div class="tile-icon full-reset"><i class="zmdi zmdi-calendar-check" style="color: #2f919f;"></i></div>
                <div class="tile-name all-tittles">ventas</div>
                <div class="tile-num full-reset">0</div>
            </article>
        </section><?php }else{

           echo '<p class="alert alert-success agileits" role="alert">BIENVENIDO AL SISTEMA DE CLINICA VETERINARIA ANIMAL PETS DE SAN VICENTE!';


        } ?>

        
        <div class="modal fade" id="expediente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center>
                                <h5 class="modal-title" id="myModalLabel">Bitacora Expediente</h5></center>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> &times; </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid" style="margin: 10px 0;"></div>
                            
            <div class="container-fluid">
                <h2 class="text-center all-tittles">Expedientes Creados</h2>
                <div class="div-table">
                    <table id="Tabla" class="display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Mascota</th>
                                <th>Descripcion</th>
                                <th>Fecha de creacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Osito</td>
                                <td>Se a registrado el expediente numero <strong style="font-size: 14px;font-weight: bold;">OP50798</strong></td>
                                <td>01/05/2019</td>
                            </tr>
                        </tbody>
                    </table>
            </div>
            
                        </div>
                        <div class="modal-footer">
                            <center>
                                <button type="button" class="btn btn-return"  onclick="prueba()" ><i class="zmdi zmdi-mail-reply"></i> &nbsp;&nbsp; Volver</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="modal fade" id="citas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center>
                              <h5 class="modal-title" id="myModalLabel">Bitacora Citas</h5></center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> &times; </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid" style="margin: 10px 0;"></div>
                            
            <div class="container-fluid">
                <h2 class="text-center all-tittles">Citas Creadas</h2>
                <div class="div-table">
                    <table id="miTabla2" class="display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Mascota</th>
                                <th>Descripcion</th>
                                <th>Fecha de creacion</th>
                            </tr></thead>
                        <tbody> <tr>
                                <td>Bethoven Romero</td>
                                <td>La cita sera para chequear el Codillo <strong style="font-size: 14px;font-weight: bold;"></strong></td>
                                <td>01/09/2019 </td>
                            </tr>
                        </tbody></table>
            </div>
                        </div>
                        <div class="modal-footer">
                            <center>
                                <button type="button" class="btn btn-return" data-dismiss="modal"><i class="zmdi zmdi-mail-reply"></i> &nbsp;&nbsp; Volver</button>
                          </center>
                        </div>
                    </div>
                </div>
            </div>
    </div>


  <div class="modal fade" id="cirugias" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center>
                              <h5 class="modal-title" id="myModalLabel">Bitacora Cirugias</h5></center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> &times; </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid" style="margin: 10px 0;"></div>
                            
            <div class="container-fluid">
                <h2 class="text-center all-tittles">Cirugias Realizadas</h2>
                <div class="div-table">
                    <table id="miTabla3" class="display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Cirugia</th>
                                <th>Mascota</th>
                                <th>Descripcion</th>
                                <th>Fecha de realización</th>
                            </tr></thead>
                        <tbody> <tr>
                            <td>Cirugías paliativas</td>
                                <td>Estrella</td>
                                <td>Cirugia de tejidos blandos <strong style="font-size: 14px;font-weight: bold;"></strong></td>
                                <td>02/09/2019 </td>
                            </tr>
                        </tbody></table>
            </div>
                        </div>
                        <div class="modal-footer">
                            <center>
                                <button type="button" class="btn btn-return" data-dismiss="modal"><i class="zmdi zmdi-mail-reply"></i> &nbsp;&nbsp; Volver</button>
                          </center>
                        </div>
                    </div>
                </div>
            </div>
    </div>

<div class="modal fade" id="personal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center>
                        <h5 class="modal-title" id="myModalLabel4">Bitacora Personal</h5></center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> &times; </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid" style="margin: 10px 0;"></div>
                            
            <div class="container-fluid">
                <h2 class="text-center all-tittles">Personal Laborando</h2>
                <div class="div-table">
                    <table id="miTabla4" class="display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                 <th>Nombre de Usuario</th>
                                  <th>rol</th>
                                <th>Fecha de creacion</th>
                            </tr></thead>
                        <tbody> <tr>
                                <td>David Alejandro</td>
                                 <td>Henriquez</td>

                                <td> DAH085 <strong style="font-size: 14px;font-weight: bold;"></strong></td>
                                  <td>Empleado</td>
                                <td>03/09/2019 </td>
                            </tr>
                        </tbody></table>
            </div>
                        </div>
                        <div class="modal-footer">
                            <center>
                                <button type="button" class="btn btn-return" data-dismiss="modal"><i class="zmdi zmdi-mail-reply"></i> &nbsp;&nbsp; Volver</button>
                          </center>
                        </div>
                    </div>
                </div>
            </div>
    </div>

<div class="modal fade" id="proveedores" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center>
                              <h5 class="modal-title" id="myModalLabel">Bitacora Proveedores</h5></center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> &times; </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid" style="margin: 10px 0;"></div>
                            
            <div class="container-fluid">
                <h2 class="text-center all-tittles">Proveedores Creados</h2>
                <div class="div-table">
                    <table id="miTabla5" class="display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                 <th>Telefono</th>
                                  <th>Empresa</th>
                                <th>Fecha de creacion</th>
                            </tr></thead>
                        <tbody> <tr>
                                <td>Josue Antonio</td>
                                 <td>Velasquez</td>

                                <td> 7000-0000 <strong style="font-size: 14px;font-weight: bold;"></strong></td>
                                  <td>SAGRISA</td>
                                <td>03/09/2019 </td>
                            </tr>
                        </tbody></table>
            </div>
                        </div>
                        <div class="modal-footer">
                            <center>
                                <button type="button" class="btn btn-return" data-dismiss="modal"><i class="zmdi zmdi-mail-reply"></i> &nbsp;&nbsp; Volver</button>
                          </center>
                        </div>
                    </div>
                </div>
            </div>
    </div>


<div class="modal fade" id="productos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center>
                              <h5 class="modal-title" id="myModalLabel">Bitacora Productos</h5></center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> &times; </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid" style="margin: 10px 0;"></div>
                            
            <div class="container-fluid">
                <h2 class="text-center all-tittles">Productos Ingresados</h2>
                <div class="div-table">
                    <table id="miTabla6" class="display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Categoria</th>
                                <th>Descripción</th>
                                 <th>Stock minimo</th>
                               <th>Fecha de ingreso</th>
                            </tr></thead>
                        <tbody> <tr>
                                <td>Colistix</td>
                                <td>Medicamento</td>
                                <td>Antibiótico Polipéptido para Infecciones Entéricas</td>
                                <td>10 <strong style="font-size: 14px;font-weight: bold;"></strong></td>
                                <td>03/09/2019</td>
                            </tr>
                        </tbody></table>
            </div>
                        </div>
                        <div class="modal-footer">
                            <center>
                                <button type="button" class="btn btn-return" data-dismiss="modal"><i class="zmdi zmdi-mail-reply"></i> &nbsp;&nbsp; Volver</button>
                          </center>
                        </div>
                    </div>
                </div>
            </div>
    </div>

<div class="modal fade" id="servicios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center>
                             <h5 class="modal-title" id="myModalLabel">Bitacora Servicios</h5></center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> &times; </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid" style="margin: 10px 0;"></div>
                            
            <div class="container-fluid">
                <h2 class="text-center all-tittles">Servicios Realizados</h2>
                <div class="div-table">
                    <table id="miTabla7" class="display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Servicio</th>
                                <th>Mascota</th>
                                <th>Descripción</th>
                                 <th>Precio</th>
                               <th>Fecha de realización</th>
                            </tr></thead>
                        <tbody> <tr>
                                <td>Estética</td>
                                <td>Bobby Zavala</td>
                                <td>Son bañados con agua caliente, shampoo y jabon. </td>
                                <td>$10.00 <strong style="font-size: 14px;font-weight: bold;"></strong></td>
                                <td>03/09/2019</td>
                            </tr>
                        </tbody></table>
            </div>
                        </div>
                        <div class="modal-footer">
                            <center>
                                <button type="button" class="btn btn-return" data-dismiss="modal"><i class="zmdi zmdi-mail-reply"></i> &nbsp;&nbsp; Volver</button>
                          </center>
                        </div>
                    </div>
                </div>
            </div>
    </div>


<div class="modal fade" id="compras" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center>
                             <h5 class="modal-title" id="myModalLabel">Bitacora Compras</h5></center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> &times; </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid" style="margin: 10px 0;"></div>
                            
            <div class="container-fluid">
                <h2 class="text-center all-tittles">Compras Realizadas</h2>
                <div class="div-table">
                    <table id="miTabla8" class="display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                 <th>Num. Factura</th>
                                <th>Proveedor</th>
                                <th>Producto</th>
                               <th>Fecha de compra</th>
                            </tr></thead>
                        <tbody> <tr>
                                <td>FAC187</td>
                                <td>SAGASA</td>
                                <td>Jabón Antipulgas</td>
                                <td>03/09/2019 <strong style="font-size: 14px;font-weight: bold;"></strong></td>
                              
                            </tr>
                        </tbody></table>
            </div>
                        </div>
                        <div class="modal-footer">
                            <center>
                                <button type="button" class="btn btn-return" data-dismiss="modal"><i class="zmdi zmdi-mail-reply"></i> &nbsp;&nbsp; Volver</button>
                          </center>
                        </div>
                    </div>
                </div>
            </div>
    </div>

<div class="modal fade" id="ventas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center>
                             <h5 class="modal-title" id="myModalLabel">fchgvbhn Ventas</h5></center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> &times; </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid" style="margin: 10px 0;"></div>
                            
            <div class="container-fluid">
                <h2 class="text-center all-tittles">Ventas Realizadas</h2>
                <div class="div-table">
                    <table id="miTabla9" class="display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Num. Factura</th>
                                <th>Empleado</th>
                                <th>Producto</th>
                                 <th>Total</th>
                              <th>Fecha de venta</th>
                            </tr></thead>
                        <tbody> <tr>
                                <td>FACT032</td>
                                <td>Enmanuel Rodriguez</td>
                                <td>Shampoo Solution </td>
                                <td>$10.00 <strong style="font-size: 14px;font-weight: bold;"></strong></td>
                                <td>03/09/2019</td>
                            </tr>
                        </tbody></table>
            </div>
                        </div>
                        <div class="modal-footer">
                            <center>
                                <button type="button" class="btn btn-return" data-dismiss="modal"><i class="zmdi zmdi-mail-reply"></i> &nbsp;&nbsp; Volver</button>
                          </center>
                        </div>
                    </div>
                </div>
            </div>
    </div>


     <footer class="footer full-reset">
            <div class="footer-copyright full-reset all-tittles"><center>Universidad de EL Salvador-FMP 2019</center></div>
        </footer>
</body>
</html>