<?php
include"../config/conexion.php";

if (!empty($_POST['nombres']) && !empty($_POST['precios'])){
  $nombre=$_POST['nombres'];
  $precio=$_POST['precios'];
  $idS=$_POST['idprov'];
 $accion="Modificar";
        $fecha = date("Y-m-d");
        $mot=$_POST['motivo'];

  if (!empty($nombre)) {
    $cosulta="UPDATE `servicios` SET `nombre`='".$nombre."',`precio`='".$precio."' where id_servicio='".$idS."'";
  }else{
    $cosulta="UPDATE `servicios` SET `nombre`='".$nombre."',`precio`='".$precio."' where id_servicio='".$idS."'";
  }
  $resultado = $conexion->query($cosulta);
  if($resultado){
     $consult="INSERT INTO `bitservicios`(`id_bitServicio`, `servicio`, `precio`, `fecha_realizacion`, `motivo`, `accion`) VALUES (null,'".$nombre."','".$precio."','".$fecha."','".$mot."','".$accion."')";
                    $resul = $conexion->query($consult);
    $result=$conexion->query("SELECT
servicios.id_servicio as id,
servicios.nombre as nombre,
servicios.precio as precio
FROM
servicios");
    if($result){

      echo "<thead>
      <tr>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Acciones</th>
      </tr>
      </thead>
      <tbody>";
      while($fila = $result->fetch_object()){

        echo "<tr>
        <td>$fila->nombre</td>
        <td>$fila->precio</td>
        <td>
        <button type='button' href='#' data-toggle= 'modal' data-target= '#modificarServicio' class='material-control tooltips-general' required='' maxlength='50' data-toggle='tooltip' data-placement='top' title='Editar' onclick='editar($fila->id)'>
        <i class='zmdi zmdi-edit' style='color: #31920D;'>
        </i>
        </button>
        &nbsp;&nbsp;
        <button type='button' class='material-control tooltips-general' required='' maxlength='50' data-toggle='tooltip' data-placement='top' title='Eliminar' onclick='eliminar($fila->id);'>
        <i class='zmdi zmdi-delete' style='color: #F91D0B;'>
        </i>
        </button>
        &nbsp;&nbsp;

        </td>
        </tr>";
      }
      echo "</tbody>";
    }
  }
}else if(!empty($_POST['valor'])){
  $id= $_POST['valor'];
  $fecha = date("Y-m-d");
        $mot=$_POST['motivo'];
        $accion="Eliminar";
        $cosulta="SELECT
servicios.nombre as n,
servicios.precio as p
FROM
servicios where servicios.id_servicio='".$id."'";
            $resultado = $conexion->query($cosulta);
            if($resultado){
              if($fila = $resultado->fetch_object()){
                $consult="INSERT INTO `bitservicios`(`id_bitServicio`, `servicio`, `precio`, `fecha_realizacion`, `motivo`, `accion`) VALUES (null,'".$fila->n."','".$fila->p."','".$fecha."','".$mot."','".$accion."')";
                    $resul = $conexion->query($consult);
              }
        }
  $result=$conexion->query("DELETE FROM `servicios` WHERE id_servicio='".$id."'");
  if($result){
    $resulta=$conexion->query("SELECT
servicios.id_servicio as id,
servicios.nombre as nombre,
servicios.precio as precio
FROM
servicios");
    if($resulta){
      echo "<thead>
      <tr>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Acciones</th>
      </tr>
      </thead>
      <tbody>";
      while($fila = $resulta->fetch_object()){
        echo "<tr>
        <td>$fila->nombre</td>
        <td>$fila->precio</td>
        <td>
        <button data-toggle= 'modal' data-target= '#modificarServicio' class='material-control tooltips-general' required='' maxlength='50' data-toggle='tooltip' data-placement='top' title='Editar' onclick='editar($fila->id)'>
        <i class='zmdi zmdi-edit' style='color: #31920D;'>
        </i>
        </button>
        &nbsp;&nbsp;
        <button class='material-control tooltips-general' required='' maxlength='50' data-toggle='tooltip' data-placement='top' title='Eliminar' onclick='eliminar($fila->id)'>
        <i class='zmdi zmdi-delete' style='color: #F91D0B;'>
        </i>
        </button>
        &nbsp;&nbsp;

        </td>
        </tr>";
      }
      echo "</tbody>";
    }
  }
}else if(!empty($_POST['val'])){        //Editar
  $id=$_POST['val'];
  $result=$conexion->query("SELECT
servicios.id_servicio as id,
servicios.nombre as nombre,
servicios.precio as precio
FROM
servicios
    WHERE id_servicio='$id'");
  if($result){
    if($fila = $result->fetch_object()){

     
      echo "<div class='container-fluid' style='margin: 20px 0;'></div>

      <form id='frmumodificar' name='frmumodificar' method='post' action=''>
      <input type='hidden' name='idprov' id='idprov' value='$id'>

      <div class='col-xs-4 col-sm-5 col-sm-offset-1'>
      <div class='group-material'>
       <div style='width: 100%;float:left;'>
      <input value='$fila->nombre' id='nombres' name='nombres' type='text' class='material-control tooltips-general' placeholder='Servicio' required='' data-toggle='tooltip' data-placement='top' title='Solo letras' onkeypress='return sololetras(event);' >
      <label style='margin-left: 0%;'>Nombre</label>       
      </div>
      </div>
      </div>
   
   <div class='col-xs-4 col-sm-5 col-sm-offset-1'>
      <div class='group-material'>
      <input value='$fila->precio' id='precios' name='precios' type='text' class='material-control tooltips-general' placeholder='' required='' data-toggle='tooltip' data-placement='top' title='Solo numeros'  onkeypress='return solonumero(event);' data-original-title=''>
      <label style='margin-left: 0%;'>Precio</label>       
      </div>
      </div>

     
      </form>";

    }
  }
} 
?>
