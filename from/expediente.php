<?php session_start();
  if($_SESSION["logeado"] == false) {
header("location:login.php");
  }
  ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Expediente</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="../assets/img/logoclinica.png" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/alertify.min.css">
    <link rel="stylesheet" href="../assets/css/default.min.css">
    <script src="../assets/js/jquery-1.4.4.min.js"></script>
  <script src="../assets/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="../assets/css/style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="../assets/js/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="../assets/css/sweetalert2.min.css">
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
    <script type="text/javascript" src="../assets/js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="../assets/js/sweet-alert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/sweet-alert.css">
    <link rel="stylesheet" href="../assets/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../assets/css/normalize.css">
    <script type="text/javascript">
      
        function GuardarProp(){
            var nombrepro=document.getElementById('nombrepro').value;
            var apellidopro=document.getElementById('apellidopro').value;
            var telefonopro=document.getElementById('telefonopro').value;
            var direccionpro=document.getElementById('direccionpro').value;
            var femenino=document.getElementById('femenino').checked;
            var masculino=document.getElementById('masculino').checked;
            if(nombrepro==""){
                 alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: nombre no puede ir vacio', 'success', 5, function(){});
            }
            if(apellidopro==""){
                 alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: apellido no puede ir vacio', 'success', 5, function(){});
            }
            if(telefonopro==""){
                 alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: telefono no puede ir vacio', 'success', 5, function(){});
            }
            if(direccionpro==""){
                 alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: direccion no puede ir vacio', 'success', 5, function(){});
            }
            if(!masculino && !femenino){
                 alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: genero no puede ir vacio', 'success', 5, function(){});
                  
            }
            if(!nombrepro=="" && !apellidopro=="" && !telefonopro=="" && !direccionpro=="" && (masculino || femenino)){
                   var datos=$("#frmprop").serialize();
                   $.ajax({
                    type:"POST",
                    url:"../metodosAjax/guardar-propietario.php",
                    data:datos,
                    success:function(resp){
                        if(resp==nombrepro.concat(apellidopro)){
                            $("#frmprop")[0].reset(); 
                            $('#propietario').modal('hide'); 
                            document.getElementById('nombrepropietario').value=nombrepro;
                            document.getElementById('apellidomascota').value=apellidopro;
                            mostrarMensaje('Se guardo correctamente','success',null,"Propietario de mascota guardado con el nombre de: "+nombrepro,true);
                        }else{

                        }
                    }
                   });
                  
            }
        }
function buscarRaza(filtro){
            $.ajax({
                    type:"POST",
                    url:"../metodosAjax/guardar-expediente.php",
                    data:{razaM:filtro},
                    success:function(resp){
                        if(resp!=""){
                            document.getElementById('especiemascota').value=resp;
                             document.getElementById('especiemascota').style.pointerEvents = 'none';
                        }else{
                             document.getElementById('especiemascota').style.pointerEvents = 'auto';
                        }
                    }
                   });
}
function buscar(filtro){
            $.ajax({
                    type:"POST",
                    url:"../metodosAjax/guardar-expediente.php",
                    data:{val:filtro},
                    success:function(resp){
                        document.getElementById('apellidomascota').value=resp;
                    }
                   });
}

function GuardarExpediente(){
                var mascota=document.getElementById('mascota').value;
                var apellidomas=document.getElementById('apellidomascota').value;
                var nombrepropietario=document.getElementById('nombrepropietario').value;
                var raza=document.getElementById('razamascota').value;
                var especies=document.getElementById('especiemascota').value;
                var corelativo=document.getElementById('corelativo').value;
                var hembra=document.getElementById('hembra').checked;
                var macho=document.getElementById('macho').checked;
                if(mascota==""){
                 alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: nombre de mascota no puede ir vacio', 'success', 5, function(){});
               }
              if(apellidomas==""){
                 alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: apellido de mascota no puede ir vacio', 'success', 5, function(){});
              }
              if(nombrepropietario==""){
                 alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: nombre de propietario no puede ir vacio', 'success', 5, function(){});
              }
              if(raza==""){
                 alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: raza no puede ir vacio', 'success', 5, function(){});
              }
              if(especies==""){
                 alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: especie no puede ir vacio', 'success', 5, function(){});
              }
              if(corelativo==""){
                 alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: correlativo no puede ir vacio', 'success', 5, function(){});
              }
              if(!hembra && !macho){
                 alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: genero no puede ir vacio', 'success', 5, function(){});
              }
                var ftdatos=$("#frmexp").serialize();
                 $.ajax({
                    type:"POST",
                    url:"../metodosAjax/guardar-expediente.php",
                    data:ftdatos,
                    success:function(resp){
                      if(resp=="ERROR"){
                            alertify.error('<strong style="font-size: 14px;font-weight: bold;">ERROR</strong>: A ocurrido un error a la hora de guardar, por favor revise nuevamente los datos', 'success', 10, function(){});
                            
                        }else{
                            mostrarMensaje('Se guardo correctamente','success',null,"Su numero de expediente es: "+resp,true);
                            document.getElementById("frmexp").reset();
                        }
                    }
                   });
            return false;
}



