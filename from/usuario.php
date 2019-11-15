<?php session_start();
  if($_SESSION["logeado"] == false) {
header("location:login.php");
  }
  ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Usuario</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="Shortcut Icon" type="image/x-icon" href="../assets/img/logoclinica.png" />
  <link rel="stylesheet" href="../assets/css/sweet-alert.css">
  <link rel="stylesheet" href="../assets/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" href="../assets/css/normalize.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/jquery.mCustomScrollbar.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/alertify.min.css">
  <link rel="stylesheet" href="../assets/css/default.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.css" id="theme-styles">
  <script src="../assets/js/sweet-alert.min.js"></script>
  <script src="../assets/js/jquery.js"></script>
  <script src="../assets/js/jquery.dataTables.min.js"></script>  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="../assets/js/jquery-1.11.2.min.js"><\/script>')</script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.js"></script>
  <script src="../assets/js/sweetalert2.min.js"></script>
  <script src="../assets/js/modernizr.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="../assets/js/main.js"></script>
  <script src="../assets/js/alertify.min.js"></script>
  <script src="../assets/js/controlador.js"></script>
  <script type="text/javascript" src="../assets/datatable/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="../assets/datatable/js/dataTables.responsive.min.js"></script>
  <script type="text/javascript" src="../assets/datatable/datatable.js"></script>
  <script type="text/javascript" src="../assets/js/jquery.mask.min.js"></script>
  <script type="text/javascript" src="../assets/js/sweet-alert.min.js"></script>
  <script type="text/javascript">
    function GuardarUsuario(){
      var dui=document.getElementById('dui').value;
      var nombre=document.getElementById('nombre').value;
      var apellido=document.getElementById('apellido').value;
      var fechanacimiento=document.getElementById('fechanacimiento').value;
      //var sexo=document.getElementById('sexo').value;
      var telefono=document.getElementById('telefono').value;
      var direccion=document.getElementById('direccion').value;
      var email=document.getElementById('email').value;
      var user=document.getElementById('user').value;
      var imagen=document.getElementById('imagen').value;
      var contrasena=document.getElementById('contrasena').value;
      var rol=document.getElementById('rol').value;
      if(dui==""){
       alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACÍO</strong>: DUI no puede ir vacío', 'success', 5, function(){});
     }
     if(nombre==""){
       alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACÍO</strong>: Nombre no puede ir vacío', 'success', 5, function(){});
     }if(imagen==""){
       alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACÍO</strong>: imagen no puede ir vacía', 'success', 5, function(){});
     }
     if(apellido==""){
       alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACÍO</strong>: Apellido no puede ir vacío', 'success', 5, function(){});
     }
     if(fechanacimiento==""){
       alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACÍO</strong>: Fecha de Nacimiento no puede ir vacío', 'success', 5, function(){});
     }
     if(telefono==""){
       alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACÍO</strong>: Teléfono no puede ir vacío', 'success', 5, function(){});
     }
     if(direccion==""){
       alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACÍO</strong>: Dirección no puede ir vacío', 'success', 5, function(){});
     }
     if(validar_email(email)==false ){
       alertify.error('<strong style="font-size: 14px;font-weight: bold;">Error</strong>: Correo no valido', 'success', 5, function(){});
     }
     if(user==""){
       alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACÍO</strong>: Nombre de Usuario no puede ir vacío', 'success', 5, function(){});
     }
     if(contrasena==""){
       alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACÍO</strong>: Contraseña no puede ir vacío', 'success', 5, function(){});
     }
     if(rol==""){
       alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACIO</strong>: Rol no puede ir vacío', 'success', 5, function(){});
     }

     if(!nombre=="" && !apellido=="" && !fechanacimiento=="" && !telefono=="" && !direccion=="" && !user=="" && !contrasena=="" && !rol=="" && (!email=="" && validar_email(email)) && !imagen==""){
      mostrarMensaje('Se guardó correctamente','success',null,"Guardado",true);
      document.getElementById("fotoCargada").src = "../serverImages/users/doctor.png";
    }

  }
  function cancelar(){
    document.getElementById("frmuser").reset();
  }
  function validar_email(c) 
  {
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(c) ? true : false;
  }
  function actualizar(){location.reload(true);}
  function control(f){
    var ext=['gif','jpg','jpeg','png'];
    var v=f.value.split('.').pop().toLowerCase();
    for(var i=0,n;n=ext[i];i++){
      if(n.toLowerCase()==v)
        return
    }
    var t=f.cloneNode(true);
    t.value='';
    f.parentNode.replaceChild(t,f);
    mostrarMensaje('FORMATO NO VÁLIDO','info',3500,"Seleccione una imagen válida.",true); 
    setInterval("actualizar()",3000);
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
        <li role="presentation" class="active"><a href="usuario.php">Usuarios</a></li>
        <li role="presentation" ><a href="proveedor.php">Proveedores</a></li>
        <li role="presentation"><a href="datosclinica.php">Informacion Clinica</a></li>
      </ul>
    </div>
    <div class="container-fluid"  style="margin: 20px 0;">
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 lead">
          <ol class="breadcrumb">
            <li class="active">Nuevo</li>
            <li><a href="listausuarios.php">Listado</a></li>
          </ol>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="container-flat-form">
        <div class="title-flat-form title-flat-blue">Registrar</div>
        <form id="frmuser" name="frmuser" method="post" enctype="multipart/form-data" action="../metodosAjax/save-usuarios.php">
         <div class="row" style="margin-top: -5%;">

           <div class="container-flat-form" id="uploadFile_div">
             <div class="row">
              <div class="col-xs-4 col-sm-2 col-sm-offset-5">

               <div class="full-reset" style="padding: 10px 0; color:#fff;">
                <div style="margin: 20px 0;"></div>
                <figure>
                  <img id="fotoCargada" src="../serverImages/users/doctor.png" class="img-responsive center-box mCS_img_loaded" style="width:100%;">
                </figure>
              </div>
            </div>

            <div class="col-xs-6 col-sm-7 col-sm-offset-3">
              <input id="imagen" name="imagen" size="30" type="file" accept="image/*" onchange="control(this)">
            </div>
            <script src="../assets/js/cargarFoto.js"></script>         

          </div>
        </div>

        <br>
        <script type="text/javascript">
          $(document).ready(function(){
            $("#dui").mask("00000000-0");
          });
        </script>
        <div class="col-xs-2 col-sm-2 col-sm-offset-1">
         <div class="group-material">
           <input id="dui" name="dui" type="text" class="material-control tooltips-general" placeholder="########-#" required="" data-toggle="tooltip" data-placement="top" title="" data-original-title="00000000-0" maxlength="10">
           <label>Dui</label>
         </div>
       </div>

       <div class="col-xs-4 col-sm-5 col-sm-offset-0">

        <div class="group-material">
         <input id="nombre" name="nombre" type="text" class="material-control tooltips-general" required="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Solo letras" maxlength="100">
         <label>Nombres</label>
       </div>
     </div>



     <div class="col-xs-4 col-sm-4 col-sm-offset-0">
       <div class="group-material">
         <input id="apellido" name="apellido" type="text" class="material-control tooltips-general" required="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Solo letras" maxlength="100">
         <label>Apellidos</label>
       </div>
     </div>

     <div class="col-xs-4 col-sm-3 col-sm-offset-1">

      <div class="group-material">
       <input id="fechanacimiento" name="fechanacimiento" type="date" class="material-control tooltips-general" required="" data-toggle="tooltip" data-placement="top" title="" min="2001-11-08" max="2079-11-08">
       <label>Fecha Nacimiento</label>
     </div>
   </div>

   <div class="col-xs-4 col-sm-5 col-sm-offset-0" style="margin-top: -3%;">
    <fieldset>
      <legend>Sexo</legend>
      <div><center>
        <div class="contenedorad">
          <div class="radio">
            <input type="radio" name="sexo" id="masculino" value="Masculino">
            <label for="masculino">Másculino</label>
            <input type="radio" name="sexo" id="femenino" value="Femenino">
            <label for="femenino">Fémenino</label>
          </div></div></center></div>
        </fieldset>
      </div>

      <div class="col-xs-4 col-sm-3 col-sm-offset-0">
        <script type="text/javascript">
          $(document).ready(function(){
            $("#telefono").mask("0000-0000");
          });
        </script>
        <div class="group-material">
         <input id="telefono" name="telefono" type="tel" class="material-control tooltips-general" placeholder="####-####" required="" data-toggle="tooltip" data-placement="top" title="">
         <label>Teléfono</label>
       </div>
     </div>

     <div class="row">
      <div class="col-xs-8 col-sm-8 col-sm-offset-1" style="left: -20px;">
        <div style="margin-left: 6%;margin-top: -2%;"><label style="color: #53a5b4;font-weight: bold;">Dirección</label></div>

        <div style="margin-left: 6%;">
          <div class="group-material" style="margin-bottom: 2%;margin-right: 5%;">
            <textarea id="direccion" name="direccion" type="text" class="material-control tooltips-general" required="" data-toggle="tooltip" data-placement="top" title="" style="width: 100%; height: 1%;" maxlength="500"></textarea>
          </div>
        </div>
      </div>
      <div class="col-xs-4 col-sm-3 col-sm-offset-8" style="top: -60px">
        <div class="group-material">
         <input id="email" name="email" type="Email" class="material-control tooltips-general" placeholder="XXXX@correo.com" required="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Solo letras">
         <label>Email</label>
       </div> 
     </div>
   </div>
   <hr style="color: #0056b2; margin-top: 0%">
   <div id="realizar">            
    <br>
    <div class="col-xs-4 col-sm-3 col-sm-offset-1">

     <div class="group-material">

       <input id="user" name="user" type="text" class="material-control tooltips-general" placeholder="Digite..." required="" data-toggle="tooltip" data-placement="top" title="">
       <label>Usuario</label>
     </div> 

   </div>

   <div class="col-xs-4 col-sm-5 col-sm-offset-0">
    <div class="group-material">
     <input id="contrasena" name="contrasena" type="password" class="material-control tooltips-general" placeholder="Máximo 50 carácteres" required="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Solo letras" maxlength="50">
     <label>Contraseña</label> 
   </div>
 </div>
 <div class="col-xs-4 col-sm-3 col-sm-offset-0">
   <div class="group-material">
     <SELECT id="rol" NAME="rol" class="material-control tooltips-general"> 
      <OPTION VALUE="" disabled >Seleccione...</OPTION>
      <OPTION VALUE="Administrador">Administrador</OPTION>
      <OPTION VALUE="Secretaria">Secretaria</OPTION>
      <OPTION VALUE="Vendedor">Vendedor</OPTION> 
    </SELECT> 
    <label>Rol</label> 
  </div>

</div>

<p class="text-center" style="/*! margin-top: 20% */">
  <button type="submit" class="btn btn-primary" onclick="GuardarUsuario()"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
  <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-refresh-alt"></i> &nbsp;&nbsp; Cancelar</button>
</p> 
</div>
</div>



</form>

</div>
</div>

<footer class="footer full-reset">
  <div class="footer-copyright full-reset all-tittles"><center>Universidad de EL Salvador-FMP 2019</center></div>
</footer>
</div>
</body>
</html>