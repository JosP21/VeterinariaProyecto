<?php session_start();
if($_SESSION["logeado"] == false) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Gestionar Restauración y Backup</title>
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

</head>

<?php
include "../from/menu.php"
?>
<div class="content-page-container full-reset custom-scroll-containers">
    <div style="margin: 40px 0;"></div>
    <div class="container">
        <div class="page-header">
          <h1 class="all-tittles">animal pet's <small> &nbsp;&nbsp;Restauración y Backup de Base de Datos</small></h1>
      </div>
  </div>
  <div class="container-fluid">
    <form>
      <div class="row">
          <section class="full-reset text-center" style="padding: 40px 0;">
            <article class="tile" data-toggle="modal" data-target= "#expediente">
                <a href="../backups/restore.php">
                    <div class="tile-icon full-reset"><i class="zmdi zmdi-cloud-download" style="color: #5aa6a1;" ></i></div>
                    <div class="tile-num full-reset" style="font-size: 25px;background-color: #41a6a4;color: #fff;">Restauración</div></a>
                </article>
                <article class="tile" data-toggle="modal" data-target= "#citas">
                     <a href="../backups/backup.php">
                    <div class="tile-icon full-reset"><i class="zmdi zmdi-cloud-upload" style="color: #5aa6a1;"></i></div>
                    <div class="tile-num full-reset" style="font-size: 25px;background-color: #41a6a4;color: #fff;">Backup</div></a>
                </article>
            </section>
        </div>
        <div style="margin: 5% 0;"></div>
    </form>
</div>
<div class="modal fade" id="reportVenta" style="overflow-y: scroll;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h5 class="modal-title"> Vista Previa</h5></center>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid" style="margin: 5px 0;"></div>

                    <div class="container-fluid">

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
    <footer class="footer full-reset">
        <div class="footer-copyright full-reset all-tittles"> <center>Universidad de EL Salvador-FMP 2019</center></div>
    </footer>
</div>
</body>
</html>