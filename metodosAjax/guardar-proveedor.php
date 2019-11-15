<?php
include"../config/conexion.php";
        if(!empty($_POST['nombreE']) && !empty($_POST['telefonoe']) && !empty($_POST['direccionE'])){
        $estado=true;
        $nombreE=$_POST['nombreE'];
        $datos=null;
        $consulta="INSERT INTO `empresa` VALUES (null,'".$_POST['nombreE']."','".$_POST['direccionE']."','".$_POST['telefonoe']."','".$estado."')";
        $resultado = $conexion->query($consulta);
        if ($resultado) {
          echo $nombreE;
        }
        $cosulta="SELECT * FROM `empresa` WHERE nombre='$nombreE'";
            $resultado = $conexion->query($cosulta);
            if($resultado){
              if($fila = $resultado->fetch_object()){
                echo $fila->nombre;
                return 0;
              }
        }
    }else if(!empty($_POST['empresa']) && !empty($_POST['telefono']) && !empty($_POST['correo']) && !empty($_POST['nombreproveedor'])){
    	$idempresa=null;
    	$empresa=$_POST['empresa'];
    	$proveedor=$_POST['nombreproveedor'];
    	$tel=$_POST['telefono'];
    	$correo=$_POST['correo'];
        $datos=null;
        $cosulta="SELECT * FROM `empresa` WHERE nombre='$empresa'";
            $resultado = $conexion->query($cosulta);
            if($resultado){
              if($fila = $resultado->fetch_object()){
                $idempresa= $fila->id_empresa;
              }
            }
        $consultap="INSERT INTO `proveedores`(`id_proveedor`, `nombre`, `telefono`, `correo`, `id_empresa`) VALUES (null,'".$proveedor."','".$tel."','".$correo."','".$idempresa."')";
        $resultadopro = $conexion->query($consultap);
        if ($resultadopro) {
        	/*$cosultaP="SELECT * FROM `proveedores` WHERE nombre='$proveedor'";
            $resultadoP = $conexion->query($cosultaP);
            if($resultadoP){
              if($fila = $resultadoP->fetch_object()){*/
                echo $proveedor;
              /*}
            }
        }/*else{
        	echo "ERROR";
        }
        echo $datos;*/}

    }else if(!empty($_POST['empresam']) && !empty($_POST['telefonom']) && !empty($_POST['correom']) && !empty($_POST['proveedorm'])){
    	$idproveedor=null;
    	$empresa=$_POST['empresam'];
    	$proveedor=$_POST['proveedorm'];
    	$tel=$_POST['telefonom'];
    	$correo=$_POST['correom'];
    	$telefon=null;
        $idproveedor=$_POST['idprov'];
    	if(strlen($tel)==9){
    		$telefon=$tel;
    	}else{
    		$telefon=substr($tel, 0,4)."-".substr($tel, 4,4);
    	}
    	$cosulta="UPDATE `proveedores` SET `nombre`='".$proveedor."',`telefono`='".$telefon."',`correo`='".$correo."' where id_proveedor='".$idproveedor."'";
            $resultado = $conexion->query($cosulta);
            if($resultado){
                $result=$conexion->query("SELECT e.nombre as empresa, p.nombre as nombre, p.telefono as tel, p.correo as correo, p.id_proveedor as id FROM empresa as e INNER JOIN proveedores as p ON p.id_empresa = e.id_empresa");
                            if($result){
                            	echo "<thead>
                            <tr>
                                <th>Nombre Empresa</th>
                                <th>Nombre Proveedor</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>";
                                while($fila = $result->fetch_object()){
                                echo "<tr>
                                		<td>$fila->empresa</td>
                                		<td>$fila->nombre</td>
                                		<td>$fila->tel</td>
                                		<td>$fila->correo</td>
                                		<td>
                                    		<a href='#' data-toggle= 'modal' data-target='#modificarproveedor' class='material-control tooltips-general' required='' maxlength='50' data-toggle='tooltip' data-placement='top' title='Editar' onclick='editar($fila->id)'>
                                        	<i class='zmdi zmdi-edit' style='color: #31920D;'></i>
                                    		</a>
                                    		&nbsp;&nbsp;
                                    		<a href='#' class='material-control tooltips-general' required='' maxlength='50' data-toggle='tooltip' data-placement='top' title='Eliminar' onclick='eliminar($fila->id)''>
                                        	<i class='zmdi zmdi-delete' style='color: #F91D0B;''> </i>
                                   			 </a>
                                		</td>
                            			</tr>";
                        		}
                        		echo "</tbody>";
                       }
            }
    }else if(!empty($_POST['val'])){
    	$id=$_POST['val'];
    	$result=$conexion->query("SELECT e.nombre as empresa, p.nombre as nombre, p.telefono as tel, p.correo as correo, p.id_proveedor as id FROM empresa as e INNER JOIN proveedores as p ON p.id_empresa = e.id_empresa WHERE id_proveedor='$id'");
         if($result){
          if($fila = $result->fetch_object()){
          	echo "<div class='container-fluid'>
                               <div class='col-xs-12 col-sm-offset-0'>
                                    <div class='title-flat-form title-flat-blue'>Modificar</div>
                                    <form id='frmmodificar' name='frmmodificar' method='post' action=''>
                                    <input type='hidden' name='idprov' id='idprov' value='$fila->id'>
                            <div class='col-xs-5 col-sm-5 col-sm-offset-1' style='margin-left: 9%;''>
                            <div class='group-material'>
                                <input id='empresam' name='empresam' type='text' class='material-control tooltips-general' placeholder='Nombre...' required='' data-toggle='tooltip' data-placement='top' title='Solo letras' onkeypress='return sololetras(event);' value='$fila->empresa'>
                                <label>Nombre de la empresa</label>
                            </div></div><div class='col-xs-5 col-sm-5 col-sm-offset-0'>
                        <div class='group-material'>
                                <input id='proveedorm' name='proveedorm' type='text' class='material-control tooltips-general' placeholder='Proveedor...' required='' data-toggle='tooltip' data-placement='top' title='Solo letras' onkeypress='return sololetras(event);' value='$fila->nombre'>
                                <label>Nombre</label>
                            </div></div>
                            <script type='text/javascript'>
                                $(document).ready(function(){
                                 $('#telefonom').mask('0000-0000');
                             });
                            </script>
                            <div class='col-xs-5 col-sm-5 col-sm-offset-1' style='margin-left: 9%;''>
                            <div class='group-material'>
                                <input id='telefonom' name='telefonom' type='text' class='material-control tooltips-general' placeholder='####-####' required='' maxlength='8' data-toggle='tooltip' data-placement='top' title='Numero de celular valido' onkeypress='return solonumero(event);' value='$fila->tel'>
                                <label>Telefono</label>
                            </div></div><div class='col-xs-5 col-sm-5 col-sm-offset-0'>
                            <div class='group-material'>
                                <input id='correom' name='correom' type='text' class='material-control tooltips-general' placeholder='ejemplo@gmail.com' required='' data-toggle='tooltip' data-placement='top' title='Digite un Correo valido' value='$fila->correo'>
                                <label>Correo</label>
                            </div></div></form>
                        </div>
                    </div>";
          }
      }
    }
    else if(!empty($_POST['valor'])){
    	$id=$_POST['valor'];
    	$result=$conexion->query("DELETE FROM `proveedores` WHERE id_proveedor='".$id."'");
    	if($result){
    		$resulta=$conexion->query("SELECT e.nombre as empresa, p.nombre as nombre, p.telefono as tel, p.correo as correo, p.id_proveedor as id FROM empresa as e INNER JOIN proveedores as p ON p.id_empresa = e.id_empresa");
                            if($resulta){
                            	echo "<thead>
                            <tr>
                                <th>Nombre Empresa</th>
                                <th>Nombre Proveedor</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>";
                                while($fila = $resulta->fetch_object()){
                                echo "<tr>
                                		<td>$fila->empresa</td>
                                		<td>$fila->nombre</td>
                                		<td>$fila->tel</td>
                                		<td>$fila->correo</td>
                                		<td>
                                    		<a href='#' data-toggle= 'modal' data-target='#modificarproveedor' class='material-control tooltips-general' required='' maxlength='50' data-toggle='tooltip' data-placement='top' title='Editar' onclick='editar($fila->id)'>
                                        	<i class='zmdi zmdi-edit' style='color: #31920D;'></i>
                                    		</a>
                                    		&nbsp;&nbsp;
                                    		<a href='#' class='material-control tooltips-general' required='' maxlength='50' data-toggle='tooltip' data-placement='top' title='Eliminar' onclick='eliminar($fila->id)''>
                                        	<i class='zmdi zmdi-delete' style='color: #F91D0B;''> </i>
                                   			 </a>
                                		</td>
                            			</tr>";
                        		}
                        		echo "</tbody>";
                       }
    	}

      }	

?>

