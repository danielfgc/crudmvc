<?php
  require_once("../../Connection.php");

  $conexion=Db::getConnect();
  $consulta = $conexion->query('call selectAll();');

  function verificarUser($name){
    GLOBAL $consulta;
    foreach($consulta->fetchAll() as $con){
      if(strlen($name)>5 && (strtoupper($name) != strtoupper($con[1])) && strlen($name)<20){
        return(true);
        break;
    }
}
  


}
function verificarContraseña($pass, $repass){
  return ($pass>6 && $pass<20)&&($pass===$repass);
}




  $contraseña = password_hash($data['nuevacontaseña'], PASSWORD_BCRYPT);
  function insertarUser(){
      GLOBAL $conexion;
      GLOBAL $contraseña;
      $request_body = file_get_contents('php://input');
      $data = json_decode($request_body, true);
      if((verificarUser($data['nuevousuario']))&& verificarContraseña($data['nuevacontraseña'], $data['repetircontraseña']) ){
          $conexion ->query("call updateUser(".$data['nuevousuario'].",".$data['email'].",". $contraseña.",". $data['urlfoto'].",". $data['pregunta'].",". $data['respuesta'].",". $data['foto']."".$_GET['iduser'].");");
          echo "<script>window.alert('Se ha realizado el registro con éxito')</script>";
          header("Location: index.php");
      }else{
        echo "<p class='text-danger'>Uno o varios de los datos son erróneos.</p>";
      }
}

insertarUser();
 