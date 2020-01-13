<?php session_start();
  if($_SESSION["logeado"] == false) {
header("location:login.php");
  }
  ?>
<!DOCTYPE html>
<html lang="es">
<head>
   <title>Inventario de Servicios</title>
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

function Modificar(){
      var nombre=document.getElementById('nombres').value;
      var precio=document.getElementById('precios').value;
            
            if(nombre==""){
             alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACÍO</strong>: Nombre no puede ir vacío', 'success', 5, function(){});
           }
           if(precio==""){
             alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACÍO</strong>: Precio no puede ir vacío', 'success', 5, function(){});
           }
          
       
           if(!nombre=="" && !precio==""){
             var datos=$("#frmumodificar").serialize();
             Swal.fire({
                    title: "<div>Motivo por el cual desea hacer una modificacion a l servicio<span style='color: #182d7d;'>"+nombre+"</span></div>",
                    input: "text",
                    showCancelButton: true,
                    confirmButtonText: "Guardar",
                    cancelButtonText: "Cancelar",
                }).then(resultado => {
                    if (resultado.value) {
                        let mot = resultado.value;
                        $.ajax({
              type:"POST",
              url:"../metodosAjax/inventarioser.php",
              data:{nombres:nombre,precios:precio,motivo:mot,idprov:document.getElementById('idprov').value},
              success:function(resp){
               document.getElementById('miTabla').innerHTML=resp;
               mostrarMensaje('Se Modificó','success',null,"El registro a sido modificado satisfactoriamente ",true);
             }
           });
                    }else {
                        Modificar();
                    }
                    });

           }
         }


        function editar(id){
                  $.ajax({
                    type:"POST",
                    url:"../metodosAjax/inventarioser.php",
                    data:{val:id},
                    success:function(resp){
                         document.getElementById('datos').innerHTML=resp;
                    }
                   });
        }

              function eliminar(id){

                  swal.fire({
                    title: 'Esta seguro?',
                    text: "Desea eliminar este registro",
                    type: 'warning',
                    showCancelButton: true ,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!',
                }).then((result)=>{
                    if(result.value){
                      Swal.fire({
                    title: "<div>Motivo por el cual desea eliminar al servicio </div>",
                    input: "text",
                    showCancelButton: true,
                    confirmButtonText: "Guardar",
                    cancelButtonText: "Cancelar",
                }).then(resultado => {
                    if (resultado.value) {
                        let mot = resultado.value;
                        $.ajax({
                    type:"POST",
                    url:"../metodosAjax/inventarioser.php",
                    data:{valor:id,motivo:mot},
                    success:function(resp){
                         document.getElementById('miTabla').innerHTML=resp;
                         mostrarMensaje('Se Elimino','success',null,"El registro fue eliminado satisfactoriamente",true);
                    }
                   });
                    }else {
                        Modificar();
                    }
                    });
                    }
                })
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
              <h1 class="all-tittles">animal pet's <small>Servicios</small></h1>
            </div>
        </div>
        <div class="container-fluid">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
              <li role="presentation" ><a href="servicios.php">Gestionar Servicios</a></li>
              <li role="presentation" class="active"><a href="inventarioser.php">Inventario</a></li>
            </ul>
        </div>
        <div class="container-fluid"  style="margin: 20px 0;">
        </div>
        <div class="container-fluid">
             <div class="row">

                    <!--ListaServicios-->
                    <div class="container-fluid">
                <div class="div-table">
                    <table id="miTabla" class="display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                               <th>Nombre Servicio</th>
                              <th>Precio</th>
                              
                              <th>Acciones</th>
                            </tr>
                       </thead>

                          <tbody>
                            <?php
                            include "../config/conexion.php";
                            $result=$conexion->query("SELECT s.nombre as servicio, s.precio as precio, s.id_servicio as id FROM servicios s");
                            if($result){
                                while($fila = $result->fetch_object()){ ?>
                                <tr>
                                <td><?php echo $fila->servicio?></td>
                                <td><?php echo $fila->precio?></td>
                                <td>
                                    <a href="#" data-toggle= "modal" data-target= "#modificarServicio" class="material-control tooltips-general" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Editar" onclick="editar(<?php echo $fila->id?>)">
                                        <i class="zmdi zmdi-edit" style="color: #31920D;">
                                        </i>
                                    </a>
                                    &nbsp;&nbsp;
                                    <a href="#" class="material-control tooltips-general" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="eliminar(<?php echo $fila->id?>)">
                                        <i class="zmdi zmdi-delete" style="color: #F91D0B;"></i>
                                    </a>
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
            </div>
        </div>

         <!--Modal para Servicios-->
            <div class="modal fade" id="modificarServicio">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center>
                                <h5 class="modal-title"> Modificar Servicio</h5></center>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> &times; </span>
                            </button>
                        </div>
                        <div class="modal-body" id="datos">
                         <div class="container-fluid" style="margin: 20px 0;"></div> 
                         <form id="frmumodificar" name="frmumodificar" method="post" action="">
                <div class="col-xs-4 col-sm-5 col-sm-offset-1">
                 <div class="group-material">
                 <input id="nombres" name="nombres" type="text" class="material-control tooltips-general" placeholder="" required="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Contraseña">
                   <label style="margin-left: 0%;">Nombre</label>       

                 </div> 
                 </div>
                <div class="col-xs-4 col-sm-5 col-sm-offset-1">
                <div class="group-material">
                 <input id="precios" name="precios" type="text" class="material-control tooltips-general" placeholder="Precio" required="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Solo numero">
                 <label>Precio</label>      
               </div>
             </div>
<div class="container-fluid">
         </div>
<hr style="color: #0056b2;">

  </form>
</div> <!--Fin Modal Body-->

<div class="modal-footer">
  <center>
   <button type="button" class="btn btn-success" data-dismiss="modal" style="margin-right: 20px;" onclick="Modificar()">
    <i class="zmdi zmdi-edit" style="color: #fff;">
    </i>&nbsp;&nbsp;Modificar</button>
    <a  data-dismiss="modal" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-refresh-alt"></i> Cancelar</a>
  </center>
</div>


</div>
</div>

</div>
     <footer class="footer full-reset">
  <div class="footer-copyright full-reset all-tittles"><center>Universidad de EL Salvador-FMP 2019</center></div>
</footer>
</body>
</html>