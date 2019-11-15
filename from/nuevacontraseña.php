<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Nueva Contraseña</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="../assets/img/icon-clinica.jpg" />
    <link rel="stylesheet" href="../assets/css/sweet-alert.css">
    <link rel="stylesheet" href="../assets/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../assets/css/normalize.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/login.css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      function onEntrar(){
        document.getElementById('bandera').value="add";
        document.frmveterinaria.submit(); 
      }
    </script>
</head>
<body class="full-cover-background" style="background-image:url(../assets/img/icon-clinica.jpg);">
    <div class="form-container">
      <p class="text-center" style="margin-top: -60px;">
           <img src="../assets/img/logo1.png" class="img-responsive center-box" style="width:100%;">
       </p>
       <h1 class="text-center">Nueva Contraseña</h1>
       <h4 class="text-center" style="margin-bottom: 30px;color: #0000008f;">Se le a enviado su nueva contraseña a su correo electronico</h4>
       <form id="frmveterinaria" name="frmveterinaria" method="post" action="" >
        <input type="hidden" id="bandera" name="bandera">
        <h5 class="text-center" style="margin-bottom: 30px;color: #0000008f;">Por favor digite su nueva contraseña</h4>
            <br>
            <div class="group-material-login">
              <input type="password" class="material-login-control" required="" maxlength="70">
              <span class="highlight-login"></span>
              <span class="bar-login"></span>
              <label><i class="zmdi zmdi-lock"></i> &nbsp; Nueva Contraseña</label>
            </div>
            <div style="margin: 20% 0;"></div>
            <div class="col-xs-4 col-sm-12 col-sm-offset-1">
            <button class="btn-login" type="submit" onclick="onEntrar()" style="color: #2913ce;
font-weight: bold;">Siguiente &nbsp; <i class="zmdi zmdi-arrow-right"></i></button></div>
        </form>
    </div>  
</body>
</html>
<?php
$bandera = isset($_REQUEST['bandera']) ? $_REQUEST['bandera'] : '';
if($bandera == "add"){
  echo "<script type= 'text/javascript'>";
  echo "location.href = 'login.php';";
  echo "</script>";
  }
?>