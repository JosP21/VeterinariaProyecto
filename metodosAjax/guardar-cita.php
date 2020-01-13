<?php
include"../config/conexion.php";
date_default_timezone_set("America/El_Salvador");
if(!empty($_POST['val'])){
  $exp=$_POST['val'];
  list($n1, $n2,$n3) = explode(' ', $exp);
  $nombre=$n1." ".$n3;?>
    <datalist id="listar">
      <?php
       $cosulta="SELECT raza.nombre as traza FROM raza
       INNER JOIN mascotas ON mascotas.id_raza = raza.id_raza
       where mascotas.nombre='".$nombre."'";
       $resultado = $conexion->query($cosulta);
       if($resultado){
        while($fila = $resultado->fetch_object()){?>
          <option value='<?php echo $fila->traza ?>'>
            <?php
        }
        }
        ?>
        </datalist>
  <?php
}
if(!empty($_POST['valor'])){
  $traza=$_POST['valor'];
  $cosulta="SELECT
  propietario.nombres as nombre,
  propietario.apellidos as apellido,
  mascotas.id_mascota as exped
  FROM raza
  INNER JOIN mascotas ON mascotas.id_raza = raza.id_raza
  INNER JOIN propietario ON mascotas.id_propietario = propietario.id_propietario
  where raza.nombre='".$traza."'";
   $resultado = $conexion->query($cosulta);
   if($resultado){
    if($fila = $resultado->fetch_object()){
      $nombrep=$fila->nombre." ".$fila->apellido;
      ?>
      <div style="/*! margin-left: 8%; */" class="col-sm-3 col-sm-offset-0">
      <div class="group-material" id="propietarioG">
        <input type="text" name="nombrepropietario" id="nombrepropietario" class="material-control tooltips-general" placeholder="Nombre..." required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" value="<?php echo $nombrep ?>">
         <label>Propietario</label>
       </div>
     </div>
     <div style="margin-left: 13%;" class="col-sm-4 col-sm-offset-1">
      <div class="group-material" id="propietarioG">
       <input type="text" name="expediente" id="expediente" class="material-control tooltips-general" placeholder="# Expediente..." required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" value="<?php echo $fila->exped?>" data-original-title="">
       <label>Expediente</label>
     </div></div>
      <?php
    }
  }
}
if(!empty($_POST['accion'])){
  $variable=$_POST['accion'];
  if($variable=="Cita"){?>
    <div style="margin-top: -21%;" class="col-sm-4 col-sm-offset-6">
                                <div class="group-material" id="propietarioG">
                                <?php
                                include"../config/conexion.php";
                                $cosulta="SELECT empleados.nombres as nomb, empleados.apellidos as ape, empleados.id_Empleado as idEm  FROM empleados where empleados.rol='Administrador'";
                                $resultado = $conexion->query($cosulta);
                                if($resultado){
                                    if($fila = $resultado->fetch_object()){
                                        $nombredoc=$fila->nomb." ".$fila->ape;
                                    ?>
                                    <input type="hidden" name="iddoctor" id="iddoctor" value="<?php echo $fila->idEm?>">
                                    <input type="text" name="nombreD" id="nombreD" class="material-control tooltips-general" placeholder="Nombre Doctor" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" value="<?php echo $nombredoc?>" data-original-title="" style="pointer-events: none;">
                                    <?php
                                                 }
                                               }
                                    ?> <label>Doctor</label>
                                </div></div>
                                <div style="margin-left: 13%;margin-top: -13%;" class="col-sm-4 col-sm-offset-1">
                                <div class="group-material" id="propietarioG">
                                    <input type="date" name="fecha" id="fecha" class="material-control tooltips-general" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onchange="validarhora()" min="<?php echo date('Y-m-d');?>" value="<?php echo date('Y-m-d');?>" data-original-title=""><label>Fecha</label>
                                </div></div>
                                <div id="horafl">
                                <div style="margin-top: -13%;" class="col-sm-4 col-sm-offset-6">
                                <div class="group-material" id="propietarioG">
                                    <input type="time" name="hora" id="hora" class="material-control tooltips-general" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" value="<?php echo date('H:i')?>" data-original-title=""><label>Hora</label>
                                </div></div>
                                </div>
                            <p class="text-center" style="margin-top: 30%">
                                <button type="button" onclick="guardar()" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                                <button type="reset" class="btn btn-info" onclick="location.reload()" style="margin-right: 20px;"><i class="zmdi zmdi-refresh-alt"></i> &nbsp;&nbsp; Cancelar</button>
                            </p> 
  <?php  return 0;
  }
  if($variable=="Servicio"){?>
    <div id="idcitaSer">
      <input type="hidden" name="idcitSer" id="idcitSer" value="">
    </div>
                                <div class="col-sm-3 col-sm-offset-0">
                                <div class="group-material">
                                    <input type="date" name="fechaS" id="fechaS" class="material-control tooltips-general"  required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" onchange="validarhoraS()" min="<?php echo date('Y-m-d');?>" value="<?php echo date('Y-m-d');?>" title="" value="" data-original-title=""><label>Fecha</label>
                                </div></div>
                                <div id="horafl1">
                                <div style="margin-top: -8.5%;margin-left: 68%;" class="col-sm-2 col-sm-offset-0">
                                <div class="group-material">
                                    <input type="time" name="horas" id="horas" class="material-control tooltips-general" data-min-length="1" data-selection-required="true" data-toggle="tooltip" value="<?php echo date('H:i')?>" data-placement="top" title="" data-original-title=""><label>Hora</label>
                                </div></div>
                                </div>
                               
    <?php
  }
}

