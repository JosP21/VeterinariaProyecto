<?php
include"../config/conexion.php";
if(!empty($_POST['val'])){
      $id=$_POST['val'];
      $result=$conexion->query("SELECT
proveedores.id_proveedor as idprov,proveedores.nombre as nombrepro,sum(detproductos.cantidCompra) as existencia,factcompra.id_factura as factura,factcompra.fecha as fechaCom,detproductos.id_detProd as iddeta,
detproductos.precCompra as precioC,detproductos.precVenta as precioV,detproductos.fechaCaduc as fechacad,detproductos.cantidCompra as cantidad,productos.id_producto as idprod,
productos.nombre as nombreprod,productos.stockMin as stock,categoria.nombre as categoria,unidmedida.descripcion as unidad
FROM
proveedores
INNER JOIN factcompra ON factcompra.id_proveedor = proveedores.id_proveedor
INNER JOIN detproductos ON detproductos.id_facturaComp = factcompra.id_factura
INNER JOIN productos ON detproductos.id_producto = productos.id_producto
INNER JOIN categoria ON productos.id_categoria = categoria.id_categoria
INNER JOIN unidmedida ON productos.id_UnidMed = unidmedida.id_unidMed
where productos.id_producto='".$id."'
GROUP BY productos.nombre");
         if($result){
          if($fila = $result->fetch_object()){?>
            <div class="container-fluid">
    <div class="col-xs-12 col-sm-offset-0">
        <div class="title-flat-form title-flat-blue">Modificar</div>
        <form id="frmmodificarP" name="frmmodificarP" method="post" action="">
          <input type='hidden' name='idpro' id='idpro' value='<?php echo $fila->idprod?>'>
            <div class="col-xs-4 col-sm-5 col-sm-offset-1">
                <div class="group-material">
                    <div style="width: 100%;float:left;">
                        <input type="text" name="proveedor" id="proveedor" class="material-control tooltips-general" placeholder="Proveedor..." required="" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);" value='<?php echo $fila->nombrepro?>' style="pointer-events: none;">
                        <label>Nombre del Proveedor</label>
                    </div>
                </div>

            </div>
            <div class="col-xs-4 col-sm-3 col-sm-offset-1">
                <div class="group-material">
                    <input id="fechaCompra" name="fechaCompra" type="datetime" class="material-control tooltips-general" value='<?php echo $fila->fechaCom?>'  data-toggle="tooltip" data-placement="top" title="Solo numero" style="pointer-events: none;">

                    <label>Fecha de Compra</label>
                </div>

            </div>
            <div class="col-xs-4 col-sm-3 col-sm-offset-1">
                <div class="group-material">
                    <input id="nombreproducto" name="nombreproducto" type="text" class="material-control tooltips-general" value='<?php echo $fila->nombreprod?>' required="" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);">

                    <label>Nombre </label>
                </div>

            </div>
            <div class="col-xs-4 col-sm-3 col-sm-offset-0">
                <div class="group-material">
                    <input type="text" name="nombrecatre" id="nombrecatre" value='<?php echo $fila->categoria?>' class="material-control tooltips-general"  required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="Solo letras" onkeypress="return sololetras(event);" style="pointer-events: none;">
                    <label>Categoría</label>
                </div>
            </div>

            <div class="col-xs-4 col-sm-3 col-sm-offset-0">
                <div class="group-material">
                    <input id="cantidad" name="cantidad"  value='<?php echo $fila->existencia?>' type="text" class="material-control tooltips-general"  data-toggle="tooltip" data-placement="top" title="Solo numero" onkeypress="return solonumero(event);" style="/*pointer-events: none;*/">

                    <label>Existencia</label>
                </div>

            </div>
            <div class="col-xs-4 col-sm-3 col-sm-offset-0">
                <div class="group-material">
                    <input type="text" name="" id="unidadmedida" class="material-control tooltips-general" value='<?php echo $fila->unidad?>' data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="Solo letras" style="pointer-events: none;" onkeypress="return sololetras(event);">
                    <label>Unidad de Medida</label>
                </div>
            </div>

            <div class="col-xs-4 col-sm-3 col-sm-offset-1">
                <div class="group-material">
                    <input id="fechaCad" name="fechaCad" type="date" class="material-control tooltips-general" value='<?php echo $fila->fechacad?>' data-toggle="tooltip" data-placement="top" title="Solo numero" style="pointer-events: none;">

                    <label>Fecha de Caducidad </label>
                </div>

            </div>

            <div class="col-xs-4 col-sm-3 col-sm-offset-0">
                <div class="group-material">
                    <input id="preciocompra" name="preciocompra" type="text" class="material-control tooltips-general" value='<?php echo $fila->precioC?>' data-toggle="tooltip" data-placement="top" title="Solo numero" style="pointer-events: none;" onkeypress="return solonumero(event);">

                    <label>Precio Compra </label>
                </div>

            </div>

            <div class="col-xs-4 col-sm-3 col-sm-offset-0">
                <div class="group-material">
                    <input id="precioVen" name="precioVen" type="text" class="material-control tooltips-general" value='<?php echo $fila->precioV?>' data-toggle="tooltip" data-placement="top" title="Solo numero" style="pointer-events: none;">

                    <label>Precio de Venta</label>
                </div>

            </div>

            <div class="col-xs-4 col-sm-3 col-sm-offset-0">
                <div class="group-material">
                    <input id="stockminimo" name="stockminimo" type="text" class="material-control tooltips-general" value='<?php echo $fila->stock?>'data-toggle="tooltip" data-placement="top" title="Solo numero" onkeypress="return solonumeros(event);">

                    <label>Stock Mínimo </label>
                </div>

            </div>

        </form>
    </div>
</div>
            <?php
          }
      }
    }
    if(!empty($_POST['valorDev'])){
      $id=$_POST['valorDev'];
      $result=$conexion->query("DELETE FROM `productos` WHERE id_producto='".$id."'");
      if($result){
        actualizar();
      } 
      return 0;
    }
    if(!empty($_POST['valorElim'])){
      $id=$_POST['valorElim'];
      $result=$conexion->query("SELECT productos.nombre as producto, sum(detproductos.cantidCompra) as existencia, detproductos.fechaCaduc as fecha, detproductos.precCompra as precioC, detproductos.precVenta as precioV, productos.id_producto as id FROM productos INNER JOIN detproductos ON detproductos.id_producto = productos.id_producto WHERE productos.id_producto='".$id."' GROUP BY productos.nombre");
      if($result){
        if($fila = $result->fetch_object()){
          if($fila->existencia>0){
            echo "existe";
          }else{
            $resultr=$conexion->query("DELETE FROM `productos` WHERE id_producto='".$id."'");
            if($resultr){
              actualizar();
            }
          }
        }
      }
    }
