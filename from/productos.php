<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Nuevo Producto</title>
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
</head>
<body onload="mensaje()">
  <?php
  include "../from/menu.php"
  ?>
  <div class="content-page-container full-reset custom-scroll-containers">
    <div style="margin: 40px 0;"></div>
    <div class="container">
      <div class="page-header">
        <h1 class="all-tittles">animal pet's <small>Compras</small></h1>
      </div>
    </div>
    <div class="container-fluid">
      <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
        <li role="presentation" class="active"><a href="productos.php">Gestionar Producto</a></li>
        <li role="presentation"><a href="inventario.php">Inventario</a></li>
      </ul>
    </div>
    <div class="container-fluid"  style="margin: 20px 0;">
    </div>
    <div class="container-fluid">
        <div class="container-flat-form" >
          <div class="title-flat-form title-flat-blue">Registrar</div>
          <form>
            <div class="row">
              <div class="col-xs-4 col-sm-5 col-sm-offset-1">
       <div class="group-material">
        <div style="width: 100%;float:left;">
          <input itype="search" name="" id="input-search" class="material-control tooltips-general" placeholder="Proveedor..." required="" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);" list="listaProve">
          <datalist id="listaProve">
            <option value="Proveedor 1">
              </option><option value="Proveedor 2">
                </option><option value="Proveedor 3">
                  </option><option value="Proveedor 4">
                    </option></datalist>
                    <label>Nombre del Proveedor</label>
                  </div>
                </div>

              </div>

              <div class="col-xs-4 col-sm-5 col-sm-offset-1">
                <div class="group-material">
                  <div style="float:left;margin-left: 2%;margin-top: 1%;">

                    <button type="submit" class="btn btn-add" data-toggle="modal" data-target="#nuevoproveedor"><i class="zmdi zmdi-plus"></i> &nbsp;&nbsp; Agregar Proveedor</button>
                  </div>
                </div>
              </div>
              <hr style="width: 90%;margin-left: 5%;margin-top: 6%;border-color: #0006;">
             <div class="col-xs-4 col-sm-3 col-sm-offset-1">
              <div class="group-material">
                <input type="text" name="" id="nombrecatre" class="material-control tooltips-general" placeholder="Anivioticos" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);" list="listaCat">
                <datalist id="listaCat">
                  <option value="Categoria 1">Antivioticos </option>
                  <option value="Categoria 2">Antiparasitorios </option>
                  <option value="Categoria 3">Antiinflamatorios</option>
                  <option value="Categoria 4">Hormonales</option>
                  <option value="Categoria 5">Anestesicos</option>
                </datalist>
                <label>Categoría</label>
              </div></div>
              
              
              
              <div class="col-xs-4 col-sm-3 col-sm-offset-0">
                <div class="group-material">
                 <input id="nombreproducto" name="nombreproducto" type="text" class="material-control tooltips-general" placeholder="Pedrigri..." required="" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);">
                 
                 <label>Nombre </label>
               </div>

             </div>
              <div class="col-xs-4 col-sm-2 col-sm-offset-0">
              <div class="group-material">
               <input id="cantidad" name="cantidad" type="text" class="material-control tooltips-general" placeholder="800..." required="" data-toggle="tooltip" data-placement="top" title="Solo numero" onkeypress="return solonumero(event);">
               
               <label>Cantidad </label>
             </div>

           </div>
             <div class="col-xs-4 col-sm-3 col-sm-offset-0">
              <div class="group-material">
                <input type="text" name="" id="unidadmedida" class="material-control tooltips-general" placeholder="Mililitros" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);" list="listaMed">
                <datalist id="listaMed">
                  <option value="Medida 1">Libra </option>
                  <option value="Medida 2">Litros </option>
                  
                </datalist>
                <label>Unidad de Medida</label>
              </div></div>

              <div class="col-xs-4 col-sm-3 col-sm-offset-1">
                <div class="group-material">
                 <input id="fecha" name="fecha" type="date" class="material-control tooltips-general" placeholder="Libra..." required="" data-toggle="tooltip" data-placement="top" title="Solo numero">
                 
                 <label>Fecha de Caducidad </label>
               </div>

             </div>

           <div class="col-xs-4 col-sm-3 col-sm-offset-0">
            <div class="group-material">
             <input id="preciocompra" name="preciocompra" type="text" class="material-control tooltips-general" placeholder="15.25..." required="" data-toggle="tooltip" data-placement="top" title="Solo numero" onkeypress="return solonumero(event);">
             
             <label>Precio Compra </label>
           </div>

         </div>

         <div class="col-xs-4 col-sm-2 col-sm-offset-0">
          <div class="group-material">
           <input id="margen" name="margen" type="text" class="material-control tooltips-general" placeholder="18.25" required="" data-toggle="tooltip" data-placement="top" title="Solo numero" style="pointer-events: none;">
           
           <label>Precio de Venta</label>
         </div>

       </div>



       <div class="col-xs-4 col-sm-3 col-sm-offset-0">
        <div class="group-material">
         <input id="stockminimo" name="stockminimo" type="text" class="material-control tooltips-general" placeholder="100..." required="" data-toggle="tooltip" data-placement="top" title="Solo numero" onkeypress="return solonumeros(event);">
         
         <label>Stock Mínimo </label>
       </div>

     </div>
     <p style="margin-left: 7%;">
              <button type="submit" class="btn btn-add"> <i class="zmdi zmdi-plus"></i> &nbsp;&nbsp; Agregar Producto</button>
            </p>
