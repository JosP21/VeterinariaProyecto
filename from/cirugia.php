
<?php session_start();
if($_SESSION["logeado"] == false) {
    header("location:login.php");
}
if(!isset($_SESSION["carrito"])){$_SESSION["carrito"]=[];}
?>
<?php $precio = 0;
?>
<?php
date_default_timezone_set('America/El_Salvador');

$fechacompra = date("Y-m-d H:i:s");
$fecha = date("Y-m-d");
$fechacorrecta= date("Y-m-d",strtotime($fecha)); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Gestionar Cirugias</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    <link rel="Shortcut Icon" type="image/x-icon" href="../assets/img/logoclinica.png" />
    <script src="../assets/js/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="../assets/css/sweetalert2.min.css">
    <script type="text/javascript" src="../assets/js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="../assets/js/sweet-alert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/sweet-alert.css">
    <script type="text/javascript"> 


  function agregarCirugia(){
            var nombre=document.getElementById('nombre').value;
            var precio=document.getElementById('precio').value;
            if (nombre=="" || precio==0 || precio=="") {
               mostrarMensaje('Ningúna Cirugia Seleccionada','info',null,"Selecione una Cirugia, o Ingrese una nueva, con su respectivo precio.",true);
           }else{
               $.ajax({
                type:"POST",
                url:"../metodosAjax/save-cirugias.php",
                data:{val:nombre, pre:precio},
                success:function(resp){
                    if (resp=="") {
                        mostrarMensaje('GUARDADO CON EXITO','success',null,"Se guardo la cirugia = "+nombre+"  Con el valor de: $"+precio,true);
                         location.reload();
                    }else if (resp == "ERROR") {
                       mostrarMensaje('ERROR','warning',null,"Ocurrió un error",true);
                   }else{
                    document.getElementById('miTabla').innerHTML=resp;
                    $('#precio').val('');
                    $('#nombre').val('');
                    setTotal();
                }
            }
        });}
               $('#nombre').removeAttr("required");
               $('#precio').removeAttr("required");
           }
             
      function setTotal(){
            $.ajax({
                type:"POST",
                url:"../metodosAjax/setTotalCirugia.php",
                success:function(resp){
                    console.log(resp);
                    document.getElementById('total').value=resp;
                    document.getElementById('total').style.pointerEvents = 'none';
                }

            });
        }

    
      function removeCirugia(indi){
            $.ajax({
                type:"POST",
                url:"../from/quitarCirugia.php",
                data:{indice:indi},
                success:function(resp){
                  document.getElementById('miTabla').innerHTML=resp;
                  mostrarMensaje('CIRUGIA ELIMINADA','success',null,"Se eliminó correctamente.",true);
                  setTotal();
              }
          });

        }

 function setPrecio() {
            var nombre=document.getElementById('nombre').value;
            $.ajax({
                type:"POST",
                url:"../metodosAjax/precioCirugia.php?",
                data:{name:nombre},
                success:function(resp){
                    //console.log(resp);
                    //document.getElementById('precio').readOnly = true;
                    if(resp==""){
                        document.getElementById('precio').value=0;
                        document.getElementById('precio').style.pointerEvents = 'auto';
                        $("#precio").removeAttr("readonly","readonly");
                        $("#precio").addClass("readOnly");
                    }else{
                        document.getElementById('precio').value=resp;
                        document.getElementById('precio').style.pointerEvents = 'auto';
                        $("#precio").attr("readonly","readonly");
                        $("#precio").removeClass("readOnly");
                    }

                }
            });
        }


        function validarhora(){
    $.ajax({
        type:"POST",
        url:"../from/cirugia.php",
        data:{fdato:document.getElementById("fecha").value},
        success:function(resp){
                document.getElementById("horafl").innerHTML=resp;
        }
    });
}

    </script>
</head>
<body onload="mensaje()">
    <?php
    include "../from/menu.php"
    ?>
    <?php
