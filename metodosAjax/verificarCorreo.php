<?php 
include"../config/conexion.php";
if(!empty($_REQUEST['val'])){
  $correo=$_REQUEST['val'];

  $cosultaP="SELECT * FROM usuarios WHERE correoElectronico='$correo'";
            $resultadoP = $conexion->query($cosultaP);
            if(mysqli_num_rows($resultadoP)>0){
              echo "si";
              }else{
              echo "no";
            }
}

?>