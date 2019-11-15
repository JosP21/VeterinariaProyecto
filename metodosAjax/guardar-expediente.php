<?php
include"../config/conexion.php";
if(!empty($_POST['val'])){
  $nombreE=$_POST['val'];
  $datos="";
  $cosultaP="SELECT * FROM `propietario` WHERE nombres='$nombreE'";
            $resultadoP = $conexion->query($cosultaP);
            if($resultadoP){
              if($fila = $resultadoP->fetch_object()){
                $datos=$fila->apellidos;
              }
            }else{
              echo "Sin Resultados";
            }
            echo $datos;
}
if(!empty($_POST['razaM'])){
  $razaM=$_POST['razaM'];
  $datos="";
  $cosultaP="SELECT raza.nombre as raza, especies.nombre as especie FROM raza INNER JOIN especies ON raza.id_especie = especies.id_especie where raza.nombre='$razaM'";
            $resultadoP = $conexion->query($cosultaP);
            if($resultadoP){
              if($fila = $resultadoP->fetch_object()){
                echo $fila->especie;
              }
            }else{
              echo "Sin Resultados";
            }
            echo "";
}
if(!empty($_POST['raza_mascotaf'])){
  $razaf=$_POST['raza_mascotaf'];
  $datos="";
  $cosultaP="SELECT raza.nombre as raza, especies.nombre as especie FROM raza INNER JOIN especies ON raza.id_especie = especies.id_especie where raza.nombre LIKE '$razaf%'";
            $resultadoP = $conexion->query($cosultaP);
            if($resultadoP){
              if($fila = $resultadoP->fetch_object()){
                echo $fila->especie;
              }
            }else{
              echo "Sin Resultados";
            }
            echo "";
}
if(!empty($_POST['valor']) && !empty($_POST['apellidoM']) && !empty($_POST['razaMas'])){
   $nombreM=$_POST['valor'];
   $apellidoM=$_POST['apellidoM'];
   $raza_Mascota=$_POST['razaMas'];
   $datos="A0";
   $cacaracterM=null;
   $numero=null;
   $letra=null;
   $cosultaP="SELECT
propietario.nombres AS propietario,
propietario.apellidos AS apelldio,
mascotas.nombre AS nombre,
raza.nombre AS raza,
especies.nombre AS especie,
mascotas.alias as alias
FROM
propietario
INNER JOIN mascotas ON mascotas.id_propietario = propietario.id_propietario
INNER JOIN raza ON mascotas.id_raza = raza.id_raza
INNER JOIN especies ON raza.id_especie = especies.id_especie
where mascotas.nombre LIKE '$nombreM%'";
            $resultadoP = $conexion->query($cosultaP);
            if($resultadoP){
              while($fila = $resultadoP->fetch_object()){
                if($fila->apelldio==$apellidoM  && $fila->raza==$raza_Mascota){
                  $al=$fila->alias;
                  $caracterM=substr($al, 0,1);
                  $numero=substr($al,1);
                  if(ord($caracterM)>=65 && ord($caracterM)<90){
                    if($numero>=0 && $numero<10){
                      $numero=$numero+1;
                    }else{
                      $caracterM=chr(ord($caracterM)+1);
                      $numero=0;
                    }
                  }else{
                    $caracterM="A";
                  }
                  $datos=$caracterM.$numero;
                }else{
                  $datos=$fila->alias;
                }
              }
            }
            echo $datos;
}
$fecha=isset($_POST['fecha']);
  if($fecha=='Fecha'){
    if(!empty($_POST['fechanacimiento'])){
      guardarExpediente($_POST['fechanacimiento'],$_POST['mascota'],$_POST['apellidomascota'], $_POST['nombrepropietario'],$_POST['razamascota'],$_POST['especiemascota'],$_POST['genero'],$_POST['corelativo']);
      return 0;
    }
  }
  if($fecha=='Edad'){
    if(empty($_POST['anio'])){
      $anio=0;
    }
    if(empty($_POST['mes'])){
      $meses=0;
    }
    if(empty($_POST['semana'])){
      $semana=0;
    }
    if(!empty($_POST['anio'])){
      $anio=$_POST['anio'];
    }
    if(!empty($_POST['mes']) ){
      $meses=$_POST['mes'];
    }
    if(!empty($_POST['semana'])){
      $semana=$_POST['semana'];
    }
    $fecha_actual = date("Y-m-d");
    $retarA=date("Y-m-d",strtotime($fecha_actual.-$anio." year"));
    $restarM=date("Y-m-d",strtotime($retarA.-$meses." month")); 
    $restarS=date("Y-m-d",strtotime($restarM.-$semana." week"));
    $fechanacimiento=$restarS;
    guardarExpediente($fechanacimiento,$_POST['mascota'],$_POST['apellidomascota'], $_POST['nombrepropietario'],$_POST['razamascota'],$_POST['especiemascota'],$_POST['genero'],$_POST['corelativo']);
    return 0;
  }

  function guardarExpediente($fechanacimiento,$nombremascota,$apellidomascota, $nombrepropietario,$razamascota,$especiemascota,$sexo,$corelativo){
    include"../config/conexion.php";
    if(!empty($nombremascota) && !empty($especiemascota) && !empty($nombrepropietario) && !empty($razamascota) && !empty($apellidomascota) && !empty($sexo) && !empty($corelativo)){
      $idespecie=null;
      $idraza=null;
      $idpropietario=null;
      $nombredemascota=null;
      $cosultaP="SELECT * FROM `especies` WHERE nombre='$especiemascota'";
      $resultadoP = $conexion->query($cosultaP);
      if($resultadoP){
       if($fila = $resultadoP->fetch_object()){
        $idespecie=$fila->id_especie;
      }
    }
      $consulta="INSERT INTO `especies` VALUES (null,'".$especiemascota."')";
      $resultado = $conexion->query($consulta);
        if ($resultado) {
          $cosultaE="SELECT * FROM `especies` WHERE nombre='$especiemascota'";
           $resultadoE = $conexion->query($cosultaE);
           if($resultadoE){
            if($fila = $resultadoE->fetch_object()){
              $idespecie=$fila->id_especie;
            }
          }
        }
    $cosultaR="SELECT * FROM `raza` WHERE nombre='$razamascota'";
      $resultadoR = $conexion->query($cosultaR);
      if($resultadoR){
       if($fila = $resultadoR->fetch_object()){
        $idraza=$fila->id_raza;
      }
    }
      $consultaRa="INSERT INTO `raza` VALUES (null,'".$razamascota."','".$idespecie."')";
      $resultadoRa = $conexion->query($consultaRa);
        if ($resultadoRa) {
          $cosultaE="SELECT * FROM `raza` WHERE nombre='$razamascota'";
           $resultadoE = $conexion->query($cosultaE);
           if($resultadoE){
            if($fila = $resultadoE->fetch_object()){
              $idraza=$fila->id_raza;
            }
          }
        }

    $cosultaPr="SELECT * FROM `propietario` WHERE nombres='$nombrepropietario'";
      $resultadoPr = $conexion->query($cosultaPr);
      if($resultadoPr){
       if($fila = $resultadoPr->fetch_object()){
        $idpropietario=$fila->id_propietario;
      }
    }
    $caracterP=substr($nombrepropietario, 0,1);
    $caracterM=substr($nombremascota, 0,1);
    $caracterR=substr($razamascota, 0,1);
    $caracterE=substr($especiemascota, 0,1);
    $numero_aleatorio=random_int(1000,9999);
    $nombredemascota=$nombremascota." ".$apellidomascota;
    $estado=true;

    $idexpediente=$caracterP.$caracterM.$caracterR.$caracterE.$numero_aleatorio;
    $guardarE="INSERT INTO `mascotas` VALUES ('".$idexpediente."','".$nombredemascota."','".$corelativo."','".$sexo."','".$fechanacimiento."','".$estado."','".$idraza."','".$idpropietario."')";
    $resultadoEx = $conexion->query($guardarE);
    if($resultadoEx){
     echo $idexpediente;
    }else{
      echo "ERROR";
    }
  }
  }
  if(!empty($_POST['exp'])){
      $id=$_POST['exp'];
      $result=$conexion->query("SELECT propietario.id_propietario as id, propietario.nombres as propietario, propietario.apellidos as apellido, propietario.sexo as sexo, propietario.direccion as direccion, propietario.telefono as telefono, mascotas.id_mascota as expediente, mascotas.nombre as mascota, mascotas.alias as alias,mascotas.sexo as sexomas, mascotas.fechanac as edad, raza.nombre as raza, especies.nombre as especie
        FROM
        propietario
        INNER JOIN mascotas ON mascotas.id_propietario = propietario.id_propietario
        INNER JOIN raza ON mascotas.id_raza = raza.id_raza
        INNER JOIN especies ON raza.id_especie = especies.id_especie where mascotas.id_mascota='$id'");
         if($result){
          if($fila = $result->fetch_object()){?>
            <div class="col-xs-12 col-sm-offset-0" style="margin-bottom: 2%;">
    <div class="title-flat-form title-flat-blue">Modificar</div>
    <form id="frmexpediente" name="frmexpediente" method="post" action="">
      <input type='hidden' name='idexpe' id='idexpe' value='<?php echo $fila->expediente?>'>
      <input type='hidden' name='idpropietario' id='idpropietario' value='<?php echo $fila->id?>'>
        <div class="row">
            <div style="margin-left: 6%;/*! margin-right: -20%; */" class="col-sm-6 col-sm-offset-0">
                <div class="group-material" style="margin-right: 15%;">
                    <input type="text" name="nombrepro" id="nombreprop" class="material-control tooltips-general" placeholder="Juan" required="" data-min-length="1" autocomplete="off" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras" value="<?php echo $fila->propietario?>">
                    <label>Nombre</label>
                </div>
            </div>
            <div class="col-sm-5 col-sm-offset-0">
                <div class="group-material">
                    <input type="text" name="apellidoprop" id="apellidoprop" class="material-control tooltips-general" placeholder="Perez" data-min-length="1" data-toggle="tooltip" autocomplete="off" data-placement="top" title="" onkeypress="return sololetras(event);" onblur="add();" data-original-title="Solo letras" value="<?php echo $fila->apellido?>">
                    <label>Apellido</label>
                </div>
            </div>
            <div style="margin-top: -2%;" class="col-sm-6 col-sm-offset-1">
                <fieldset style="margin-right: 11%;">
                    <legend>Sexo</legend>
                    <div style="">
                        <center>
                            <div class="contenedorad">
                                <div class="radio">
                                    <input type="radio" name="genero" id="masculino" value="Masculino" <?php if($fila->sexo == "Masculino") echo "checked"?> >
                                    <label for="masculino">Masculino</label>
                                    <input type="radio" name="genero" id="femenino" value="Femenino" <?php if($fila->sexo == "Femenino") echo "checked"?>>
                                    <label for="femenino">Femenino</label>
                                </div>
                            </div>
                        </center>
                    </div>
                </fieldset>
            </div>
            <div style="margin-left: -1%;margin-top: 2%;" class="col-sm-5 col-sm-offset-0">
                <div class="group-material">
                    <input type="text" name="telefonopro" id="telefonopro" class="material-control tooltips-general" placeholder="7777-7777" required="" data-min-length="1" maxlength="8" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return solonumero(event);" data-original-title="Solo numeros" value="<?php echo $fila->telefono?>">
                    <label>Telefono</label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-1 col-sm-offset-1" style="margin-left: 6%;margin-top: -2%;">
                <label style="color: #53a5b4;font-weight: bold;">Direccion</label>
            </div>
            <div style="margin-left: 6%;margin-bottom: 3%;" class="col-xs-12  col-sm-offset-0">
                <div class="group-material" style="margin-bottom: 2%;margin-right: 5%;width: 88%;">
                    <textarea id="direccionpro" name="direccionpro" type="text" class="material-control tooltips-general" placeholder="OS5969696" required="" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" style="width: 102%; height: 1%;" data-original-title="Solo letras"><?php echo $fila->direccion?></textarea>
                </div>
            </div>
            <div style="margin-left: 6%;" class="col-sm-3 col-sm-offset-0">
                        <div class="group-material">
                                    <input type="text" name="razamascota" id="razamascota" class="material-control tooltips-general" placeholder="Fox Hound" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras" value="<?php echo $fila->raza?>" style="pointer-events: none;">
                                <label>Raza</label>
                            </div></div>
                            <div style="margin-left: -2%;" class="col-sm-3 col-xs-offset-0">
                        <div class="group-material" id="filtroespecie" style="width: 70%;">
                                    <input type="text" name="especiemascota" id="especiemascota" class="material-control tooltips-general" placeholder="Canina" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras" value="<?php echo $fila->especie?>" style="pointer-events: none;" >
                                <label>Especie</label>
                            </div></div>
                            <div style="margin-left: -4.5%;" class="col-sm-3 col-sm-offset-1">
                        <div class="group-material">
                                    <input type="text" name="mascota" id="mascota" class="material-control tooltips-general" placeholder="Osito" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras" onkeyup="filtrar();" value="<?php $cadena= explode(' ',trim($fila->mascota)); echo $cadena[0]?>">
                                <label>Mascota</label>
                            </div></div>
                            <div style="margin-left: -3.5%;" class="col-sm-2 col-sm-offset-0">
                        <div class="group-material">
                                    <input type="text" name="corelativo" id="corelativo" class="material-control tooltips-general" placeholder="A0" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras" style="pointer-events: none;width: 55%;" value="<?php echo $fila->alias?>">
                            </div></div>
                            <div style="margin-left: -9%;" class="col-sm-2">
                        <div class="group-material">
                                    <input type="text" name="apellidomas" id="apellidomas" class="material-control tooltips-general" placeholder="Perez" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras" style="pointer-events: none;" value="<?php echo $fila->apellido?>">
                            </div></div>
                            <div style="margin-bottom: -10%;margin-left: 6.5%;" class="col-sm-5 col-sm-offset-1">
  <div class="group-material">
    <input type="date" name="fechanacimiento" id="fechanacimiento" class="material-control tooltips-general" placeholder="8/04/2019" data-min-length="1" max="2019-10-20" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="" value="<?php echo $fila->edad?>" style="pointer-events: none;">
    <label>Fecha de Nacimiento</label>
    </div>
</div>
                            <div style="margin-top: -3%;margin-left: 1%;" class="col-sm-6 col-sm-offset-0">
                                <div class="group-material" style="margin-right: 8%;margin-top: 6%;">
                    <input type="text" name="sexo" id="sexo" class="material-control tooltips-general" placeholder="Juan" required="" data-min-length="1" autocomplete="off" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras" value="<?php echo $fila->sexomas?>" style="pointer-events: none;">
                    <label>Genero</label>
                </div>
                            </div>
        </div>
    </form>

</div>
            <?php
          }
      }
    }

    if(!empty($_POST['idexpe']) && !empty($_POST['idpropietario']) && !empty($_POST['nombrepro']) && !empty($_POST['apellidoprop']) && !empty($_POST['genero']) && !empty($_POST['direccionpro']) && !empty($_POST['razamascota']) && !empty($_POST['especiemascota']) && !empty($_POST['mascota']) && !empty($_POST['corelativo']) && !empty($_POST['apellidomas']) && !empty($_POST['fechanacimiento']) && !empty($_POST['sexo']) && !empty($_POST['telefonopro'])){
      $idprop=$_POST['idpropietario'];
      $idexp=$_POST['idexpe'];
      $nombrepro=$_POST['nombrepro'];
      $apellidopro=$_POST['apellidoprop'];
      $apellidomas=$_POST['apellidomas'];
      $direccion=$_POST['direccionpro'];
      $tele=$_POST['telefonopro'];
      $sexopro=$_POST['genero'];
      $mascota=$_POST['mascota'];
      $alias=$_POST['corelativo'];
      $telefon=null;
      if(strlen($tele)==9){
        $telefon=$tele;
      }else{
        $telefon=substr($tele, 0,4)."-".substr($tele, 4,4);
      }
      $nombremasco=$mascota." ".$apellidomas;
      $cosulta="UPDATE `propietario` SET `nombres`='".$nombrepro."',`apellidos`='".$apellidopro."',`sexo`='".$sexopro."',`direccion`='".$direccion."',`telefono`='".$telefon."' WHERE `id_propietario`='".$idprop."'";
      $resultado = $conexion->query($cosulta);
      if($resultado){
      $cosultaexp="UPDATE `mascotas` SET `nombre`='".$nombremasco."',`alias`='".$alias."',`id_propietario`='".$idprop."' WHERE `id_mascota`='".$idexp."'";
      $resultadoexp = $conexion->query($cosultaexp);
      if($resultadoexp){
        actualizar();
      }
      }
    }

    if(!empty($_POST['ExpedienteEli'])){
      $id=$_POST['ExpedienteEli'];
      $result=$conexion->query("DELETE FROM `mascotas` WHERE `id_mascota`='".$id."'");
      if($result){
        actualizar();
      } 
    }
    function actualizar(){
      include"../config/conexion.php";
      include"../metodosAjax/filtrarfecha.php";
         $result=$conexion->query("SELECT mascotas.id_mascota as expediente,propietario.nombres as nombre,propietario.apellidos as apellido,mascotas.nombre as mascota,mascotas.alias as alias,raza.nombre as raza,especies.nombre as especie,mascotas.fechanac as edad,mascotas.sexo as sexo
           FROM propietario
           INNER JOIN mascotas ON mascotas.id_propietario = propietario.id_propietario
           INNER JOIN raza ON mascotas.id_raza = raza.id_raza
           INNER JOIN especies ON raza.id_especie = especies.id_especie");
            if($result){?>
                                <thead>
                                <tr>
                                    <th>Num. Expediente</th>
                                    <th>Propietario</th>
                                    <th>Nombre de Mascota</th>
                                    <th>Raza</th>
                                    <th>Especie</th>
                                    <th>Edad</th>
                                    <th>Sexo Mascota</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                          <?php
                                while($fila = $result->fetch_object()){
                          ?>
                                <tr>
                                        <td>
                                            <?php echo $fila->expediente ?>
                                        </td>
                                        <td>
                                            <?php echo $fila->nombre." ".$fila->apellido?>
                                        </td>
                                        <td>
                                            <?php 
                                $cadena=explode(' ',trim($fila->mascota));
                                echo $cadena[0]." ".$fila->alias." ".$cadena[1]
                                ?>
                                        </td>
                                        <td>
                                            <?php echo $fila->raza?>
                                        </td>
                                        <td>
                                            <?php echo $fila->especie?>
                                        </td>
                                        <td>
                                            <?php
                                $tiempo = tiempo_transcurrido(date("d-m-Y", strtotime($fila->edad)), date("d-m-Y"));
                                if($tiempo[0]==0 && $tiempo[1]==0 && $tiempo[2]==0){
                                    echo "Nacio Hoy";
                                }
                                if($tiempo[0]==0){
                                    $anio="";
                                }
                                if($tiempo[1]==0){
                                    $meses="";
                                }
                                if($tiempo[2]==0){
                                    $dias="";
                                }
                                if($tiempo[0]!=0){
                                    $anio="$tiempo[0] años, ";
                                }
                                if($tiempo[1]!=0){
                                    $meses="$tiempo[1] meses, ";
                                }
                                if($tiempo[2]!=0){
                                    $dias="$tiempo[2] dias";
                                }
                                echo $anio.$meses.$dias;
                                ?>
                                        </td>
                                        <td>
                                            <?php echo $fila->sexo?>
                                        </td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#modificarExpe" class="material-control tooltips-general" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Editar" onclick="editarE(<?php echo " '".$fila->expediente."' "?>)">
                                                <i class="zmdi zmdi-edit" style="color: #31920D;">
                                        </i>
                                            </a>
                                            &nbsp;&nbsp;
                                            <a href="#" class="material-control tooltips-general" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="eliminar(<?php echo " "?>)">
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
