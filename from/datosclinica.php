<?php session_start();
  if($_SESSION["logeado"] == false) {
header("location:login.php");
  }
  ?>

<?php
include"../config/conexion.php";
$var = 0;
$consulidclinica = "SELECT COUNT(dc.id_DatClinica) as cont from datosclinica dc";
$result = $conexion->query($consulidclinica);
if($result){
  $fila = $result->fetch_object();
  $var = $fila->cont;
};
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Datos Clinica</title>
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
  <script type="text/javascript" src="../assets/js/jquery.mask.min.js"></script>
  <script type="text/javascript" src="../assets/js/sweet-alert.min.js"></script>
  <script type="text/javascript">
    function actualizar(){location.reload(true);}

    function Modificar(){
      var nombrem=document.getElementById('nombrem').value;
      var telefonom=document.getElementById('telefonom').value;
      var direccionm=document.getElementById('direccionm').value;
      var fechaaperturam=document.getElementById('fechaaperturam').value;
      if(nombrem==""){
       alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: nombre no puede ir vacío', 'success', 5, function(){});
     }
     if(telefonom==""){
       alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: teléfono no puede ir vacío', 'success', 5, function(){});
     }
     if(direccionm==""){
       alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: direccion no puede ir vacío', 'success', 5, function(){});
     }
     if(fechaaperturam==""){
      alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: fecha no puede ir vacía', 'success', 5, function(){});
    }
    if(!nombrem=="" && !telefonom=="" && !direccionm=="" & (!fechaaperturam=="")){
      var datos=$("#frmmodificarC").serialize();
      $.ajax({
        type:"POST",
        url:"../metodosAjax/save-datosclinica.php",
        data:datos,
        success:function(resp){
         document.getElementById('miTabla').innerHTML=resp;
         mostrarMensaje('Se Modificó','success',null,"El registro a sido modificado satisfactoriamente ",true);
       }
     });
    }
    document.getElementById("fotoCargada").src = "../serverImages/clinica/logo1.png";
  }

  function GuardarClinica(){
    var nombre=document.getElementById('nombre').value;
    var telefono=document.getElementById('telefono').value;
    var direccion=document.getElementById('direccion').value;
    var fecha=document.getElementById('fechaapertura').value;
    var imagen=document.getElementById('imagen').value;

    if(nombre==""){
     alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACÍO</strong>: nombre no puede ir vacío', 'success', 5, function(){});
   }
   if(telefono==""){
     alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACÍO</strong>: teléfono no puede ir vacío', 'success', 5, function(){});
   }
   if(direccion==""){
     alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACÍO</strong>: direccion no puede ir vacío', 'success', 5, function(){});
   }
   if(fecha==""){
     alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACÍO</strong>: fecha no puede ir vacía', 'success', 5, function(){});
   }
   if(imagen==""){
     alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACÍO</strong>: Imagen no puede ir vacía', 'success', 5, function(){});
   }
   if(!nombre=="" && !telefono=="" && !direccion=="" & (!fecha=="") && !direccion==""){
    var form = document.querySelector("#frmclinica");
    var datos = new FormData(form);
    var obj = {
      type:"POST",
      contentType: false, 
      processData: false, 
      data:datos,
      url:"../metodosAjax/save-datosclinica.php",       
      success:function(resp){
        console.log(resp);
        document.getElementById("frmclinica").reset();
        mostrarMensaje('Guardado','success',3500,resp,true);
        $("guardar").attr('disabled','disabled');
        setInterval("actualizar()",3400);
      }
    };
    $.ajax(obj);
  }
  document.getElementById("fotoCargada").src = "../serverImages/clinica/logo1.png";
}
function editar(id){
  $.ajax({
    type:"POST",
    url:"../metodosAjax/save-datosclinica.php",
    data:{val:id},
    success:function(resp){
      document.getElementById('datos').innerHTML=resp;
    }
  });
}
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
        <h1 class="all-tittles">Animal Pet's <small>Administración</small></h1>
      </div>
    </div>
    <div class="container-fluid">
      <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
        <li role="presentation" ><a href="usuario.php">Usuarios</a></li>
        <li role="presentation" ><a href="proveedor.php">Proveedores</a></li>
        <li role="presentation" class="active"><a href="datosclinica.php">Informacion Clinica</a></li>
      </ul>
    </div>
    <div class="container-fluid"  style="margin: 20px 0;">
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 lead">
          <ol class="breadcrumb">
            <li class="active">Clinica</li>
          </ol>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="container-flat-form">
        <div class="title-flat-form title-flat-blue">Registrar</div>
        <div class="container-flat-form">
         <div class="row" >
          <div class="col-xs-4 col-sm-2 col-sm-offset-5" >



           <div class="full-reset" style="padding: 10px 0; color:#fff; margin-top: -8px">
            <div style="margin: 20px 0;"></div>
            <figure>
              <img id="fotoCargada" src="../serverImages/clinica/logo1.png" class="img-responsive center-box" style="width:110%;">
            </figure>
          </div>
        </div>

        <form id="frmclinica" name="frmclinica" method="post" enctype="multipart/form-data" action="">
          <div class="col-xs-6 col-sm-7 col-sm-offset-3" >
            <input id="imagen" name="imagen" size="30" type="file" accept="image/*">
          </div>
          <script src="../assets/js/cargarFoto.js"></script>

        </div>
      </div>

      
      <div class="row">

        <div class="col-xs-4 col-sm-5 col-sm-offset-1">
         <div class="group-material">
           <input id="nombre" name="nombre" type="text" class="material-control tooltips-general" placeholder="Nombre de la Clínica" required="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Solo letras">
           <label>Nombre</label>
         </div>
       </div>

       <div class="col-xs-4 col-sm-5 col-sm-offset-1">

        <div class="group-material">
         <input id="direccion" name="direccion" type="text" class="material-control tooltips-general" placeholder="" required="" data-toggle="tooltip" data-placement="top" title="">
         <label>Dirección</label>
       </div>
     </div>

     <script type="text/javascript">
      $(document).ready(function(){
        $("#telefono").mask("0000-0000");
      });
    </script>

    <div class="col-xs-4 col-sm-5 col-sm-offset-1">
     <div class="group-material">
      <input id="telefono" name="telefono" type="text" class="material-control tooltips-general" placeholder="####-####" data-toggle="tooltip" data-placement="top" data-original-title="0000-0000" maxlength="9">
      <label>Teléfono</label>
    </div>
  </div>

  <div class="col-xs-4 col-sm-5 col-sm-offset-1">

    <div class="group-material">
     <input id="fechaapertura" name="fechaapertura" type="date" class="material-control" placeholder="" required="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Solo letras" max="2019-11-08">
     <label>Fecha de Apertura</label>
   </div>
 </div>

 <p class="text-center" style="margin-top: 20%">
  <button id="guardar" name="guardar" type="button" <?php if ($var==1) {?>
    disabled="" <?php
  } ?> onclick="GuardarClinica()" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
  <button type="reset" class="btn btn-info"><i class="zmdi zmdi-refresh-alt"></i> &nbsp;&nbsp; Cancelar</button>