function filtrar(){
//    $('.mascota').val();
            $.ajax({
                    type:"POST",
                    url:"../metodosAjax/guardar-expediente.php",
                    data:{valor:document.getElementById("mascota").value, apellidoM:document.getElementById("apellidomascota").value,razaMas:document.getElementById("razamascota").value},
                    success:function(resp){
                        document.getElementById("corelativo").value=resp;
                    }
                   });
}
function comprobarEspecie(){
    $.ajax({
                    type:"POST",
                    url:"../metodosAjax/guardar-expediente.php",
                    data:{raza_mascotaf:document.getElementById("razamascota").value},
                    success:function(resp){
                        if(resp!=""){
                            document.getElementById('especiemascota').value=resp;
                            document.getElementById('especiemascota').style.pointerEvents = 'none';
                        }else{
                            document.getElementById('especiemascota').value="";
                            document.getElementById('especiemascota').style.pointerEvents = 'auto';
                        }
                        
                    }
                   });
}
function fecha(){
    document.getElementById('edadN').innerHTML="";
     $.ajax({
      type:"POST",
      url:"../metodosAjax/filtrarfecha.php",
       data:{fecha:document.getElementById('fnac').value},
      success:function(resp){
        document.getElementById('fechaN').innerHTML=resp;
        }
     });
}
function edad(){
    document.getElementById('fechaN').innerHTML="";
    $.ajax({
      type:"POST",
      url:"../metodosAjax/filtrarfecha.php",
       data:{edad:document.getElementById('edad').value},
      success:function(resp){
        document.getElementById('edadN').innerHTML=resp;
        }
     });
}
  $(document).ready(function()
            {
            $("input[name=nombrepropietario]").change(function() {
                var value=$("input[name=nombrepropietario]").val();
                buscar(value);
                });
            });
  $(document).ready(function()
            {
            $("input[type=checkbox]").change(function() {
                var value=$("input[type=checkbox]").val();
                buscarRaza(value);
                });
            });
    $(document).ready(function(){
            $("#telefonopro").mask("0000-0000");
            $("#telefono").mask("0000-0000");
        });
    </script>
</head>
<body onload="mensaje()">
    <?php
    include "../from/menu.php"
    ?>
    <div class="content-page-container full-reset custom-scroll-containers">
        <div style="margin: 40px 0;"></div>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Animal Pet's <small> &nbsp;&nbsp;Expediente</small></h1>
          </div>
      </div>
<div class="container-fluid" style="border-bottom: 1px solid #00000042;margin-right: 1%;margin-left: 1%;">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;width: 40%;">
              <li role="presentation" class="active"><a href="expediente.php">Gestionar Expediente</a></li>
            </ul>
        </div>
  <div class="container-fluid"  style="margin: 20px 0;">
  </div>
  <div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb">
              <li class="active">Nuevo</li>
              <li><a href="listaexpediente.php">Listado</a></li>
          </ol>
      </div>
  </div>
