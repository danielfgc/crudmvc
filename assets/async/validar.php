<?php
  require_once("../../Connection.php");

  $conexion=Db::getConnect();
  
  $consulta = $conexion->query('call recorrerElemento();');

 
  
  function verificar($name){
    GLOBAL $consulta;
    foreach($consulta->fetchAll() as $con){
    if(strlen($name)<5){
      echo ("<p class='text-danger'>Nombre corto</p>");
    }elseif(strlen($name)>20){
      echo ("<p class='text-danger'>Nombre largo</p>");
    }
    elseif(strtoupper($name) == strtoupper($con[0])){
    echo "<p class='text-danger'>Nombre no disponible</p>";
    break;
    }else{
      echo "<p class='text-success'>Nombre disponible</p>";
    } 
    }
 
}
$nombre = $_GET['nuevousuario'];
  

  verificar($nombre);


?>