<?php
include"../config/conexion.php";
      $nombrepro=$_POST['nombrepro'];
      $apellidopro=$_POST['apellidopro'];
      $direccionpro=$_POST['direccionpro'];
      $telefonopro=$_POST['telefonopro'];
      $genero=$_POST['genero'];
        $consulta="INSERT INTO `propietario` VALUES (null,'".$nombrepro."','".$apellidopro."','".$genero."','".$direccionpro."','".$telefonopro."')";
        $resultado = $conexion->query($consulta);
        $datos="";
        if ($resultado) {
          $cosultaP="SELECT * FROM `propietario` WHERE nombres='$nombrepro'";
            $resultadoP = $conexion->query($cosultaP);
            if($resultadoP){
              if($fila = $resultadoP->fetch_object()){
                $datos = $fila->nombres.$fila->apellidos;
              }
            }
        }
        echo $datos; 
      
?>
