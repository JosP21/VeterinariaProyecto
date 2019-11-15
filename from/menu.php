<?php
if($_SESSION["logeado"] == false){
header("location:login.php");
}
$rol=0; 
$nombres="";
if($_SESSION["nombres"] != null){
    $nombres=$_SESSION["nombres"];
}
if($_SESSION["rol"] != null){
    $rol=$_SESSION["rol"];
}
if($_SESSION["foto"] != null){
    $foto=$_SESSION["foto"];
}
?>

<!--validando pedacito de margen de ganancia-->
<div>
    <nav class="navbar-user-top full-reset">
        <ul id="button">

            <?php if($rol=="Administrador"){?>
            <li><a href="#" data-toggle="modal" data-target= "#ganancia"><i class="zmdi zmdi-settings zmdi-hc-fw"></i></a></li>
        <?php } if($rol=="Administrador" || $rol=="Secretaria" || $rol=="Vendedor"){ ?>
            <li><a href="login.php?salir=true"><i class="zmdi zmdi-power zmdi-hc-fw"></i>Salir</a></li>
            <li><a href="acercaDe.php"><i class="zmdi zmdi-info zmdi-hc-fw"></i>Acerca de</a></li>
            <li><a href="#" onclick="abrirVentana();"><i class="zmdi zmdi-help zmdi-hc-fw"></i>Ayuda</a></li>
            <li style="color:#fff; cursor:default;"><span class="all-tittles">
                <?php
                echo $nombres
                ?>
                
            </span></li>
                <li style="width: 3%;margin-top: 0.2%;">
                   <img src="../serverImages/users/<?php
                echo $foto
                ?>" alt="user-picture" class="img-responsive center-box">
                </li>
                <li style="position: fixed;/*! top: -55px; *//*! right: 10px; */left: -1%;width: 50%;">
                    <img src="../assets/img/nombrecli.png" alt="user-picture" class="img-nombre" style="width: 45%;">
                </li><?php } ?>
 </ul>
