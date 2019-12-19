<?php session_start();
if($_SESSION["logeado"] == false) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Infomacion Servicios</title>
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
    <link rel="stylesheet" href="../assets/datatable/css/jquery.dataTables.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="../assets/js/jquery-1.11.2.min.js"><\/script>')
    </script>
    <script src="../assets/js/modernizr.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script type="text/javascript" src="../assets/datatable/js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../assets/datatable/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../assets/datatable/datatable.js"></script>
    <script type="text/javascript">
        function idExp(id){
            $.ajax({
                type:"POST",
                url:"../metodosAjax/ServicioPorExpediente.php",
                data:{val:id},
                success:function(resp){
                 document.getElementById('datos').innerHTML=resp;
             }
         });
        }
    </script>
</head>

<body>
    <?php
    include "../from/menu.php"
    ?>
    <div class="content-page-container full-reset custom-scroll-containers">
        <div style="margin: 40px 0;"></div>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Animal Pet's <small>&nbsp;&nbsp;Servicios</small></h1>
          </div>
      </div>
      <div class="container-fluid">
          <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
            <li role="presentation" class="active"><a href="servicios.php">Gestionar Servicios</a></li>
            <li role="presentation"><a href="inventarioser.php">Inventario</a></li>
        </ul>
    </div>
    <div class="container-fluid" style="margin: 10px 0;">
        <div class="row">
            <div class="col-xs-12 lead">
                <ol class="breadcrumb">
                    <li><a href="servicios.php">Nuevo</a></li>
                    <li class="active">Servicios Realizados</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="container-fluid col-sm-8 col-sm-offset-2">
        <div class="div-table">
            <table id="miTabla" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Expediente</th>
                        <th>Detalle</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "../config/conexion.php";
                    $result=$conexion->query("SELECT
                        mascotas.id_mascota,
                        mascotas.nombre,
                        Sum(servicios.precio) AS total,
                        raza.nombre as raza
                        FROM
                        citas
                        INNER JOIN mascotas ON citas.id_mascota = mascotas.id_mascota
                        INNER JOIN raza ON mascotas.id_raza = raza.id_raza
                        INNER JOIN detservicio ON detservicio.id_cita = citas.id_cita
                        INNER JOIN servicios ON detservicio.id_servicio = servicios.id_servicio
                        GROUP BY mascotas.id_mascota
                        ORDER BY mascotas.nombre");
                    if($result){
                      while($fila = $result->fetch_object()){ ?>
                        <tr>
                            <td><?php echo $fila->id_mascota." ".$fila->nombre." - ".$fila->raza?></td>
                            <td>
                                <a onclick="idExp('<?php echo($fila->id_mascota) ?>');" data-toggle= "modal" data-target= "#modificarser" class="material-control" required="" maxlength="50"  btnm-data-title="Ver Detalles">
                                    <i class="zmdi zmdi-eye" style="color: #31920D;">
                                    </i>
                                </a>
                            </td>
                            <td>
                                $<?php echo $fila->total?>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div><div style="margin: 6.5% 0;"></div>
</div>
<div class="modal fade" id="modificarser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h5 class="modal-title">Servicios</h5></center>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                </div>
                <div class="modal-body" id="datos">
                    <div class="div-table">
                        <table id="miTabla2" class="display responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Servicio</th>
                                    <th>Precio Unitario</th>
                                    <th>Realizador del servicio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>""</td>
                                    <td>""</td>
                                    <td>""</td>
                                    <td>""</td>
                                </tr>
                            </tbody>
                        </table>
                    </div><div style="margin: 6.5% 0;"></div>
                </div>
                <div class="modal-footer">
                    <center>
                        <button type="button" class="btn btn-return" data-dismiss="modal"><i class="zmdi zmdi-mail-reply"></i> &nbsp;&nbsp; Volver</button>
                    </center>
                </div>
            </div>
        </div>
    </div>

</body>
<footer class="footer full-reset col-sm-12">
    <div class="footer-copyright full-reset all-tittles"><center>Universidad de EL Salvador-FMP 2019</center></div>
</footer>
</html>