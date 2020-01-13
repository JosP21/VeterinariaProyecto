<?php session_start();
  if($_SESSION["logeado"] == false) {
header("location:login.php");
  }
  ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inventario</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="../assets/img/icon-clinica.jpg" />
    <link rel="stylesheet" href="../assets/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../assets/css/normalize.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/datatable/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../assets/datatable/css/responsive.dataTables.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="../assets/js/jquery-1.11.2.min.js"><\/script>')
    </script>
    <script src="../assets/js/alertify.min.js"></script>
    <script src="../assets/js/controlador.js"></script>
    <script src="../assets/js/sweetalert2.min.js"></script>
    <script src="../assets/js/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="../assets/css/sweet-alert.css">
    <link rel="stylesheet" href="../assets/css/sweetalert2.min.css">
    <script src="../assets/js/modernizr.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script type="text/javascript" src="../assets/datatable/js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../assets/datatable/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../assets/datatable/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="../assets/datatable/datatable.js"></script>
    <script type="text/javascript">
        var tinventario="<thead><tr><th>Nombre Producto</th><th>Existencia</th><th>Fecha Vencimiento</th> <th>Precio de Compra</th><th>Precio de Venta</th><th>Acción</th> </tr></thead><tbody></tbody>";
        function editar(id){
                  $.ajax({
                    type:"POST",
                    url:"../metodosAjax/inventario.php",
                    data:{val:id},
                    success:function(resp){
                         document.getElementById('datos').innerHTML=resp;
                    }
                   });
        }
        function eliminar(id){
                  swal({
                    title: 'Confirmar',
                    text: "¿Que es lo que quiere hacer?",
                    type: 'warning',
                    showCancelButton: true ,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Eliminar Producto',
                    confirmButtonText: 'Devolver Producto',
                }).then((result)=>{
                    if(result.value){
                        $.ajax({
                            type:"POST",
                            url:"../metodosAjax/inventario.php",
                            data:{valorDev:id},
                            success:function(resp){
                                document.getElementById('miTabla').innerHTML=resp;
                                //$("#miTabla").html(resp);
                                mostrarMensaje('Se Elimino','success',null,"Eliminado de inventario por motivo de devolucion",true);
                            }
                        });
                    }else{
                        $.ajax({
                            type:"POST",
                            url:"../metodosAjax/inventario.php",
                            data:{valorElim:id},
                            success:function(resp){
                                if(resp=="existe"){
                                    mostrarMensaje('Aviso','info',null,"No se puede eliminar este producto por motivo de que su existencia es mayor que 0",true);
                                }else{
                                    document.getElementById('miTabla').innerHTML=resp;
                                mostrarMensaje('Se Elimino','success',null,"Producto eliminado satisfactoriamente",true);
                                }
                            }
                        });
                    }
                })
        }
        function modifcarProd(){
            $.ajax({
                            type:"POST",
                            url:"../metodosAjax/inventario.php",
                            data:{idprod:document.getElementById("idpro").value,stock:document.getElementById("stockminimo").value,producto:document.getElementById("nombreproducto").value},
                            success:function(resp){
                                document.getElementById('miTabla').innerHTML=resp;
                                mostrarMensaje('Se Modifico','success',null,"El registro a sido modificado satisfactoriamente ",true);
                            }
                        });
        }
        function general(){
            var inventario="General";
            $.ajax({
                            type:"POST",
                            url:"../metodosAjax/inventario.php",
                            data:{inv:inventario},
                            success:function(resp){
                                document.getElementById('miTabla').innerHTML=resp;
                                $("#filtrado").hide();
                            }
                        });
        }
        function proveedor(){
            var inventario="Proveedor";
            $.ajax({
                            type:"POST",
                            url:"../metodosAjax/inventario.php",
                            data:{invp:inventario},
                            success:function(resp){
                                document.getElementById('filtrado').innerHTML=resp;
                                document.getElementById('miTabla').innerHTML=tinventario;
                                $("#filtrado").show();
                            }
                        });
        }
        function fechas(){
            var inventario="Fechas";
            $.ajax({
                            type:"POST",
                            url:"../metodosAjax/inventario.php",
                            data:{invf:inventario},
                            success:function(resp){
                                document.getElementById('filtrado').innerHTML=resp;
                                document.getElementById('miTabla').innerHTML=tinventario;
                                $("#filtrado").show();
                            }
                        });
        }

        function categoria(){
            var inventario="Categoria";
            $.ajax({
                            type:"POST",
                            url:"../metodosAjax/inventario.php",
                            data:{invc:inventario},
                            success:function(resp){
                                document.getElementById('filtrado').innerHTML=resp;
                                document.getElementById('miTabla').innerHTML=tinventario;
                                $("#filtrado").show();
                            }
                        });

        }
        function marca(){
            var inventario="Marca";
            $.ajax({
                            type:"POST",
                            url:"../metodosAjax/inventario.php",
                            data:{invm:inventario},
                            success:function(resp){
                                document.getElementById('filtrado').innerHTML=resp;
                                document.getElementById('miTabla').innerHTML=tinventario;
                                $("#filtrado").show();
                            }
                        });
        }
        function inicio(){
            $("#filtrado").hide();
        }
    </script>

</head>





