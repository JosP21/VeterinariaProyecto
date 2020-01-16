<?php session_start();
  if($_SESSION["logeado"] == false) {
header("location:login.php");
  }
  ?>
<!-- 
* Copyright 2016 Carlos Eduardo Alfaro Orellana
-->
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Gestionar Reportes</title>
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
     <script src="../assets/js/script.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/alertify.min.js"></script>
    <script src="../assets/js/controlador.js"></script>
    <script>
$(document).ready(function(){
$("#cita").click(function(){
$("#realizar").show();
});
$("#consulta").click(function(){
$("#realizar").hide();
});
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
              <h1 class="all-tittles">animal pet's <small> &nbsp;&nbsp;Reportes</small></h1>
            </div>
        </div>
        <div class="container-fluid" style="border-bottom: 1px solid #00000042;margin-right: 1%;margin-left: 1%;">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;width: 40%;">
              <li role="presentation" class="active"><a href="reportes.php">Gestionar Reportes</a></li>
            </ul>
        </div>
        <div class="container-fluid">
                <form>
                      <div class="row">
                          <section class="full-reset text-center" style="padding: 40px 0;">
                            <article class="tile" onclick="abrirRC();">
                                <div class="tile-icon full-reset"><i class="zmdi zmdi-shopping-cart-plus" style="color: #0f4a6c;"></i></div>
                                <div class="tile-num full-reset" style="font-size: 25px;background-color: #41a6a4;color: #fff;">Reporte de compra</div>
                            </article>
                            <article class="tile" onclick="abrirRV();">
                                <div class="tile-icon full-reset"><i class="zmdi zmdi-calendar-check" style="color: #0f4a6c;"></i></div>
                                <div class="tile-num full-reset" style="font-size: 25px;background-color: #41a6a4;color: #fff;">Reporte de venta</div>
                            </article>
                        </section>
                      </div>
                      <div style="margin: 5% 0;"></div>
               </form>
        </div>
        <footer class="footer full-reset">
            <div class="footer-copyright full-reset all-tittles"><center>Universidad de EL Salvador-FMP 2019</center></div>
        </footer>
    </div>
</body>
</html>
