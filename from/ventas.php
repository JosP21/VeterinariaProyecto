<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->

<?php session_start();
if($_SESSION["logeado"] == false) {
  header("location:login.php");
}
if(isset($_SESSION["venta"]))
  {$_SESSION["venta"];

}

$nombres="";
if($_SESSION["nombres"] != null){
  $nombres=$_SESSION["nombres"];
}
?>
<?php $subtotal = 0;
?>



<?php 

include"../config/conexion.php";
$consultap="SELECT distinct(nombres) FROM `propietario` ORDER BY nombres";
$propietarios = $conexion->query($consultap);



$productos=$conexion->query("SELECT productos.nombre as producto,
  sum(detproductos.cantidCompra) as existencia,
  detproductos.fechaCaduc as fecha,
  detproductos.precCompra as precioC,
  detproductos.precVenta as precioV,
  productos.id_producto as id
  FROM
  productos
  INNER JOIN detproductos ON detproductos.id_producto = productos.id_producto GROUP BY productos.nombre");

$ventasfactura="SELECT * FROM `ventas`";
$res=$conexion->query($ventasfactura);
$num=0;

while($file=$res->fetch_object()){
  $num++;
}
$num++;
$fact="0000".$num;
date_default_timezone_set('America/El_Salvador');

$fechacompra = date("Y-m-d H:i");
$fecha = date("Y-m-d");
$fechacorrecta= date("Y-m-d",strtotime($fecha."+ 150 days")); 

?>



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


  <script type="text/javascript">

    function datos(){
      var valor=document.getElementById('producto').value;
      $.ajax({
        url: '../Venta/recuperarPro.php',
        data:{valor},
        type: 'POST',
        success: function(respuesta){
          var dato = JSON.parse(respuesta);
          if(!respuesta.error){
            document.getElementById('existencia').value = dato["existencia"];
            document.getElementById('precio').value = dato["precio"];
            
          }
        }
      });
    }


    function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}



function controlExistencia(){
  var existencia=parseInt(document.getElementById('existencia').value);
  var cantidad=parseInt(document.getElementById('cantidad').value);

  if(cantidad > existencia){
    Swal.fire({
      title: "Cantidad No disponible",
      text: "Click en Aceptar!",
      icon: "success",
      button: "Aceptar!",
    });
    
    document.getElementById('cantidad').value="";
  }
}

</script>

<style type="text/css">

  #myInput {
    /*background-image: url('/css/searchicon.png'); /* Add a search icon to input */
    /*background-position: 10px 12px; /* Position the search icon */
    /*background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 30%; /* Full-width */
    height: 10%;
    font-size: 16px; /* Increase font-size */
    padding: 6px 6px 6px 6px; /* Add some padding */
    border: 2px solid #ddd; /* Add a grey border */
    margin-top: 8px;
    margin-bottom: 8px; /* Add some space below the input */

  }

  #myTable {
    border-collapse: collapse; /* Collapse borders */
    width: 100%; /* Full-width */
    border: 1px solid #ddd; /* Add a grey border */
    font-size: 18px; /* Increase font-size */
    
  }

  #myTable th, #myTable td {
    text-align: left; /* Left-align text */
    padding: 12px; /* Add padding */
    background-color: #59aab8;
  }

  #myTable td {
   background-color: white;
 }

 #myTable tr {
  /* Add a bottom border to all table rows */
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  /* Add a grey background color to the table header and on hover */
  background-color: #f1f1f1;
}

#listaproveedor {
  width: 100%;
  height: 100%;
  border: 1px; 
  overflow: auto;
}

