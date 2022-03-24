<?php
  require_once("C:/xampp\htdocs\hito2prog\Conexion.php");

  $conexion=Db::getConnect();
  
  $consulta = $conexion->query('call recorrerElemento();');

 
  
  function verificar($name){
    GLOBAL $consulta;
    foreach($fila= $consulta->fetchAll() as $con){
    if(strlen($name)<5){
      echo ("<p class='text-danger'>Nombre corto</p>");
    }elseif(strlen($name)>20){
      echo ("<p class='text-danger'>Nombre largo</p>");
    }
    elseif(strtoupper($name) == strtoupper($fila[$con])){
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