if(isset($_GET["status"])){
        if($_GET["status"] === "1"){
            ?>
            <div class="alert alert-success">
               <script type="text/javascript"> mostrarMensaje('GUARDADO CON EXITO','success',null,"La Cirugia fué realizada exitosamente.",true);</script>
           </div>
           <?php
       }else if($_GET["status"] === "2"){
        ?>
        <div class="alert alert-info">
            <script type="text/javascript">mostrarMensaje('SE A CANCELADO','success',null,"La carretilla de cirugias se eliminó correctamente.",true);</script>
        </div>
        <?php
    }else if($_GET["status"] === "3"){
        ?>
        <div class="alert alert-info">
            <strong>Ok</strong> Producto quitado de la lista
        </div>
        <?php
    }else if($_GET["status"] === "4"){
        ?>
        <div class="alert alert-warning">
            <script type="text/javascript"> mostrarMensaje('CARRITO DE CIRUGIAS VACÍO','warning',null,"Agrege al menos una cirugia",true);</script>
        </div>
        <?php
    }else if($_GET["status"] === "5"){
        ?>
        <div class="alert alert-danger">
            <script type="text/javascript"> mostrarMensaje('EXPEDIENTE NO VÁLIDO','warning',null,"Seleccione un expediete existente.",true);</script>
        </div>
        <?php
    }else if($_GET["status"] === "6"){
        ?>
        <div class="alert alert-danger">
            <script type="text/javascript"> mostrarMensaje('EMPLEADO NO VÁLIDO','warning',null,"Seleccione un empleado existente.",true);</script>
        </div>
        <?php
    }else{
        ?>
        <div class="alert alert-danger">
            <strong>Error:</strong> Algo salió mal mientras se realizaba la cirugia
        </div>
        <?php
    }
}
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
            <form id="frmCirugia" name="frmCirugia" method="post" action="../metodosAjax/terminarCirugias.php">
                <div class="title-flat-form title-flat-blue">Registrar</div>
                 <div class="row">
                       <div class="col-sm-4 col-sm-offset-1" style="margin-left: 5%;">
                <div class="group-material">
                 <input autofocus autocomplete="off" type="text" name="nombreexp" id="nombreexp" class="material-control tooltips-general" placeholder="Seleccione.." required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" list="listaExp" >
                 <datalist id="listaExp">
                     <?php
                        include"../config/conexion.php";
                        $cosulta="SELECT
                        mascotas.id_mascota as id_mascota,
                        mascotas.nombre as nombre,
                        raza.nombre as raza
                        FROM
                        mascotas
                        INNER JOIN raza ON mascotas.id_raza = raza.id_raza ORDER BY nombre";
                        $resultado = $conexion->query($cosulta);
                        if($resultado){
                           while($fila = $resultado->fetch_object()){
                            echo  "<option value='$fila->id_mascota'>$fila->nombre $fila->raza</opcion> ";
                        }
                    }
                    ?> 
                      </datalist>
                    <label>Expediente</label>
                            </div></div>
                    <div class="col-sm-1" style="margin-top: 0.5%;margin-left: -3%;">
                    <button type="submit" class="btn btn-add" data-toggle="modal" data-target="#exped"><i class="zmdi zmdi-plus"></i> &nbsp;&nbsp; Agregar</button> </div>

                            <div class="col-xs-3 col-sm-5 col-sm-offset-1">
                        <div class="group-material">
                                     <input id="nombreemp" name="nombreemp" type="text" class="material-control tooltips-general" placeholder="Nombre..." required="" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" list="listadoc" data-original-title="Solo letras">
                                    <datalist id="listadoc">
                                         <?php
                            include"../config/conexion.php";
                            $cosulta="SELECT nombres as nombres, apellidos as apellidos FROM `empleados` WHERE rol='Administrador'ORDER BY nombres";
                            $resultado = $conexion->query($cosulta);
                            if($resultado){
                               while($fila = $resultado->fetch_object()){
                                echo  "<option value='$fila->nombres'>$fila->apellidos</opcion> ";
                            }
                        }
                        ?>     
                                    </datalist>
                                <label>Medico</label>
                            </div></div>

                <div class="col-sm-5 col-sm-offset-1">
                    <div class="group-material">
                        <input type="text" name="nombre" id="nombre" class="material-control tooltips-general" placeholder="Nombre de cirugia..." data-min-length="1"  data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);" list="listacir" data-original-title="Solo letras" autocomplete="off" onkeyup="setPrecio();">
                                    <datalist id="listacir">
                                        <?php
                            include"../config/conexion.php";
                            $cosulta="SELECT id_cirugia,nombre,precio FROM `cirugia` ORDER BY nombre";
                            $resultado = $conexion->query($cosulta);
                            if($resultado){
                               while($fila = $resultado->fetch_object()){
                                echo  "<option value='$fila->nombre'></opcion> ";
                            }
                        }
                        ?>           
                                         </datalist>
                                                                 
                                <label>Cirugia</label>
                            </div></div>

                <div class="col-sm-3 col-sm-offset-1">
                    <div class="group-material">
                        <label style="color: #53a5b4; font-weight: bold; margin-top: -35px;">Precio ($)</label>
                        <input autocomplete="off" type="number"  id="precio" name="precio" class="material-control tooltips-general" placeholder="$0.00"  data-min-length="1" data-toggle="tooltip" data-placement="top" title="Solo numeros" min="0.00" step="0.5"  value="">                             
                    </div></div>
               </form>
             
    <div class="col-sm-1" style="margin-top: 0.5%;margin-left: 2%;">
                    <button type="button" form="frmCirugia" class="btn btn-add" onclick="agregarCirugia();"><i class="zmdi zmdi-plus"></i> &nbsp;&nbsp; Agregar</button> </div>
             
                            <div style="margin-left: 6%;" class="col-sm-3 col-sm-offset-1">
                        <div class="group-material">
                                    <input type="date" min="<?= $fechacorrecta; ?>" name="fecha" id="fecha" value="<?= $fechacorrecta; ?>" class="material-control tooltips-general" placeholder="Fecha.." required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo numero">
                                <label>Fecha</label>
                            </div></div>

                            <div id="horafl">
                            <div class="col-sm-2 col-sm-offset-1 col-xs-4" style="margin-left: -1%; margin-top: 0%">
                        <div class="group-material" id="propietarioG">
                                    <input type="time" name="hora" id="hora" class="material-control tooltips-general" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" value="<?php echo date('h:i')?>" data-original-title=""><label>Hora</label>
                            </div></div>

                            <div style="margin-top: -2%;margin-left: 5%;" class="col-xs-12 col-sm-12 col-sm-offset-1"><label style="color: #53a5b4;font-weight: bold;">Diagnostico</label></div>
                            <div class="col-xs-12 col-sm-11 col-sm-offset-1">
                                <div class="group-material" style="margin-bottom: 2%;">
                                            <textarea id="diagnostico" name="diagnostico" type="text" class="material-control tooltips-general" placeholder="Escriba su respectivo diagnostico" required="" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" style="width: 93%;" data-original-title="Solo letras"></textarea>
                                        </div>
                            </div>


 
                       
                            <!--Tabla!-->
                    <div class="col-sm-7 col-sm-offset-1" style="margin-left: 8%;">
                        <div class="div-table">
                            <table id="miTabla" class="display responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Cirugia efectuada</th>
                                        <th>Precio</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($_SESSION["carrito"] as $indice => $producto){ 

                                        ?>
                                        <tr>
                                            <td><?php echo $producto->nombre ?></td>
                                            <td><?php echo $producto->precio ?></td>
                                            <td><button type="button" href="#" class="material-control tooltips-general" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="removeCirugia(<?php echo $indice?>)">
                                                <i class="zmdi zmdi-delete" style="color: #F91D0B;"></i>
                                            </button></td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div><div style="margin: 6.5% 0;"></div>
                    </div>
                    <div class="col-sm-4 col-sm-offset-0">
                        <div class="container-flat-form">

                            <p></p><h3 align="center">TOTAL</h3>
                            <input value="" id="total" name="total" type="text-center" class="material-control tooltips-general" readonly="readonly"  style="text-align: center; width: 50%; margin-left:62px; background-color: #e5f4f7; color: black;">
                            <p></p> 
                            <hr style="color: blue" width="90%" size="3" align="center">
                            <div class="col-sm-6 col-sm-offset-0" style="margin-top: -6%;">
                                <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button></div><div class="col-sm-6 col-sm-offset-0" style="margin-top: -6%;">
                                    <a  href="../metodosAjax/cancelarCirugia.php" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-refresh-alt"></i> &nbsp;&nbsp; Cancelar</a></div>

                               </div>
                             </div>                           
                          </div>
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