</p> 

</form>

<div class="container-fluid col-sm-10 col-sm-offset-1">
  <div class="div-table">
    <table id="miTabla" class="display responsive nowrap" style="width:100%">
      <thead>
        <tr>
          <th>Nombre </th>
          <th>Dirección</th>
          <th>Teléfono</th>
          <th>Fecha apertura</th>
          <th>Acción</th>

        </tr>
      </thead>
      <tbody>
        <?php
        include "../config/conexion.php";
        $result=$conexion->query("SELECT
          dc.id_DatClinica as id,
          dc.nombre as nombre,
          dc.direccion as direccion,
          dc.telefono as telefono,
          dc.fecha_apertura as fecha
          FROM
          datosclinica dc");
        if($result){
          while($fila = $result->fetch_object()){ ?>
            <tr>
              <td><?php echo $fila->nombre ?></td>
              <td title="<?php echo $fila->direccion ?>"><?php echo substr($fila->direccion, 0, 35); ?></td>
              <td><?php echo $fila->telefono ?></td>
              <td><?php echo $fila->fecha ?></td>
              <td><button data-toggle= "modal" data-target= "#modificarClinica" class="material-control tooltips-general" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Editar" onclick="editar(<?php echo $fila->id?>)">
                <i class="zmdi zmdi-edit" style="color: #31920D;">
                </i>
              </button></td>
            </tr>
            <?php
          }
        }
        ?>
      </tbody>
    </table>
  </div><div style="margin: 6.5% 0;"></div>
</div>
</div>
</div>


<div class="modal fade" id="modificarClinica">
  <div class="modal-dialog" style="width: 50%;">
    <div class="modal-content">
      <div class="modal-header">
        <center>
          <h5 class="modal-title"> Modificar Clínica</h5></center>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"> × </span>
          </button>
        </div>
        <div class="modal-body" id="datos">
          <div class="container-fluid">
           <div class="col-xs-12 col-sm-offset-0">
            <div class="title-flat-form title-flat-blue">Modificar</div>
            <form id="frmmodificarC" name="frmmodificarC" method="post" action="">
              <div class="col-xs-5 col-sm-5 col-sm-offset-1" style="margin-left: 9%;">
                <div class="group-material">
                 <input id="nombrem" name="nombrem" type="text" class="material-control tooltips-general" placeholder="Animals Pets" required="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Solo letras">
                 <label>Nombre</label>
               </div>
             </div>
             <div class="col-xs-5 col-sm-5 col-sm-offset-0">
              <div class="group-material">
               <input id="direccionm" name="direccionm" type="text" class="material-control tooltips-general" placeholder="Dirección de la veterinaria" required="" data-toggle="tooltip" data-placement="top" title="">
               <label>Dirección</label>
             </div>
           </div>
           <script type="text/javascript">
            $(document).ready(function(){
             $("#telefonom").mask("0000-0000");
           });
         </script>
         <div class="col-xs-5 col-sm-5 col-sm-offset-1" style="margin-left: 9%;">
          <div class="group-material">
            <input id="telefonom" name="telefonom" type="text" class="material-control tooltips-general" placeholder="####-####" required="" data-toggle="tooltip" maxlength="9" data-placement="top" title="Número de celular válido">
            <label>Telefono</label>
          </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-sm-offset-0">
          <div class="group-material">
             <input id="fechaaperturam" name="fechaaperturam" type="date" class="material-control" placeholder="Zavala" required="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Solo letras">
             <label>Fecha de Apertura</label>
           </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal-footer">
  <center>
   <button type="button" class="btn btn-success" data-dismiss="modal" style="margin-right: 20px;" onclick="Modificar()">
    <i class="zmdi zmdi-edit" style="color: #fff;">
    </i>&nbsp;&nbsp;Modificar</button>
    <a type="button" data-dismiss="modal" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-refresh-alt"></i> Cancelar</a>
  </center>
</div>
</div>
</div>
</div>

<footer class="footer full-reset">
  <div class="footer-copyright full-reset all-tittles"> <center>Universidad de EL Salvador-FMP 2019</center></div>
</footer>
</div>
</body>
</html>