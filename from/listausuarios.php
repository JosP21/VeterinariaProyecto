<?php session_start();
  if($_SESSION["logeado"] == false) {
header("location:login.php");
  }
  ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <title>Lista de Usuarios</title>
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
      var nombre=document.getElementById('nombrem').value;
      var apellido=document.getElementById('apellidom').value;
            //var sexo=document.getElementById('correom').value;
            var telefono=document.getElementById('telefonoUm').value;
            var direccion=document.getElementById('direccionm').value;
            var Email=document.getElementById('emailm').value;
            var rol=document.getElementById('rolm').value;

            if(nombre==""){
             alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACÍO</strong>: Nombre no puede ir vacío', 'success', 5, function(){});
           }
           if(apellido==""){
             alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACÍO</strong>: Apellidos no puede ir vacío', 'success', 5, function(){});
           }
           if(telefono==""){
             alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACÍO</strong>: telefono no puede ir vacío', 'success', 5, function(){});
           }
           if(direccion==""){
             alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACÍO</strong>: Dirección no puede ir vacío', 'success', 5, function(){});
           }
           if(validar_email(Email)==false ){
             alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACÍO</strong>: correo no puede ir vacío', 'success', 5, function(){})
           }
           if(rol==""){
             alertify.error('<strong style="font-size: 14px;font-weight: bold;">CAMPO VACÍO</strong>: Rol no puede ir vacío', 'success', 5, function(){});
           }
           if(!nombre=="" && !apellido=="" && !telefono=="" && (!Email=="" && validar_email(Email)) && !direccion=="" && !rol==""){
             var datos=$("#frmumodificar").serialize();
             $.ajax({
              type:"POST",
              url:"../metodosAjax/save-usuarios.php",
              data:datos,
              success:function(resp){
               document.getElementById('miTabla').innerHTML=resp;
               mostrarMensaje('Se Modificó','success',null,"El registro a sido modificado satisfactoriamente ",true);
             }
           });

           }
         }

         function editar(id){
          $.ajax({
            type:"POST",
            url:"../metodosAjax/save-usuarios.php",
            data:{val:id},
            success:function(resp){
             document.getElementById('datos').innerHTML=resp;
           }
         });
        }

        function eliminar(id){
          $.ajax({
            type:"POST",
            url:"../metodosAjax/save-usuarios.php",
            data:{valor:id},
            success:function(resp){
             document.getElementById('miTabla').innerHTML=resp;
             mostrarMensaje('Eliminado','success',null,"El registro eliminado satisfactoriamente ",true);
           }
         });
        }
        function validar_email(c) 
        {
          var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          return regex.test(c) ? true : false;
        }
      </script>
    </head>

    <body>
      <?php
      include "../from/menu.php"
      ?>
      <div class="content-page-container full-reset custom-scroll-containers">
        <div style="margin: 6.5% 0;"></div>
        <div class="container">
          <div class="page-header">
            <h1 class="all-tittles">animal pet's <small>Administracion</small></h1>
          </div>
        </div>
        <div class="container-fluid">
          <ul class="nav nav-tabs nav-justified" style="font-size: 17px;">
            <li role="presentation" class="active"><a href="usuario.php">Usuarios</a></li>
            <li role="presentation" ><a href="proveedor.php">Proveedores</a></li>
            <li role="presentation"><a href="#">Informacion Clinica</a></li>
          </ul>
        </div>
        <div class="container-fluid"  style="margin: 20px 0;"></div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-xs-12 lead">
              <ol class="breadcrumb">
                <li><a href="usuario.php">Nuevo</a></li>
                <li class="active">Listado</li>
              </ol>
            </div>
          </div>
        </div>
        <div class="container-fluid"  >
         <div class="col-sm-11 col-xs-11 col-sm-offset-1">

          <div class="div-table">
            <table id="miTabla" class="display responsive nowrap" style="width:100%; table-layout:fixed">
              <thead>
                <tr>
                  <th>DUI</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Dirección</th>
                  <th>Teléfono</th>
                  <th>Correo</th>
                  <th>Nombre de usuario</th>
                  <th>Rol</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "../config/conexion.php";
                $result=$conexion->query("SELECT
                  e.id_Empleado as id,
                  e.DUI as dui,
                  e.nombres as nombre,
                  e.apellidos as apellido,
                  e.direccion as direccion,
                  e.telefono as telefono,
                  e.contrasena as contra,
                  e.rol as rol,
                  e.nombre_usuario as user,
                  e.correoElectronico as correo
                  FROM
                  empleados e");
                if($result){
                  while($fila = $result->fetch_object()){ ?> <!--Recortar texto y al pasar mouse se muestre la dir-->
                  <tr>
                    <td><?php echo $fila->dui ?></td>
                    <td><?php echo $fila->nombre ?></td>
                    <td><?php echo $fila->apellido ?></td>
                    <td title="<?php echo $fila->direccion ?>"><?php echo substr($fila->direccion, 0, 12); ?></td>
                    <td><?php echo $fila->telefono ?></td>
                    <td><?php echo $fila->correo ?></td>
                    <td><?php echo $fila->user ?></td>
                    <td><?php echo $fila->rol ?></td>
                    <td>
                      <button data-toggle= "modal" data-target= "#modificarUsuario" class="material-control tooltips-general" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Editar" onclick="editar(<?php echo $fila->id?>)">
                        <i class="zmdi zmdi-edit" style="color: #31920D;">
                        </i>
                      </button>
                      &nbsp;&nbsp;
                      <a href="#" class="material-control tooltips-general" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="eliminar(<?php echo $fila->id?>)">
                        <i class="zmdi zmdi-delete" style="color: #F91D0B;"></i>
                      </a>
                      &nbsp;&nbsp;
                    </td>
                  </tr>
                  <?php
                }
              }
              ?>
            </tbody>
          </table>
        </div></div><div style="margin: 6.5% 0;"></div>
      </div>

      <div class="modal fade" id="modificarUsuario">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <center>
                <h5 class="modal-title"> Modificar Usuario</h5></center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true"> × </span>
               </button>
             </div>
             <div class="modal-body" id="datos">
              <div class="container-fluid" style="margin: 20px 0;"></div>
              <form id="frmumodificar" name="frmumodificar" method="post" action="">
                <div class="col-xs-4 col-sm-5 col-sm-offset-1">
                  <div class="group-material">
                   <input id="nombrem" name="nombrem" type="text" class="material-control tooltips-general" placeholder="" required="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Contraseña">
                   <label style="margin-left: 0%;">Nombre</label>       

                 </div>
               </div>
               <div class="col-xs-4 col-sm-5 col-sm-offset-1">
                <div class="group-material">
                 <input id="apellidom" name="apellidom" type="text" class="material-control tooltips-general" placeholder="Vendedor..." required="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Solo letras">
                 <label>Apellido</label>      
               </div>
             </div>

             <div class="col-xs-4 col-sm-5 col-sm-offset-1" style="margin-top: -3%;">
              <fieldset>
                <legend>Sexo</legend>
                <div>
                  <center>
                    <div class="contenedorad">
                      <div class="radio" readonly="readonly">
                        <input type="radio" name="sexom" id="hombre" value="Hombre" disabled>
                        <label for="hombre">Hombre</label>
                        <input type="radio" name="sexom" id="femenino" value="Femenino" disabled>
                        <label for="sexo">Femenino</label>
                      </div>
                    </div>
                  </center>
                </div>
              </fieldset>
            </div>

            <div class="col-xs-4 col-sm-5 col-sm-offset-1">

              <div class="group-material">
               <input id="telefonoUm" name="telefonoUm" type="text" class="material-control tooltips-general" placeholder="####-####" required="" data-toggle="tooltip"  maxlength="9" data-placement="top" title="Número celular valido" autocomplete="username">
               <label>Teléfono</label>
             </div>
           </div>

           <div class="row">
            <div class="col-xs-8 col-sm-8 col-sm-offset-0" style="right: -45px;">
              <div style="margin-left: 6%;margin-top: -2%;"><label style="color: #53a5b4;font-weight: bold;">Dirección</label></div>

              <div style="margin-left: 6%;">
                <div class="group-material" style="margin-bottom: 2%;margin-right: 5%;">
                  <textarea id="direccionm" name="direccionm" type="text" class="material-control tooltips-general" required="" data-toggle="tooltip" data-placement="top" title="" style="width: 100%; height: 1%;"></textarea>
                </div>
              </div>
            </div>
            <div class="col-xs-4 col-sm-3 col-sm-offset-8" style="top: -60px">
              <div class="group-material">
               <input id="emailm" name="emailm" type="Email" class="material-control tooltips-general" placeholder="ejemplo@correo.com" required="true" data-toggle="tooltip" data-placement="top" title="">
               <label>Email</label>
             </div> 
           </div>
         </div>

         <div class="container-fluid">
         </div>
         <hr style="color: #0056b2;">
         <div class="col-xs-4 col-sm-5 col-sm-offset-1">
          <div class="group-material">
           <input id="contrasenam" name="contrasenam" type="password" autocomplete="current-password" class="material-control tooltips-general" placeholder="Ingrese Contraseña" required="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Contraseña">
           <label style="margin-left: 0%;">Contraseña</label>       

         </div>
       </div>
       <div class="col-xs-4 col-sm-5 col-sm-offset-1">
        <div class="group-material">
         <SELECT id='rolm' NAME='rolm' class='material-control tooltips-general'> 
          <OPTION VALUE='' disabled >Seleccione...</OPTION>
          <OPTION VALUE='Administrador'>Administrador</OPTION>
          <OPTION VALUE='Secretaria'>Secretaria</OPTION>
          <OPTION VALUE='Vendedor'>Vendedor</OPTION> 
        </SELECT>
        <label>Rol</label>      
      </div>
    </div>

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