</style>
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

            <div class="col-sm-2 col-sm-offset-8">
             <div>
               <label>No° Factura</label>
             </div></div>

             <div class="col-sm-2 col-sm-offset-10" style="margin-left: 76%;margin-top: -4%;"> 
              <div class="group-material">
                <input type="text" name="factura" id="factura" class="material-control tooltips-general" placeholder="Factura" value="<?= $fact; ?>" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);" style="pointer-events: none;border: 1px solid #404142;">
              </div></div>



              <div class="col-sm-4 col-sm-offset-1">
                <div class="group-material">
                  <input type="text" name="" id="cliente" class="material-control tooltips-general" placeholder="Nombre..." required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);" list="listaclien">
                  <datalist id="listaclien">
                    <?php 
                    $i=0;
                    while($fila = $propietarios->fetch_object()){ ?>

                      <?php
                      $i++;
                      echo  "<option value='$fila->nombres'> ";
                      ?>
                    <?php };
                    ?>
                  </datalist>
                  <label>Cliente</label>
                </div></div>


                <div class="col-sm-1" style="margin-top: 0.5%;margin-left: -1.5%;">
                  <button type="button" class="btn btn-add"><i class="zmdi zmdi-plus"></i> &nbsp;&nbsp; Agregar</button> </div>


                  <div class="col-sm-5 col-sm-offset-1">
                    <div class="group-material">

                      <input type="text" name="" id="empleado" class="material-control tooltips-general" placeholder="Nombre..." required="" value="<?= $nombres; ?>" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);" style="pointer-events: none;">
                      <label>Empleado</label>
                    </div></div>


                   <!-- <hr style="margin-top: 10%;margin-left: -86%;width: 85%;border-top: 1px solid #0000009e;">-->


                    <div class="col-sm-4 col-sm-offset-1">
                      <div class="group-material">
                        <input type="text" name="" id="producto" class="material-control tooltips-general" placeholder="Nombre..." required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="Solo letras" onchange="datos()" onkeypress="return sololetras(event);" list="listap" autocomplete="OFF">
                        <datalist id="listap">
                          <?php 
                          $i=0;
                          while($fila = $productos->fetch_object()){ ?>

                            <?php
                            $i++;
                            echo  "<option value='$fila->producto'> ";
                            ?>
                          <?php };
                          ?>
                        </datalist>
                        <label>Producto</label>
                      </div></div>


                      <div class="col-sm-2 col-sm-offset-0">
                        <div class="group-material">
                          <input type="number" name="" id="cantidad" class="material-control tooltips-general" min="1" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="Solo Numeros" onchange="controlExistencia()" onkeypress="return solonumero(event);" autocomplete="OFF">
                          <label>Cantidad</label>
                        </div></div>


                        <div class="col-sm-2 col-sm-offset-0">
                          <div class="group-material">
                            <input type="text" name="" id="existencia" class="material-control tooltips-general" placeholder="Nombre.." required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="Solo Numeros" style="pointer-events: none;">
                            <label>Existencia</label>
                          </div></div>


                          <div class="col-sm-3 col-sm-offset-0">
                            <div class="group-material">
                              <input type="text" name="" id="precio" class="material-control tooltips-general" placeholder="0.00" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="Solo Numeros"  style="pointer-events: none;">
                              <label>Precio ($)</label>
                            </div></div>


                            <p style="margin-left: 7%;">
                              <button type="button" id="btn-Agregar" class="btn btn-add" > <i class="zmdi zmdi-plus"></i> &nbsp;&nbsp; Agregar Detalle</button>
                            </p>

                            <div class="container-fluid col-sm-6 col-sm-offset-1">
                              <div class="div-table">
                                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar.." class="col-sm-6 col-sm-offset-8">
                                <table id="myTable" class="display responsive nowrap" style="width:100%">
                                  <thead>
                                    <tr>
                                      <th>Nombre Producto</th>
                                      <th>Cantidad</th>
                                      <th>Precio</th>
                                      <th>Acción</th>
                                    </tr>
                                  </thead>
                                  <tbody id="listado">

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
                                    <input type="text" min="1" id="cantidadpro" style="/*! height: 1px; */ margin-top: 21px;" class="material-control" readonly="readonly" value="">
                                  </div> 
                                </div>
                              </div>                              
                              <hr style="color: blue" width="90%" size="3" align="center">
                              <p></p><h4 align="center">TOTAL A PAGAR</h4>
                              <input type="text-center" id="total" class="material-control tooltips-general" readonly="readonly" style="text-align: center; width: 50%; margin-left:62px; background-color: #f4f4f4; color: black;" value="">
                              <p></p> 
                              <hr style="color: blue" width="90%" size="3" align="center">
                              <!--BotonFacturar-->
                              <p class="text-center" style="margin-top: 10%">
                                <button type="button" id="btn-guardar" class="btn btn-add" ><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
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
                  </div>s
                </div>
                <script src="../assets/js/ventas.js"></script>
              </body>
              </html>