if(!empty($_POST['idprod']) && !empty($_POST['stock']) && !empty($_POST['producto'])){
$id=$_POST['idprod'];
$stock=$_POST['stock'];
$prod=$_POST['producto'];
$cosultaexp="UPDATE `productos` SET `nombre`='".$prod."',`stockMin`='".$stock."' WHERE `id_producto`='".$id."'";
      $resultadoexp = $conexion->query($cosultaexp);
      if($resultadoexp){
        actualizar();
      }
}
    function actualizar(){
      include"../config/conexion.php";
         $result=$conexion->query("SELECT productos.nombre as producto,sum(detproductos.cantidCompra) as existencia,detproductos.fechaCaduc as fecha,detproductos.precCompra as precioC,detproductos.precVenta as precioV,productos.id_producto as id
           FROM
           productos
          INNER JOIN detproductos ON detproductos.id_producto = productos.id_producto GROUP BY productos.nombre");
            if($result){?>
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
                          <tbody>
                          <?php
                                while($fila = $result->fetch_object()){
                          ?>
                               <tr>
                                <td><?php echo $fila->producto ?></td>
                                <td><?php echo $fila->existencia ?></td>
                                <td><?php echo date("d-m-Y", strtotime($fila->fecha)) ?></td>
                                <td><?php echo $fila->precioC ?></td>
                                <td><?php echo $fila->precioV ?></td>
                                <td>
                                    <a href="#" data-toggle= "modal" data-target= "#modificarProducto" class="material-control tooltips-general" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Editar" onclick="editar(<?php echo $fila->id?>)">
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
                            }?>
                           </tbody>
              <?php
            }
    }    
?>