<!-- Tabla!-->

              <div class="container-fluid col-sm-6 col-sm-offset-1">
      <div class="div-table">
        <table id="miTabla" class="display responsive nowrap" style="width:100%">
          <thead>
            <tr>
              <th>Nombre Producto</th>
              <th>Precio Compra</th>
              <th>Cantidad</th>
              <th>Total</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Pedigri</td>
              <td>$ 15.25</td>
              <td>800</td>
              <td>$ 12,200</td>
              <td>
                <a href="#" onclick="" class="material-control" required="" maxlength="50"  btne-data-title="Eliminar">
                  <i class="zmdi zmdi-delete" style="color: #F91D0B;">
                  </i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div><div style="margin: 6.5% 0;"></div>
    </div>
    <div style="margin-left: 5%;" class="col-sm-4 col-sm-offset-0">
                       <div class="container-flat-form">
                         
                          <div class="container-fluid">
                            <div class="row">
                              <div class="col-sm-8">
                                <p></p><h4 style="margin-top: 20%;">Cantidad de Productos: </h4><p></p> 
                              </div> 
                              <div class="col-sm-4">
                                <input type="text" min="1" style="/*! height: 1px; */ margin-top: 21px;" class="material-control" readonly="readonly" value="800">
                              </div> 
                            </div>
                          </div>                              
                          <hr style="color: blue" width="90%" size="3" align="center">
                          <p></p><h4 align="center">TOTAL A PAGAR</h4>
                            <input type="text-center" class="material-control tooltips-general" readonly="readonly" style="text-align: center; width: 50%; margin-left:25%; background-color: #f4f4f4; color: black;/*! margin-left: ; */" value="$12,200">
                          <p></p> 
                          <hr style="color: blue" width="90%" size="3" align="center">
                          <!--BotonFacturar-->
                          <p class="text-center" style="margin-top: 10%">
                            <button type="button" class="btn btn-add"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                            <button type="reset" class="btn btn-info" style=""><i class="zmdi zmdi-refresh-alt"></i> &nbsp;&nbsp; Cancelar</button>
                          </p> 
                      </div>
                    </div>
            </div>
          </form>

    <!--ListaProductos-->
    



  </div>
</div>




<!--Modal para la Empresa-->

      <!--Modal para el Proveedor-->
      <div class="modal fade" id="nuevoproveedor">
        <div class="modal-dialog" style="margin-top: 5%;">
          <div class="modal-content">
            <div class="modal-header">
              <center>
                <h5 class="modal-title"> Registrar Proveedor</h5></center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"> &times; </span>
                </button>
              </div>
              <div class="modal-body">
                <div class="container-fluid" style="margin: 20px 0;"></div>


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

                                  <button type="submit" class="btn btn-add" data-toggle= "modal" data-target= "#nuevaempresa" ><i class="zmdi zmdi-plus"></i> &nbsp;&nbsp; Agregar</button>
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
                                  <label style="margin-left: 55%;">Teléfono</label>  
                                </div>
                              </div>
                              <div style="margin: 30% 0;"></div>
                              <div class="group-material">
                                <input id="nombreclinica" name="nombreclinica" type="text" class="material-control tooltips-general" placeholder="Nombre..." required="" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);">
                                <label>Correo</label>
                              </div>

                            </div>
                          </div>
                        </form>


                      </div>
                      <div class="modal-footer">
                        <center>
                          <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                        </center>
                      </div>
                    </div>
                  </div>
                </div>

<div class="modal fade" id="nuevaempresa">
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



          <div class="col-xs-4 col-sm-5 col-sm-offset-1">
            <div class="group-material">
             <input id="nombre" name="nombre" type="text" class="material-control tooltips-general" placeholder="Empresa" required="" data-toggle="tooltip" data-placement="top" title="Contraseña" onkeypress="return olonumero(event);">
             <label style="margin-left: 0%;">Nombre</label>       

           </div></div>
           <div class="col-xs-4 col-sm-5 col-sm-offset-1">
            <div class="group-material">
             <input id="telefono" name="telefono" type="text" class="material-control tooltips-general" placeholder="####-####" required="" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);">
             <label>Teléfono</label>      
           </div></div>

           <div class="col-xs-4 col-sm-5 col-sm-offset-1" style="margin-left: 6%;"><label style="color: #53a5b4;font-weight: bold;">Dirección</label></div>

           <div style="margin-left: 6%;" class="col-xs-8 col-sm-11 col-sm-offset-1">

            <div class="group-material" style="margin-bottom: 2%;margin-right: 5%;">
              <textarea id="direccion" name="direccion" type="text" class="material-control tooltips-general" placeholder="San Vicente" required="" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" style="width: 100%; height: 1%;" data-original-title="Solo letras"></textarea>
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
      </div>
                <!--Modal para Productos-->
                <div class="modal fade" id="modificarProducto">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <center>
                          <h5 class="modal-title"> Modificar Productos</h5></center>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"> &times; </span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="container-fluid" style="margin: 20px 0;"></div>
                          Datos del Producto
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
                    <div class="footer-copyright full-reset all-tittles"><center>Universidad de EL Salvador-FMP 2019</center></div>
                  </footer>
                </div>
              </body>
              </html>