<body onload="mensaje();inicio();">
    <?php
    include "../from/menu.php"
    ?>
<div class="content-page-container full-reset custom-scroll-containers">
    <div style="margin: 40px 0;"></div>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">animal pet's <small>Compras</small></h1>
            </div>
        </div>
        <div class="container-fluid">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
              <li role="presentation" ><a href="productos.php">Gestionar Producto</a></li>
              <li role="presentation" class="active"><a href="inventario.php">Inventario</a></li>
            </ul>
        </div>
        <div class="container-fluid"  style="margin: 20px 0;">
        </div>
        <div class="container-fluid">
            <div class="container-fluid"  style="margin: 20px 0;"></div>
                <form id="frmaccion" name="frmaccion" method="post" action="">
                <div style="margin-top: -2%;justify-content: center;" class="col-sm-8 col-sm-offset-2">
                <fieldset>
                  <legend>VER INVENTARIO POR:</legend>
                  <div>
                    <center>
                      <div class="contenedorad">
                        <div class="radio">
                         <input type="radio" name="accion" id="general" value="General">
                         <label for="general" onclick="general()">General</label>
                         <input type="radio" name="accion" id="proveedor" value="Proveedor">
                         <label for="proveedor" onclick="proveedor()">Proveedor</label>
                         <input type="radio" name="accion" id="fechas" value="Fechas">
                         <label for="fechas" onclick="fechas()">Fechas</label>
                         <input type="radio" name="accion" id="categoria" value="Categoria">
                         <label for="categoria" onclick="categoria()">Categoria</label>
                         <input type="radio" name="accion" id="marca" value="Marca">
                         <label for="marca" onclick="marca()">Marca</label>
                       </div>
                     </div>
                   </center>
                 </div>
               </fieldset>
               <div id="filtrado">
           </div>
             </div> 
                </form>
                <div class="container-fluid"  style="margin: 20px 0;">
        </div>
             <div class="row" id="inventario">
                    <!--ListaProductos-->
                    <div class="container-fluid">
                <div class="div-table">
                    <table id="miTabla" class="display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                              <th>Nombre Producto</th>
                              <th>Existencia</th>
                              <th>Fecha Vencimiento</th>
                              <th>Precio de Compra</th>
                              <th>Precio de Venta</th>
                              
                              <th>Acción</th>
                            </tr>
                          </thead>
                          <tbody></tbody>
                    </table>
                </div><div style="margin: 6.5% 0;"></div>
            </div>



            </div>
        </div>

         <!--Modal para Productos-->
            <div class="modal fade" id="modificarProducto">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center>
                                <h5 class="modal-title"> Modificar Producto</h5></center>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> &times; </span>
                            </button>
                        </div>
                        <div class="modal-body" id="datos">
                            
                        </div>
                        <div class="modal-footer">
                            <center>
                                <button type="submit" class="btn btn-success" data-dismiss="modal" onclick="modifcarProd()"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Modoficar</button>
                                <button type="button" data-dismiss="modal" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-refresh-alt"></i> Cancelar</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        
        <footer class="footer full-reset">
            <div class="footer-copyright full-reset all-tittles"><center>Universidad de EL Salvador-FMP 2019</center></div>
        </footer>
    </div>
    <script type="text/javascript">
        function prove()
            {
            $("input[name=proveedor]").change(function() {
                var value=$("input[name=proveedor]").val();
                inventarioP(value);
                return 0;
                });
            }
            function cat()
            {
            $("input[name=categoria]").change(function() {
                var value=$("input[name=categoria]").val();
                inventarioC(value);
                return 0;
                });
            }
            function mar()
            {
            $("input[name=marca]").change(function() {
                var value=$("input[name=marca]").val();
                inventarioM(value);
                return 0;
                });
            }
     function inventarioP(proveedor){
             $.ajax({
                    type:"POST",
                    url:"../metodosAjax/inventario.php",
                    data:{inventarioproveedor:proveedor},
                    success:function(resp){
                        document.getElementById('miTabla').innerHTML=resp;
                    }
                   });
        }
        function inventarioM(m){
             $.ajax({
                    type:"POST",
                    url:"../metodosAjax/inventario.php",
                    data:{inventarioMarca:m},
                    success:function(resp){
                        document.getElementById('miTabla').innerHTML=resp;
                    }
                   });
        }
        function inventarioC(c){
             $.ajax({
                    type:"POST",
                    url:"../metodosAjax/inventario.php",
                    data:{inventarioCategoria:c},
                    success:function(resp){
                        document.getElementById('miTabla').innerHTML=resp;
                    }
                   });
        }
        function invDesde(){
    $.ajax({
        type:"POST",
        url:"../metodosAjax/inventario.php",
        data:{fdesde:document.getElementById("desde").value,fhasta:document.getElementById("hasta").value},
        success:function(resp){
            //alert(resp);
                document.getElementById('miTabla').innerHTML=resp;
        }
    });
}
function invHasta(){
    $.ajax({
        type:"POST",
        url:"../metodosAjax/inventario.php",
        data:{fdesde:document.getElementById("desde").value,fhasta:document.getElementById("hasta").value},
        success:function(resp){
            //alert(resp);
                document.getElementById('miTabla').innerHTML=resp;
        }
    });
}
    </script>
</body>
</html>