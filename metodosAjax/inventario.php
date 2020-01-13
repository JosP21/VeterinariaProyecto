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

    if(!empty($_POST['inv'])){
      actualizar();
    } 

    if(!empty($_POST['invp'])){
      $datos="<fieldset style='background-color: #f0eeee;border: 2px solid #a9acb0;'>
                  <legend style='color: #1E4180;'>Proveedor:</legend>
                  <div>
                    <center>
                       <div class='col-xs-4 col-sm-10 col-sm-offset-1'>
             <div class='group-material'>
              <div style='width: 100%;float:left;'>
                <input type='text' name='proveedor' id='proveedor' class='material-control tooltips-general' placeholder='Proveedor...' required='' data-toggle='tooltip' data-placement='top' title='Solo letras' onkeypress='return sololetras(event);' onclick='prove()'  list='listaprov' autocomplete='OFF'>
                <datalist id='listaprov'>"; 
                $cosulta="SELECT
empresa.nombre as nombre
FROM
empresa
INNER JOIN proveedores ON proveedores.id_empresa = empresa.id_empresa
INNER JOIN factcompra ON factcompra.id_proveedor = proveedores.id_proveedor
INNER JOIN detproductos ON detproductos.id_facturaComp = factcompra.id_factura
INNER JOIN productos ON detproductos.id_producto = productos.id_producto ORDER BY empresa.nombre";
                                             $resultado = $conexion->query($cosulta);
                                              if($resultado){
                                               while($fila = $resultado->fetch_object()){
                                                $datos.="<option value='$fila->nombre'> ";
                                                 }
                                               }
      $datos.="</datalist>
            </div>
          </div>
        </div>
                   </center>
                 </div>
               </fieldset>";
               echo $datos;
    }

    if(!empty($_POST['invf'])){
      $fecha=date('Y-m-d');
      echo "<fieldset style='background-color: #f0eeee;border: 2px solid #a9acb0;'>
                  <legend style='color: #1E4180;'>Fechas:</legend>
                  <div>
                    <center>
                        <div style='margin-bottom: -4%;margin-top: 1%;' class='col-sm-4 col-sm-offset-2'>
  <div class='group-material'>
    <input type='date' name='desde' id='desde' class='material-control tooltips-general' placeholder='8/04/2019' data-min-length='1' max='".$fecha."' data-selection-required='true' data-toggle='tooltip' data-placement='top' title='' onchange='invDesde()' data-original-title=''>
    <label style='margin-left: -25%;margin-top: 15%;'>Desde</label>
          </div>
        </div>
        <div style='margin-bottom: -4%;margin-top: 1%;' class='col-sm-4 col-sm-offset-1'>
  <div class='group-material'>
    <input type='date' name='hasta' id='hasta' class='material-control tooltips-general' placeholder='8/04/2019' data-min-length='1' max='".$fecha."' data-selection-required='true' data-toggle='tooltip' data-placement='top'  onchange='invHasta()' title='' data-original-title=''>
    <label style='margin-left: -25%;margin-top: 15%;'>Hasta</label>
          </div>
        </div>
                   </center>
                 </div>
               </fieldset>";
      }  

      if(!empty($_POST['invc'])){
      $datos="<fieldset style='background-color: #f0eeee;border: 2px solid #a9acb0;'>
                  <legend style='color: #1E4180;'>Categoria:</legend>
                  <div>
                    <center>
                       <div class='col-xs-4 col-sm-10 col-sm-offset-1'>
             <div class='group-material'>
              <div style='width: 100%;float:left;'>
                <input type='text' name='categoria' id='categoria' class='material-control tooltips-general' placeholder='Categoria...'' required='' data-toggle='tooltip' data-placement='top' title='Solo letras' onkeypress='return sololetras(event);' onclick='cat()'  list='listacat' autocomplete='OFF'>
                <datalist id='listacat'>";
                $cosulta="SELECT
categoria.nombre as nombre
FROM
detproductos
INNER JOIN productos ON detproductos.id_producto = productos.id_producto
INNER JOIN categoria ON productos.id_categoria = categoria.id_categoria
ORDER BY categoria.nombre";
                                             $resultado = $conexion->query($cosulta);
                                              if($resultado){
                                               while($fila = $resultado->fetch_object()){
                                                $datos.="<option value='$fila->nombre'> ";
                                                 }
                                               }
        $datos.="</datalist>
            </div>
          </div>
        </div>
                   </center>
                 </div>
               </fieldset>";
               echo $datos;
    } 
    if(!empty($_POST['invm'])){
     $datos= "<fieldset style='background-color: #f0eeee;border: 2px solid #a9acb0;'>
                  <legend style='color: #1E4180;'>Marca:</legend>
                  <div>
                    <center>
                       <div class='col-xs-4 col-sm-10 col-sm-offset-1'>
             <div class='group-material'>
              <div style='width: 100%;float:left;'>
                <input type='text' name='marca' id='marca' class='material-control tooltips-general' placeholder='Marca...' required='' data-toggle='tooltip' data-placement='top' title='Solo letras' onkeypress='return sololetras(event);' onclick='mar()' list='listam' autocomplete='OFF'>
                <datalist id='listam'>";
                 $cosulta="SELECT
distribuidora.nombre as nombre
FROM
detproductos
INNER JOIN productos ON detproductos.id_producto = productos.id_producto
INNER JOIN distribuidora ON productos.id_distribuidora = distribuidora.id_distrib
ORDER BY distribuidora.nombre";
                                             $resultado = $conexion->query($cosulta);
                                              if($resultado){
                                               while($fila = $resultado->fetch_object()){
                                                $datos.="<option value='$fila->nombre'> ";
                                                 }
                                               }
             $datos.= "</datalist>
            </div>
          </div>
        </div>
                   </center>
                 </div>
               </fieldset>";
               echo $datos;
    }  

    if(!empty($_POST['inventarioproveedor'])){
      $invnxp=$_POST['inventarioproveedor'];
      $result=$conexion->query("SELECT productos.nombre as producto,sum(detproductos.cantidCompra) as existencia,
detproductos.fechaCaduc as fecha,detproductos.precCompra as precioC,
detproductos.precVenta as precioV,productos.id_producto as id
FROM
productos
INNER JOIN detproductos ON detproductos.id_producto = productos.id_producto
INNER JOIN factcompra ON detproductos.id_facturaComp = factcompra.id_factura
INNER JOIN proveedores ON factcompra.id_proveedor = proveedores.id_proveedor
INNER JOIN empresa ON proveedores.id_empresa = empresa.id_empresa
where empresa.nombre='$invnxp'
GROUP BY productos.nombre");
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

     if(!empty($_POST['inventarioCategoria'])){
      $invnxc=$_POST['inventarioCategoria'];
      $result=$conexion->query("SELECT productos.nombre as producto,categoria.nombre as categoria,sum(detproductos.cantidCompra) as existencia,
detproductos.fechaCaduc as fecha,detproductos.precCompra as precioC,
detproductos.precVenta as precioV,productos.id_producto as id
FROM
productos
INNER JOIN detproductos ON detproductos.id_producto = productos.id_producto
INNER JOIN factcompra ON detproductos.id_facturaComp = factcompra.id_factura
INNER JOIN proveedores ON factcompra.id_proveedor = proveedores.id_proveedor
INNER JOIN empresa ON proveedores.id_empresa = empresa.id_empresa
INNER JOIN categoria ON productos.id_categoria = categoria.id_categoria
WHERE categoria.nombre='$invnxc'
GROUP BY productos.nombre");
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

    if(!empty($_POST['inventarioMarca'])){
      $invnxm=$_POST['inventarioMarca'];
      $result=$conexion->query("SELECT
productos.nombre AS producto,
Sum(detproductos.cantidCompra) AS existencia,
detproductos.fechaCaduc AS fecha,
detproductos.precCompra AS precioC,
detproductos.precVenta AS precioV,
productos.id_producto AS id,
distribuidora.nombre
FROM
productos
INNER JOIN detproductos ON detproductos.id_producto = productos.id_producto
INNER JOIN factcompra ON detproductos.id_facturaComp = factcompra.id_factura
INNER JOIN proveedores ON factcompra.id_proveedor = proveedores.id_proveedor
INNER JOIN empresa ON proveedores.id_empresa = empresa.id_empresa
INNER JOIN distribuidora ON productos.id_distribuidora = distribuidora.id_distrib
where distribuidora.nombre='$invnxm'
GROUP BY productos.nombre");
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

    if(!empty($_POST['fdesde']) && empty($_POST['fhasta'])){
      $fecha=$_POST['fdesde'];
      $result=$conexion->query("SELECT productos.nombre as producto,sum(detproductos.cantidCompra) as existencia,
detproductos.fechaCaduc as fecha,detproductos.precCompra as precioC,
detproductos.precVenta as precioV,productos.id_producto as id
FROM
productos
INNER JOIN detproductos ON detproductos.id_producto = productos.id_producto
INNER JOIN factcompra ON detproductos.id_facturaComp = factcompra.id_factura
INNER JOIN proveedores ON factcompra.id_proveedor = proveedores.id_proveedor
INNER JOIN empresa ON proveedores.id_empresa = empresa.id_empresa
where factcompra.fecha>='".$fecha."'
GROUP BY productos.nombre");
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
  if(empty($_POST['fdesde']) && !empty($_POST['fhasta'])){
      $fecha=$_POST['fhasta'];
      $result=$conexion->query("SELECT productos.nombre as producto,sum(detproductos.cantidCompra) as existencia,
detproductos.fechaCaduc as fecha,detproductos.precCompra as precioC,
detproductos.precVenta as precioV,productos.id_producto as id
FROM
productos
INNER JOIN detproductos ON detproductos.id_producto = productos.id_producto
INNER JOIN factcompra ON detproductos.id_facturaComp = factcompra.id_factura
INNER JOIN proveedores ON factcompra.id_proveedor = proveedores.id_proveedor
INNER JOIN empresa ON proveedores.id_empresa = empresa.id_empresa
where factcompra.fecha<='".$fecha."'
GROUP BY productos.nombre");
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

if(!empty($_POST['fdesde']) && !empty($_POST['fhasta'])){
  $f1=$_POST['fdesde'];
  $f2=$_POST['fhasta'];
  $result=$conexion->query("SELECT productos.nombre as producto,sum(detproductos.cantidCompra) as existencia,
detproductos.fechaCaduc as fecha,detproductos.precCompra as precioC,
detproductos.precVenta as precioV,productos.id_producto as id
FROM
productos
INNER JOIN detproductos ON detproductos.id_producto = productos.id_producto
INNER JOIN factcompra ON detproductos.id_facturaComp = factcompra.id_factura
INNER JOIN proveedores ON factcompra.id_proveedor = proveedores.id_proveedor
INNER JOIN empresa ON proveedores.id_empresa = empresa.id_empresa
where factcompra.fecha>='$f1' and factcompra.fecha<='$f2'
GROUP BY productos.nombre");
            if($result){?><thead>
                            <tr>
                              <th>Nombre Producto</th>
                              <th>Existencia</th>
                              <th>Fecha Vencimiento</th>
                              <th>Precio de Compra</th>
                              <th>Precio de Venta</th>
                              
                              <th>Acción</th>
                            </tr>
                          </thead>
                          <tbody><?php
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
  //RangoInventario($_POST['fdesde'],$_POST['fhasta']);
}

  function RangoInventario($f1,$f2){
    include"../config/conexion.php";
    $result=$conexion->query("SELECT productos.nombre as producto,sum(detproductos.cantidCompra) as existencia,
detproductos.fechaCaduc as fecha,detproductos.precCompra as precioC,
detproductos.precVenta as precioV,productos.id_producto as id
FROM
productos
INNER JOIN detproductos ON detproductos.id_producto = productos.id_producto
INNER JOIN factcompra ON detproductos.id_facturaComp = factcompra.id_factura
INNER JOIN proveedores ON factcompra.id_proveedor = proveedores.id_proveedor
INNER JOIN empresa ON proveedores.id_empresa = empresa.id_empresa
where factcompra.fecha>='".$f1." and factcompra.fecha<='".$f2."'
GROUP BY productos.nombre");
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
