<?php
  session_start();
  //if($_SESSION["logeado"] == false) {
    //header("location:login.php");
  //}
  $salir = $_REQUEST["salir"] ?? false;
  if($salir == "true" ) {
    $_SESSION["logeado"] = false;
  }
  $logeado = $_SESSION["logeado"] ?? false;
  if($logeado == true) {
    header("location:inicio.php");
  }

  
  include"../config/conexion.php";
  $coinciden = true;
  $usuario= isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : '';
  $contrasena=isset($_REQUEST['contrasena']) ? $_REQUEST['contrasena'] : '';
  $bandera = isset($_REQUEST['bandera']) ? $_REQUEST['bandera'] : '';
  if($bandera == "add"){

   $consultaL="SELECT * FROM usuarios WHERE nomUsuario = '$usuario'";
    $resultado = $conexion->query($consultaL);
   if($resultado){
    if($resultado->num_rows > 0) {
     while($fila = $resultado->fetch_object()){
      if(password_verify($contrasena, $fila->contrasena)){
//Sesiion
        $consulta1="SELECT * FROM empleados WHERE nombre_usuario = '$usuario'";

        $resultado2 = $conexion->query($consulta1);
        if($resultado2){
          if($resultado2->num_rows >0){
            echo "hay empleados";
            while ($fila2 = $resultado2->fetch_object()) {
              echo "hay una coincidencias";
              $_SESSION["Codigo de Empleado"] =  $fila2->id_Empleado;
              $_SESSION["nombres"] =  $fila2->nombres." ".$fila2->apellidos;
              $_SESSION["foto"] =  $fila2->foto;
              $_SESSION["rol"] =  $fila2->rol;
              $_SESSION["logeado"] = true;
              echo $_SESSION["foto"];
                header("location:inicio.php");
            }
          } else {
            // no hay coincidencias en empleado
            $_SESSION["logeado"] = false;
          }
        } 
      }else {
       $mensaje = "La contraseña no coincide";
       $_SESSION["logeado"] = false;
       $coinciden = false;
     }
   }
 }  else {
  $mensaje = "Ningun usuario coincide con $usuario";
  $_SESSION["logeado"] = false;
  $coinciden = false;
}
}
}
?>

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

    function DatosInvalidos(){
      alertify.error('<strong style="font-size: 14px;font-weight: bold;">DATOS INVALIDOS</strong>: Datos incorrectos', 'success', 5, function(){});
    }

    function onEntrar(){
      document.getElementById('bandera').value="add";
      document.frmveterinaria.submit(); 
    }

    function onRecuperar(){
      document.getElementById('bandera').value="recu";
      document.frmveterinaria.submit(); 
    }
  </script>
  <?php
  if($bandera == "recu"){
    echo "<script type= 'text/javascript'>";
    echo "location.href = 'recuperar.php';";
    echo "</script>";
  }
  ?>
</head>
<body class="full-cover-background" style="background-image:url(../assets/img/icon-clinica.jpg);">
  <div class="form-container">
    <p class="text-center" style="margin-top: -60px;">
     <img src="../assets/img/logo1.png" class="img-responsive center-box" style="width:100%;">
   </p>
   <h4 class="text-center all-tittles" style="margin-bottom: 30px;">Inicio Sesión</h4>
   <form id="frmveterinaria" name="frmveterinaria" method="post" action="" >
    <input type="hidden" id="bandera" name="bandera">
    <div class="group-material-login">
      <input type="text" name="usuario" class="material-login-control" maxlength="70" novalidate="true" autocomplete="off">
      <label><i class="zmdi zmdi-account"></i> &nbsp; Usuario</label>
    </div>
  </br>
  <div class="group-material-login">
    <input type="password" name="contrasena" class="material-login-control" maxlength="70" autocomplete="off">
    <span class="highlight-login"></span>
    <span class="bar-login"></span>
    <label><i class="zmdi zmdi-lock"></i> &nbsp; Contraseña</label>
  </div>
  <div style="margin: 10% 0;"></div>
  <div class="col-xs-4 col-sm-8 col-sm-offset-0" style="margin-left: -15%;">
    <button class="btn-login" type="submit" onclick="onRecuperar()" style="color: #2913ce;
    font-weight: bold;">¿Olvidaste la contraseña? &nbsp;</button></div>
    <div style="margin: 20% 0;"></div>
    <div class="col-xs-4 col-sm-12 col-sm-offset-1">
      <button class="btn-login" type="submit" onclick="onEntrar()" style="    color: #111;
      font-weight: bold;">Ingresar al sistema &nbsp; <i class="zmdi zmdi-arrow-right"></i></button>
    </div>
  </form>

  <?php 
  if($coinciden == false) {?>
    <div class="alert alert-danger">
      <?=$mensaje?>    
    </div>
  <?php }
  ?>
</div>  
</body>
</html>