</nav>
</div>
<div class="navbar-lateral full-reset">
        <div class="visible-xs font-movile-menu mobile-menu-button"></div>
        <div class="full-reset container-menu-movile custom-scroll-containers">
            <div class="full-reset" style="padding: 10px 0; color:#fff;">
                <div style="margin: 20px 0;"></div>
                <figure>
                    <img src="../assets/img/logo1.png" class="img-responsive center-box" style="width:100%;">
                </figure>
            </div>
            <div class="full-reset nav-lateral-list-menu">
                <nav id="menu">
        <ul class="list-unstyled components">
            <?php if($rol=="Administrador"){?>
            <li><a href="inicio.php"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp; Inicio</a>
            </li>
            <?php } if($rol=="Administrador" || $rol=="Secretaria" ){ ?>
            <li><a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="zmdi zmdi-case zmdi-hc-fw"></i>&nbsp;&nbsp; Administración <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                     <?php if($rol=="Administrador"){?> 
                    <li><a href="usuario.php"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i>&nbsp;&nbsp; Usuarios</a>
                    </li><?php } ?>
                    <li>
                        <a href="proveedor.php"><i class="zmdi zmdi-car zmdi-hc-fw"></i>&nbsp;&nbsp; Proveedores</a>
                    </li>
                    <?php if($rol=="Administrador"){?> 
                    <li><a href="datosclinica.php"><i class="zmdi zmdi-store zmdi-hc-fw"></i>&nbsp;&nbsp; Datos Clinica</a>
                    </li><?php } ?>
                </ul> 
            </li><?php } ?>
             <?php if($rol=="Administrador" || $rol=="Secretaria"){ ?>
            <li><a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i>&nbsp;&nbsp; Compras <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></a>
                <ul class="collapse list-unstyled" id="pageSubmenu1">
                    <li>
                        <a href="productos.php"><i class="zmdi zmdi-assignment-o zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo Producto</a>
                    </li>
                    <li>
                        <a href="inventario.php"><i class="zmdi zmdi-view-list-alt zmdi-hc-fw"></i>&nbsp;&nbsp; Inventario</a>
                    </li>
                </ul> 
            </li><?php } ?>
            <li><a href="ventas.php"><i class="zmdi zmdi-calendar-check zmdi-hc-fw"></i>&nbsp;&nbsp; Ventas</a>
            </li>
            <?php if($rol=="Administrador" || $rol=="Secretaria"){ ?>
            <li><a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="zmdi zmdi-shopping-cart-plus zmdi-hc-fw"></i>&nbsp;&nbsp; Atencion Medica<i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></a>
                <ul class="collapse list-unstyled" id="pageSubmenu2">
                    <li>
                        <a href="citas.php"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i>&nbsp;&nbsp; Citas</a>
                    </li>
                     <?php if($rol=="Administrador"){?> 
                    <li> <a href="cirugia.php"><i class="zmdi zmdi-hospital zmdi-hc-fw"></i>&nbsp;&nbsp; Cirugias</a>
                    </li><?php } ?>
                </ul> 
            </li><?php } ?>
            <?php if($rol=="Administrador" || $rol=="Secretaria"){ ?>
            <li><a href="expediente.php"><i class="zmdi zmdi-folder-person zmdi-hc-fw"></i>&nbsp;&nbsp; Expediente</a></li><?php } ?>
            <li>
                <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="zmdi zmdi-label zmdi-hc-fw"></i>&nbsp;&nbsp; Servicios<i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></a>
                <ul class="collapse list-unstyled" id="pageSubmenu3">
                    <li>
                        <a href="servicios.php"><i class="zmdi zmdi-assignment zmdi-hc-fw"></i>&nbsp;&nbsp; Registrar</a>
                    </li>
                    <li>
                        <a href="inventarioser.php"><i class="zmdi zmdi-view-list-alt zmdi-hc-fw"></i>&nbsp;&nbsp; Inventario Servicios</a>
                    </li>
                </ul> 
            </li>
            <?php if($rol=="Administrador"){?> 
            <li><a href="reportes.php"><i class="zmdi zmdi-file-text zmdi-hc-fw"></i>&nbsp;&nbsp; Reportes</a></li><?php } ?>
            <?php if($rol=="Administrador"){?> 
            <li><a href="mantenimiento.php"><i class="zmdi zmdi-shield-check zmdi-hc-fw"></i>&nbsp;&nbsp; Mantenimiento</a></li><?php } ?>
        </ul>
    </nav>
            </div>
        </div>
    </div>
<div class="modal fade" id="ganancia" style="overflow-y: scroll;">
        <div class="modal-dialog" style="width: 22%;margin-top: 10%;margin-left: 50%;">
          <div class="modal-content">
            <div class="modal-header">
              <center>
                <h5 class="modal-title"> Margen de Ganancia</h5></center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"> &times; </span>
              </button>
          </div>
          <div class="modal-body" id="datosModal">
            <div class="container-fluid" style="margin: 2px 0; left: 60px;"></div>
            <form id="frmmodificar" name="frmmodificar" method="post" action="">
              <div class="row">
                <div style="margin-left: 25%;margin-top: 10%;" class="col-sm-6 col-sm-offset-1">
                  <div class="group-material" style="margin-right: 15%;">
                    <input type="number" name="nombreexp" id="nombreexp" class="material-control tooltips-general" min="1"  required="" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="">
                    <label>Ganancia (%)</label>
                </div></div></div>
            </form>
        </div> <!--Fin Modal Body-->

        <div class="modal-footer">
            <div class="col-sm-8" style="margin-left: 5%; margin-top: -45px">
              <button type="button" class="btn btn-success" data-dismiss="modal" onclick="guardar()">
                <i class="zmdi zmdi-edit" style="color: #fff;">
                </i>&nbsp;&nbsp;Modificar</button>
            </div>
        </div>


    </div>
</div>

</div>

<script type="text/javascript">
   function guardar(){
        var form = document.querySelector("#frmmodificar");
    var datos = new FormData(form);
    var obj = {
      type:"POST",
      contentType: false, 
      processData: false, 
      data:datos,
      url:"../metodosAjax/save-margeng.php",       
      success:function(resp){
        console.log(resp);
        document.getElementById("frmmodificar").reset();
        mostrarMensaje('Guardado','success',3500,"Porcentaje de ganancia guardado exitosamente",true);
      }
    };
    $.ajax(obj);
   }
</script>