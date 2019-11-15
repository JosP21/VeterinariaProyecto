
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio Sesión</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="../assets/img/icon-clinica.jpg" />
     <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
     <link rel="stylesheet" href="../assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/alertify.min.css">
      <script src="../assets/js/alertify.min.js"></script>
    <link rel="stylesheet" href="../assets/css/default.min.css">
     <script src="../assets/js/jquery-1.4.4.min.js"></script>
      <script src="../assets/js/jquery.dataTables.min.js"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/jquery-1.11.2.min.js"><\/script>')</script>
      <script src="../assets/js/sweetalert2.min.js"></script>
      <link rel="stylesheet" href="../assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="../assets/css/sweet-alert.css">
    <link rel="stylesheet" href="../assets/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../assets/css/normalize.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/login.css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
     <script src="../assets/js/main.js"></script>
      <script src="../assets/js/controlador.js"></script>
     <script src="../assets/js/modernizr.js"></script>
     <script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script type="text/javascript" src="../assets/datatable/datatable.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="../assets/js/sweet-alert.min.js"></script>
      <link rel="stylesheet" href="../assets/datatable/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="../assets/datatable/css/responsive.dataTables.min.css">
 <script type="text/javascript" src="../assets/datatable/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../assets/datatable/js/dataTables.responsive.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/sweet-alert.css">
    <link rel="stylesheet" href="../assets/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../assets/css/normalize.css">
    <script type="text/javascript">
      function onEntrar(){
        // Primero validamos que ese correo exista en la bd
    $.ajax({
                    type:"POST",
                    url:"../metodosAjax/verificarCorreo.php?val="+$("#correo").val(),
                    format: 'html',
                    success:function(resp){
                      if(resp=="si"){
                        //  Si el correo existe enviamos el codigo
                        $.ajax({
                        type:"POST",
                        url:"../from/email.php?val="+$("#correo").val(),
                        format: 'html',
                        success:function(respuesta){
                          if(respuesta=="enviado"){
                           mostrarMensaje('El correo se envio correctamente','success',null," ",true);
                           }else{
                           mostrarMensaje('El correo no se pudo enviar','error',15000);;
                          }
                        }
                      });

                      }else{                             
                mostrarMensaje('El correo no se encuentra en la Base de Datos','error',15000);;
                
                      }
                    }
                   });
      }

    </script>
</head>
<body class="full-cover-background" style="background-image:url(../assets/img/icon-clinica.jpg);">
    <div class="form-container">
      <p class="text-center" style="margin-top: -60px;">
           <img src="../assets/img/logo1.png" class="img-responsive center-box" style="width:100%;">
       </p>
       <h1 class="text-center">Recuperar Contraseña</h1>
       <h4 class="text-center" style="margin-bottom: 30px;color: #0000008f;">Para poder recuperar su contraseña introduzca su correo electronico</h4>
       <form id="frmveterinaria" name="frmveterinaria" >
        <input type="hidden" id="bandera" name="bandera">
            <br>
            <div class="group-material-login">
              <input type="text" class="material-login-control" id="correo" required="" maxlength="70">
              <span class="highlight-login"></span>
              <span class="bar-login"></span>
              <label><i class="zmdi zmdi-lock"></i> &nbsp; Correo</label>
            </div>
            <div style="margin: 20% 0;"></div>
            <div class="col-xs-4 col-sm-12 col-sm-offset-1">
            <button type="button" class="btn-login"  onclick="onEntrar()" style="color: #2913ce;
font-weight: bold;">Enviar Código &nbsp; <i class="zmdi zmdi-arrow-right"></i></button></div>

 <div class="col-xs-15 col-sm-1 col-sm-offset-2">
            <button type="button" class="btn-login"  onclick="location.href='login.php';" style="color: #2913ce;
font-weight: bold;">Iniciar Sesión</i></button></div>
        </form>
    </div>  
</body>
</html>
<?php
$bandera = isset($_REQUEST['bandera']) ? $_REQUEST['bandera'] : '';
if($bandera == "add"){
  echo "<script type= 'text/javascript'>";
  echo "location.href = 'ingCodigo.php';";
  echo "</script>";
  }
?>