</div>
<div class="container-fluid">
    <div class="container-flat-form" style="width: 70%;">
        <div class="title-flat-form title-flat-blue">Registrar</div>
            <form id="frmexp" name="frmexp" method="post" action="">
             <div class="row">
                <div style="margin-left: 8%;" class="col-sm-6 col-sm-offset-0">
                        <div class="group-material" id="propietarioG"><div id="autocompletar">
                                    <input type="hidden" name="bandera1" id="bandera1" value="buscar">
                                    <input type="text" name="nombrepropietario" id="nombrepropietario" class="material-control tooltips-general" placeholder="Nombre..." required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" list="listaExp" data-original-title="Solo letras" autocomplete="off">
                                    <datalist id="listaExp">
                                        <?php
                                            include"../config/conexion.php";
                                            $cosulta="SELECT nombres,apellidos FROM `propietario` ORDER BY nombres";
                                             $resultado = $conexion->query($cosulta);
                                              if($resultado){
                                               while($fila = $resultado->fetch_object()){
                                                echo  "<option value='$fila->nombres'>$fila->apellidos</opcion> ";
                                                 }
                                               }
                                            ?>                              
                                    </datalist>
                                <label>Propietario</label>
                            </div>
                            </div></div>
                            <div class="col-sm-1" style="margin-top: 0.5%;margin-left: -3%;">
                            <button type="submit" class="btn btn-add" data-toggle="modal" data-target="#propietario"><i class="zmdi zmdi-plus"></i> &nbsp;&nbsp; Agregar</button> </div>
                        <hr style="margin-top: 8%;width: 85%;border-top: 1px solid #fff;">
                            <div style="margin-left: 8%;" class="col-sm-3 col-sm-offset-0">
                        <div class="group-material">
                                    <input type="text" name="razamascota" id="razamascota" class="material-control tooltips-general" placeholder="Nombre Raza..." required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras" list="listaraza" onkeyup ="comprobarEspecie();">
                                    <datalist id="listaraza">
                                        <?php
                                            include"../config/conexion.php";
                                            $cosulta="SELECT DISTINCT(nombre) FROM `raza` ORDER BY nombre";
                                             $resultado = $conexion->query($cosulta);
                                              if($resultado){
                                               while($fila = $resultado->fetch_object()){
                                                echo  "<option value='$fila->nombre'>";
                                                 }
                                               }
                                            ?> 
                                    </datalist>
                                <label>Raza</label>
                            </div></div>
                            <div style="margin-left: -2%;" class="col-sm-2 col-xs-offset-0">
                        <div class="group-material" id="filtroespecie">
                                    <input type="text" name="especiemascota" id="especiemascota" class="material-control tooltips-general" placeholder="Nombre Especie..." required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras" list="listaespecie">
                                    <datalist id="listaespecie">
                                        <?php
                                            include"../config/conexion.php";
                                            $cosulta="SELECT DISTINCT(nombre) FROM `especies` ORDER BY nombre";
                                             $resultado = $conexion->query($cosulta);
                                              if($resultado){
                                               while($fila = $resultado->fetch_object()){
                                                echo  "<option value='$fila->nombre'>";
                                                 }
                                               }
                                            ?> 
                                    </datalist>
                                <label>Especie</label>
                            </div></div>
                            <div style="margin-left: 4%;" class="col-sm-2 col-sm-offset-1">
                        <div class="group-material">
                                    <input type="text" name="mascota" id="mascota" class="material-control tooltips-general" placeholder="Nombre Mascota" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras" onkeyup ="filtrar();">
                                <label>Mascota</label>
                            </div></div>
                            <div style="margin-left: -3.5%;" class="col-sm-2 col-sm-offset-0">
                        <div class="group-material">
                                    <input type="text" name="corelativo" id="corelativo" class="material-control tooltips-general" placeholder="Alias..." required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras" style="pointer-events: none;width: 55%;">
                            </div></div>
                            <div style="margin-left: -7%;" class="col-sm-2 col-sm-offset-0">
                        <div class="group-material">
                                    <input type="text" name="apellidomascota" id="apellidomascota" class="material-control tooltips-general" placeholder="Apellido..." required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras" style="pointer-events: none;">
                            </div></div>
                            <div style="margin-top: -3%;margin-left: 8%;" class="col-xs-4 col-sm-5 col-sm-offset-0">
                                <fieldset>
                                    <legend>Fecha/Edad</legend>
                                    <div><center><div class="contenedorad">
                                <div class="radio">
                                    <div style="margin-top: -3%;" class="col-sm-12 col-sm-offset-0">
                                    <input type="radio" name="fecha" id="fnac" value="Fecha" >
                                    <label for="fnac" onclick="fecha()">Fecha</label>
                                    <input type="radio" name="fecha" id="edad" value="Edad">
                                    <label for="edad"  onclick="edad()">Edad</label></div>
                                    </div>
                                   <div class="col-sm-12 col-sm-offset-0" style="" id="fechaN">
                                    </div>
                                    <div class="col-sm-12 col-sm-offset-0" style="" id="edadN">
                                    
                                    </div>
                            </div></center>
                    </div>
                                </fieldset>
                            </div>
                            <div style="margin-top: -3%;margin-left: 1%;" class="col-xs-4 col-sm-5 col-sm-offset-0">
                                <fieldset>
                                    <legend>Genero</legend>
                                    <div><center><div class="contenedorad">
                                <div class="radio">
                                    <input type="radio" name="genero" id="macho" value="Macho">
                                    <label for="macho">Macho</label>
                                    <input type="radio" name="genero" id="hembra" value="Hembra">
                                    <label for="hembra">Hembra</label>
                            </div></div></center>
                    </div>
                                </fieldset>
                            </div>
                            <div style="" class="col-sm-12 col-sm-offset-0">
              <p class="text-center" style="margin-top: 10%">
                <button type="button" class="btn btn-primary" onclick="GuardarExpediente()"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-refresh-alt"></i> &nbsp;&nbsp; Cancelar</button>
            </p> </div>
        </div>
        </form>

                        </div>
                    </div>
                    <!--Modal-->
                <div class="modal fade" id="propietario" style="overflow-y: scroll;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center>
                                <h5 class="modal-title"> Propietario</h5></center>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> &times; </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid" style="margin: 5px 0;"></div>

                            <div class="container-fluid">
                               <div class="col-xs-12 col-sm-offset-0">
                                    <div class="title-flat-form title-flat-blue">Registrar</div>
                                     <form class="form-horizontal" id="frmprop" name="frmprop" method="post" action="">
                                        <div class="row">
                                            <div style="margin-left: 6%;/*! margin-right: -20%; */" class="col-sm-6 col-sm-offset-0">
                        <div class="group-material" style="margin-right: 15%;">
                                    <input type="text" name="nombrepro" id="nombrepro" class="material-control tooltips-general" placeholder="Nombre..." required="" data-min-length="1" autocomplete="off" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras">
                                <label>Nombre</label>
                            </div></div>
                            <div class="col-sm-5 col-sm-offset-0">
                        <div class="group-material">
                                    <input type="text" name="apellidopro" id="apellidopro" class="material-control tooltips-general" placeholder="Primer Apellido..."  data-min-length="1" data-toggle="tooltip" autocomplete="off" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras">
                                <label>Apellido</label>
                            </div></div>
                            <div style="margin-top: -2%;" class="col-sm-6 col-sm-offset-1">
                                <fieldset style="margin-right: 11%;">
                                    <legend>Sexo</legend>
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
                                    <input type="text" name="telefonopro" id="telefonopro" class="material-control tooltips-general" placeholder="####-####" required="" data-min-length="1" maxlength="9" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return solonumero(event);" data-original-title="Solo numeros">
                                <label>Telefono</label>
                            </div></div>
                            <div class="col-xs-12 col-sm-1 col-sm-offset-1" style="margin-left: 6%;"><label style="color: #53a5b4;font-weight: bold;">Direccion</label></div>
                            <div style="margin-left: 6%;" class="col-xs-12 col-sm-11 col-sm-offset-0">
                                <div class="group-material" style="margin-bottom: 2%;margin-right: 5%;">
                                            <textarea id="direccionpro" name="direccionpro" type="text" class="material-control tooltips-general" placeholder="" required="" data-toggle="tooltip" data-placement="top" title="" style="width: 102%; height: 1%;" data-original-title="Solo letras"></textarea>
                                        </div>
                            </div>
                            <div id="repuesta"></div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <center>
                                <button type="button" class="btn btn-primary" onclick="GuardarProp();"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
                            <footer class="footer full-reset">
                                <div class="footer-copyright full-reset all-tittles"> <center>Universidad de EL Salvador-FMP 2019</center></div>
                            </footer>
                        </div>
                        </div>
                    </body>
                    </html>