if(!empty($_POST['fdato'])){
  $cosulta="SELECT MAX(citas.hora) as id,citas.fecha as fecha,citas.hora as hora FROM citas where citas.fecha='".$_POST['fdato']."' and citas.hora=(SELECT MAX(citas.hora) from citas where citas.fecha='".$_POST['fdato']."')";
       $resultado = $conexion->query($cosulta);
       if($resultado){
        if($fila = $resultado->fetch_object()){
          if($fila->fecha==null){
            $hora1 = date('H:i');
            $hora2 = date('H:i',strtotime("08:00"));
            if($hora1<=$hora2){?>
  <div style="margin-top: -13%;" class="col-sm-4 col-sm-offset-6">
                                <div class="group-material">
                                    <input type="time" name="hora" id="hora" class="material-control tooltips-general" data-min-length="1" data-selection-required="true" data-toggle="tooltip" value="<?php echo $hora2?>" data-placement="top" title="" data-original-title=""><label>Hora</label>
                                </div></div>
  <?php
   }else{?>
    <div style="margin-top: -13%;" class="col-sm-4 col-sm-offset-6">
                                <div class="group-material">
                                    <input type="time" name="hora" id="hora" class="material-control tooltips-general" data-min-length="1" data-selection-required="true" data-toggle="tooltip" value="<?php echo $hora1?>" data-placement="top" title="" data-original-title=""><label>Hora</label>
                                </div></div>
    <?php
   }}else{

          $date = date('H:i',strtotime($fila->hora));
          $NuevaFecha = strtotime ( '+30 minute' , strtotime ($date) ) ;
          $hora = date ( 'H:i' , $NuevaFecha); 
          $hora1 = date('H:i');
            $hora2 = date('H:i',strtotime($fila->hora));
            if($hora1<=$hora2){
              $date = date('H:i',strtotime($fila->hora));
              $NuevaFecha = strtotime ( '+30 minute' , strtotime ($date) ) ;
              $hora = date ( 'H:i' , $NuevaFecha); 
              ?>
  <div style="margin-top: -13%;" class="col-sm-4 col-sm-offset-6">
                                <div class="group-material">
                                    <input type="time" name="hora" id="hora" class="material-control tooltips-general" data-min-length="1" data-selection-required="true" data-toggle="tooltip" value="<?php echo $hora?>" data-placement="top" title="" data-original-title=""><label>Hora</label>
                                </div></div>
  <?php
   }else{?>
    <div style="margin-top: -13%;" class="col-sm-4 col-sm-offset-6">
                                <div class="group-material">
                                    <input type="time" name="hora" id="hora" class="material-control tooltips-general" data-min-length="1" data-selection-required="true" data-toggle="tooltip" value="<?php echo $hora1?>" data-placement="top" title="" data-original-title=""><label>Hora</label>
                                </div></div>
    <?php
   }
        }
        }
      }
}
if(!empty($_POST['fdatos'])){
 $cosulta="SELECT
citas.fecha,
citas.hora as hora,
max(citas.hora)
FROM
detservicio
INNER JOIN citas ON detservicio.id_cita = citas.id_cita
WHERE citas.fecha='".$_POST['fdatos']."' and citas.hora=(SELECT
max(citas.hora)
FROM
detservicio
INNER JOIN citas ON detservicio.id_cita = citas.id_cita WHERE citas.fecha='".$_POST['fdatos']."')";
       $resultado = $conexion->query($cosulta);
       if($resultado){
        if($fila = $resultado->fetch_object()){
          if($fila->fecha==null){
            $horas1 = date('H:i');
$horas2 = date('H:i',strtotime("08:00"));
if($horas1<=$horas2){?>
  <div style="margin-top: -8.5%;margin-left: 68%;" class="col-sm-2 col-sm-offset-0">
                                <div class="group-material">
                                    <input type="time" name="horas" id="horas" class="material-control tooltips-general" data-min-length="1" data-selection-required="true" data-toggle="tooltip" value="<?php echo $horas2?>" data-placement="top" title="" data-original-title=""><label>Hora</label>
                                </div></div>
  <?php
   }else{?>
    <div style="margin-top: -8.5%;margin-left: 68%;" class="col-sm-2 col-sm-offset-0">
                                <div class="group-material">
                                    <input type="time" name="horas" id="horas" class="material-control tooltips-general" data-min-length="1" data-selection-required="true" data-toggle="tooltip" value="<?php echo $horas1?>" data-placement="top" title="" data-original-title=""><label>Hora</label>
                                </div></div>
    <?php
   }
          }else{

          $date = date('H:i',strtotime($fila->hora));
          $NuevaFecha = strtotime ( '+30 minute' , strtotime ($date) ) ;
          $hora = date ( 'H:i' , $NuevaFecha); 
          $horas1 = date('H:i');
$horas2 = date('H:i',strtotime($fila->hora));
if($horas1<=$horas2){
  $date = date('H:i',strtotime($fila->hora));
          $NuevaFecha = strtotime ( '+30 minute' , strtotime ($date) ) ;
          $hor = date ( 'H:i' , $NuevaFecha); 
  ?>
  <div style="margin-top: -8.5%;margin-left: 68%;" class="col-sm-2 col-sm-offset-0">
                                <div class="group-material">
                                    <input type="time" name="horas" id="horas" class="material-control tooltips-general" data-min-length="1" data-selection-required="true" data-toggle="tooltip" value="<?php echo $hor?>" data-placement="top" title="" data-original-title=""><label>Hora</label>
                                </div></div>
  <?php
   }else{?>
    <div style="margin-top: -8.5%;margin-left: 68%;" class="col-sm-2 col-sm-offset-0">
                                <div class="group-material">
                                    <input type="time" name="horas" id="horas" class="material-control tooltips-general" data-min-length="1" data-selection-required="true" data-toggle="tooltip" value="<?php echo $horas1?>" data-placement="top" title="" data-original-title=""><label>Hora</label>
                                </div></div>
    <?php
   }
        }
        }
      }
}
if(!empty($_POST['mascota']) && !empty($_POST['razamascota']) && !empty($_POST['nombrepropietario']) && !empty($_POST['expediente']) && !empty($_POST['iddoctor']) && !empty($_POST['nombreD']) && !empty($_POST['fecha']) && !empty($_POST['hora'])){
  $expediente=$_POST['expediente'];
  $iddoctor=$_POST['iddoctor'];
  $fecha=$_POST['fecha'];
  $hora=$_POST['hora'];
  $estado="Pendiente";
  $guardarE="INSERT INTO `citas`(`id_cita`, `fecha`, `hora`, `estado`, `id_empleado`, `id_mascota`) VALUES (null,'".$fecha."','".$hora."','".$estado."','".$iddoctor."','".$expediente."')";
    $resultadoEx = $conexion->query($guardarE);
    if($resultadoEx){
     echo $expediente;
    }else{
      echo "ERROR";
    }
}
if(!empty($_POST['fecha']) && !empty($_POST['idE']) && !empty($_POST['idcita'])){
$fecha=$_POST['fecha'];
$idExp=$_POST['idE'];
$idT=$_POST['idcita'];
$result=$conexion->query("SELECT
mascotas.id_mascota AS idM,
mascotas.nombre AS nomM,
mascotas.alias AS alias,
propietario.nombres AS nomP,
propietario.apellidos AS apP,
citas.id_cita as idC
FROM
mascotas
INNER JOIN propietario ON mascotas.id_propietario = propietario.id_propietario
INNER JOIN citas ON citas.id_mascota = mascotas.id_mascota where mascotas.id_mascota='".$idExp."' and citas.id_cita='".$idT."'");
         if($result){
          if($fila = $result->fetch_object()){
            list($n1, $n2) = explode(' ', $fila->nomM);
            $mascota=$n1." ".$fila->alias." ".$n2;
            $propietario=$fila->nomP." ".$fila->apP;
            ?>
            <input type='hidden' name='idCita' id='idCita' value='<?php echo $fila->idC?>'>
            <div style="margin-bottom: -20px;" class="col-xs-4 col-sm-3 col-sm-offset-0">
                                        <div class="container-fluid" style="margin: 10px 0;"></div>
                                        <div class="group-material">
                                            <input id="expe" name="expe" type="text" class="material-control tooltips-general" placeholder="OS5969696" required="" data-toggle="tooltip" data-placement="top" value="<?php echo $fila->idM?>" title="" onkeypress="return sololetras(event);" style="pointer-events: none;" data-original-title="Solo letras">
                                            <label>Expediente</label>
                                        </div>
                                    </div>
                                    <div style="margin-bottom: -20px;" class="col-xs-4 col-sm-3 col-sm-offset-0">
                                        <div class="container-fluid" style="margin: 10px 0;"></div>
                                        <div class="group-material">
                                            <input id="nomMascota" name="nomMascota" type="text" class="material-control tooltips-general" placeholder="Nombre..." required="" data-toggle="tooltip" value="<?php echo $mascota?>" data-placement="top" title="" onkeypress="return sololetras(event);" style="pointer-events: none;" data-original-title="Solo letras">
                                            <label>Mascota</label>
                                        </div>
                                    </div>
                                    <div style="margin-bottom: -20px;margin-left: 1%;" class="col-xs-4 col-sm-3 col-sm-offset-0">
                                        <div class="container-fluid" style="margin: 10px 0;"></div>
                                        <div class="group-material">
                                            <input id="nombreP" name="nombreP" type="text" class="material-control tooltips-general" placeholder="Propietario..." required="" data-toggle="tooltip" value="<?php echo $propietario?>" data-placement="top" title="" onkeypress="return sololetras(event);" style="pointer-events: none;" data-original-title="Solo letras">
                                            <label>Propietario</label>
                                        </div>
                                    </div>
            <?php
          }
        }
}
if(!empty($_POST['idCita']) && !empty($_POST['expe']) && !empty($_POST['nomMascota']) && !empty($_POST['nombreP']) && !empty($_POST['diagnostico']) && !empty($_POST['nombreM']) && !empty($_POST['cantida']) && !empty($_POST['dosis'])){
$idcita=$_POST['idCita'];
$expe=$_POST['expe'];
$diag=$_POST['diagnostico'];
$medicamento=$_POST['nombreM'];
$cantidad=$_POST['cantida'];
$dosis=$_POST['dosis'];
$precio=8.00;
$idconsulta=0;
$guardarE="INSERT INTO `consulta`(`id_consulta`, `descripcion`, `id_cita`, `precio`) VALUES (null,'".$diag."','".$idcita."','".$precio."')";
    $resultadoEx = $conexion->query($guardarE);
     $cosulta="SELECT consulta.id_consulta as id FROM consulta where consulta.id_cita='".$idcita."'";
       $resultado = $conexion->query($cosulta);
       if($resultado){
        if($fila = $resultado->fetch_object()){
          $idconsulta=$fila->id;
        }
      }
    $consultaR="INSERT INTO `receta`(`id_receta`, `cantidad`, `medicamento`, `dosis`, `id_consulta`) VALUES (null,'".$cantidad."','".$medicamento."','".$dosis."','".$idconsulta."')";
      $resultadoR = $conexion->query($consultaR);

      $result=$conexion->query("SELECT
receta.cantidad as cant,
receta.medicamento as med,
receta.dosis as dosis
FROM
receta where receta.id_consulta='".$idconsulta."'");
                            if($result){
                              ?><thead>
                                <tr>
                                <th>Medicina</th>
                                <th>Cantidad</th>
                                <th>Dosis</th>
                            </tr>
                        </thead>
                        <tbody><?php
                                while($fila = $result->fetch_object()){?>
                                <tr>
                                    <td><?php echo $fila->med?></td>
                                    <td><?php echo $fila->cant?></td>
                                    <td><?php echo $fila->dosis?></td>
                                  </tr>
                                  <?php
                            }?>
                            </tbody>
                            <?php
                       }

}
if(!empty($_POST['id_cita'])){
$idcita=$_POST['id_cita'];
$estado="Consulta Realizada";
$cosultaexp="UPDATE `citas` SET `estado`='".$estado."' WHERE `id_cita`='".$idcita."'";
      $resultadoexp = $conexion->query($cosultaexp);
      if($resultadoexp){
        actualizar();
      }
}
function actualizar(){
  include"../config/conexion.php";
  $resulta=$conexion->query("SELECT
                                                    mascotas.id_mascota as idM,
                                                    mascotas.nombre as nomM,
                                                    mascotas.alias as alias,
                                                    propietario.nombres as nomP,
                                                    propietario.apellidos as apP,
                                                    citas.fecha as fecha,
                                                    citas.hora as hora,
                                                    citas.id_cita as idC
                                                    FROM mascotas
                                        INNER JOIN propietario ON mascotas.id_propietario = propietario.id_propietario
                                INNER JOIN citas ON citas.id_mascota = mascotas.id_mascota WHERE citas.estado='Pendiente' && citas.fecha=CURDATE()
 ORDER BY citas.hora");
  $primero=true;
                            if($resulta){?>
                              <thead>
                            <tr>
                              <th>Hora</th>
                                <th>Expediente</th>
                                <th>Mascota</th>
                                <th>Propietario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody><?php
                                while($fila = $resulta->fetch_object()){
                                   list($n1, $n2) = explode(' ', $fila->nomM);
                                    $mascota=$n1." ".$fila->alias." ".$n2;
                                    $nombrep=$fila->nomP." ".$fila->apP;
                                    ?>
                                <tr><td><?php echo $fila->hora ?></td>
                                   <td><?php echo $fila->idM ?></td>
                                <td><?php echo $mascota ?></td>
                                <td><?php echo $nombrep ?></td>
                                <td>
                                    <a href="#" data-toggle= "modal" data-target= "#modificarConsulta" class="material-control" required="" onclick="modificarC(<?php echo " '".$fila->fecha."' "?>,<?php echo " '".$fila->idM."' "?>)" maxlength="50"  btnm-data-title="Editar" >
                                        <i class="zmdi zmdi-edit" style="color: #31920D;">
                                        </i>
                                    </a>
                                    &nbsp;&nbsp;
                                    <a href="#" onclick="eliminarcita(<?php echo $fila->idC?>,<?php echo " '".$fila->idM."' "?>,<?php echo " '".$nombrep."' "?>)" class="material-control" required="" maxlength="50"btne-data-title="Eliminar">
                                        <i class="zmdi zmdi-delete" style="color: #F91D0B;">
                                        </i>
                                    </a>
                                    &nbsp;&nbsp;
                                    <?php if($primero){ ?>
                                      <a href="#" onclick="regresarcita(<?php echo $fila->idC?>)" class="material-control" required="" maxlength="50" btnf-data-title="Regresar al Final">
                                        <i class="zmdi zmdi-download" style="color: #10568A;">
                                        </i>
                                    </a>&nbsp;&nbsp;
                                    <button href="#" data-toggle= "modal" data-target= "#Consulta" data-backdrop="static" data-keyboard="false" tabindex="-1" class="material-control tooltips-general btn btn-return" required="" maxlength="50" onclick="pasarConsulta(<?php echo $fila->fecha?>,<?php echo " '".$fila->idM."' "?>,<?php echo $fila->idC?>)">Pasar Consulta
                                        <i class="zmdi zmdi-mail-send" style="color: #fff; margin-left: 6%">
                                        </i></button>
                                     <?php $primero=false;}else{?> 
                                     <button href="#" data-toggle= "modal"  disabled data-target= "#Consulta" data-backdrop="static" data-keyboard="false" tabindex="-1" class="material-control tooltips-general btn btn-return" required="" maxlength="50" onclick="pasarConsulta(<?php echo $fila->fecha?>,<?php echo " '".$fila->idM."' "?>,<?php echo $fila->idC?>)" >Pasar Consulta
                                        <i class="zmdi zmdi-mail-send" style="color: #fff; margin-left: 6%">
                                        </i></button><?php } ?>  
                                </td> 
                                </tr><?php
                            }?></tbody><?php
                       }
}
if(!empty($_POST['nombreS'])){
$cosulta="SELECT
servicios.nombre AS n,
servicios.precio AS p,
servicios.id_servicio as id
FROM servicios WHERE servicios.nombre='".$_POST['nombreS']."'";
  $resultado = $conexion->query($cosulta);
  if($resultado){
    if($fila = $resultado->fetch_object()){
      if($fila->n==$_POST['nombreS']){
        echo $fila->p;
      }else{
        echo 0.0;
      }
    }
  }
}


if(!empty($_POST['servicio']) && !empty($_POST['precio']) && !empty($_POST['fecha']) && !empty($_POST['hora']) && !empty($_POST['expediente']) && !empty($_POST['empleado'])){
  $idemp=0;
  list($n1, $n2) = explode(' ', $_POST['empleado']);
  $cosulta="SELECT
empleados.id_Empleado as id,
empleados.nombres,
empleados.apellidos
FROM
empleados where empleados.nombres='".$n1."' and empleados.apellidos='".$n2."'";
  $resultado = $conexion->query($cosulta);
  if($resultado){
    if($fila = $resultado->fetch_object()){
      $idemp=$fila->id;
    }
  }
  $idservicio=0;
  $precio=$_POST['precio'];
  $servicio=$_POST['servicio'];
$guardarE="INSERT INTO `servicios`(`id_servicio`, `nombre`, `precio`) VALUES (null,'".$servicio."','".$precio."')";
    $resultadoEx = $conexion->query($guardarE);
     $cosulta="SELECT
servicios.id_servicio as ids,
servicios.nombre,
servicios.precio
FROM
servicios where servicios.nombre='".$servicio."'";
       $resultado = $conexion->query($cosulta);
       if($resultado){
        if($fila = $resultado->fetch_object()){
          $idservicio=$fila->ids;
        }
      }

$fecha=$_POST['fecha'];
  $hora=$_POST['hora'];
  $exp=$_POST['expediente'];
  $estado="Servicio Pendiente";
  $cosultaC="SELECT
citas.id_cita as id,
citas.fecha as f,
citas.id_mascota as mas
FROM
citas
INNER JOIN detservicio ON detservicio.id_cita = citas.id_cita
where citas.estado='Servicio Pendiente' && citas.id_mascota='".$exp."' && citas.fecha='".$fecha."'";
  $resultadoC = $conexion->query($cosultaC);
  $numero=$resultadoC->num_rows;
  if($numero==0){
        guardarcita($fecha,$hora,$estado,$idemp,$exp);
  }
  $cosultaCT="SELECT
  citas.id_cita as idcita,
citas.id_mascota as exp,
citas.fecha as fecha
FROM
citas
where citas.estado='Servicio Pendiente'  and citas.id_cita=(SELECT MAX(citas.id_cita) from citas where citas.estado='Servicio Pendiente' )";
  $resultadoCT = $conexion->query($cosultaCT);
  if($resultadoCT){
    if($fila = $resultadoCT->fetch_object()){
      $idCT=$fila->idcita;
      $guardarSr="INSERT INTO `detservicio`(`id_cita`, `id_servicio`) VALUES ('".$idCT."','".$idservicio."')";
      $resultadoSr = $conexion->query($guardarSr);
      if($resultadoSr){
        echo "Cita=".$idCT;
      echo "Servicio=".$idservicio;
      }
    }
  }

}
function guardarcita($fecha,$hora,$estado,$idemp,$exp){
  include"../config/conexion.php";
  $guardarC="INSERT INTO `citas`(`id_cita`, `fecha`, `hora`, `estado`, `id_empleado`, `id_mascota`) VALUES (null,'".$fecha."','".$hora."','".$estado."','".$idemp."','".$exp."')";
         $resultadoCi = $conexion->query($guardarC);
         return 0;
}
if(!empty($_POST['idCita']) && !empty($_POST['idExp'])){
  $result=$conexion->query("SELECT
mascotas.id_mascota AS idM,
mascotas.nombre AS nomM,
mascotas.alias AS alias,
propietario.nombres AS nomP,
propietario.apellidos AS apP,
citas.id_cita AS idC,
citas.fecha AS fecha,
citas.hora AS hora,
empleados.nombres as nombre,
empleados.apellidos as apellido,
empleados.id_Empleado  as idE
FROM
mascotas
INNER JOIN propietario ON mascotas.id_propietario = propietario.id_propietario
INNER JOIN citas ON citas.id_mascota = mascotas.id_mascota
INNER JOIN empleados ON empleados.id_Empleado = citas.id_empleado where mascotas.id_mascota='".$_POST['idExp']."' and citas.fecha='".$_POST['idCita']."'");
         if($result){
          if($fila = $result->fetch_object()){
            $_SESSION["nexp"] =  $fila->idM;
            list($n1, $n2) = explode(' ', $fila->nomM);
            $mascota=$n1." ".$fila->alias." ".$n2;
            $propietario=$fila->nomP." ".$fila->apP;
            $doctor=$fila->nombre." ".$fila->apellido?>
            <div class="container-fluid" style="margin: 20px 0;"></div>
            <form id="frmcitaM" name="frmcitaM" method="post" action="">
              <input type="hidden" name="idcita" id="idcita" value="<?php echo $fila->idC?>">
                            <div class="col-xs-4 col-sm-5 col-sm-offset-1">
                        <div class="group-material">
                                    <input type="text" name="exp" id="exp" class="material-control tooltips-general" placeholder="OP956069" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras" value="<?php echo $fila->idM?>">
                                <label>Expediente</label>
                            </div></div>
                            <div class="col-xs-4 col-sm-5 col-sm-offset-1">
                        <div class="group-material">
                                     <input id="nombreM" name="nombreM" type="text" class="material-control tooltips-general" placeholder="Medico..." required="" data-toggle="tooltip" value="<?php echo $mascota?>" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras">
                                <label>Mascota</label>
                            </div></div>
                             <div class="col-xs-4 col-sm-5 col-sm-offset-1">
                        <div class="group-material">
                                     <input id="nombreP" name="nombreP" type="text" class="material-control tooltips-general" placeholder="Medico..." required="" data-toggle="tooltip" value="<?php echo $propietario?>" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras">
                                <label>Propietario</label>
                            </div></div>
                            <div style="/*! margin-top: -10.4%; *//*! margin-left: 2%; */" class="col-sm-5 col-sm-offset-1">
                            <div class="group-material" id="propietarioG">
                                    <input type="hidden" name="iddoctor" id="iddoctor" value="<?php echo $fila->idE?>">
                                    <input type="text" name="nombreD" id="nombreD" class="material-control tooltips-general" placeholder="Nombre Doctor" required="" data-min-length="1" data-selection-required="true" value="<?php echo $doctor?>" data-toggle="tooltip" data-placement="top" title="" value="" data-original-title="" style="pointer-events: none;"> <label>Doctor</label>
                                </div></div>
                                <div style="/*! margin-left: 13%; *//*! margin-top: -13%; */" class="col-sm-5 col-sm-offset-1">
                                <div class="group-material" id="propietarioG">
                                    <input type="date" name="fecha" id="fecha" value="<?php echo $fila->fecha?>" class="material-control tooltips-general" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" min="<?php echo $fila->fecha?>" data-original-title=""><label>Fecha</label>
                                </div></div>
                                <div id="horafl">
                                <div class="col-sm-5 col-sm-offset-1">
                                <div class="group-material" id="propietarioG">
                                    <input type="time" name="hora" id="hora" class="material-control tooltips-general" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" value="<?php echo $fila->hora?>" data-original-title=""><label>Hora</label>
                                </div></div>
                                </div></form>
            <?php
          }
        }
}
if(!empty($_POST['exp']) && !empty($_POST['nombreM']) && !empty($_POST['nombreP']) && !empty($_POST['iddoctor']) && !empty($_POST['nombreD']) && !empty($_POST['fecha']) && !empty($_POST['hora']) && !empty($_POST['idcita'])){
$idcita=$_POST['idcita'];
$hora=$_POST['hora'];
$fecha=$_POST['fecha'];
$accion="Modificar";
        $fechaC = date("Y-m-d");
        $mot=$_POST['motivo'];
$cosultaexp="UPDATE `citas` SET `fecha`='".$fecha."',`hora`='".$hora."' WHERE `id_cita`='".$idcita."'";
      $resultadoexp = $conexion->query($cosultaexp);
      if($resultadoexp){
         $consult="INSERT INTO `bitcitas`(`id_bitCitas`, `mascota`, `descripcion`, `fecha_creacion`, `accion`, `expediente`) VALUES (null,'".$_POST['nombreM']."','".$mot."','".$fechaC."','".$accion."','".$_POST['exp']."')";
                    $resul = $conexion->query($consult);
        actualizar();
      }
}
if(!empty($_POST['citaEli'])){
      $id=$_POST['citaEli'];
      $result=$conexion->query("DELETE FROM `citas` WHERE id_cita='".$id."'");
      if($result){
        actualizar();
      } 
    }
    if(!empty($_POST['regresarcita'])){
      $id=$_POST['regresarcita'];
      $hora;
      $result=$conexion->query("SELECT
citas.id_cita,
citas.fecha,
citas.hora as hora,
max(citas.hora)
FROM
citas WHERE citas.estado='Pendiente' && citas.fecha=CURDATE() && citas.hora=(SELECT
max(citas.hora)
FROM
citas WHERE citas.estado='Pendiente' && citas.fecha=CURDATE())");
      if($result){
        if($fila = $result->fetch_object()){
          $hora=$fila->hora;
        }
      }
///
      $dateh = date('H:i',strtotime($hora));
      $Nuevah = strtotime ( '+30 minute' , strtotime ($dateh) ) ;
      $horaN = date ( 'H:i' , $Nuevah);
      $cosultaexp="UPDATE `citas` SET `hora`='".$horaN."' WHERE `id_cita`='".$id."'";
      $resultadoexp = $conexion->query($cosultaexp);
      if($resultadoexp){
        actualizar();
      }
    }

   
    
?>