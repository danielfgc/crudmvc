<?php


  function verificarUser($name){
    require_once("../../Connection.php");
    $conexion=Db::getConnect();
    $consulta = $conexion->prepare('call verificarUser(:user);');
    $consulta->bindParam('user',$name);
    $consulta->execute();
    $verificar = $consulta->fetch();
    return !$verificar;
}

function verificarContraseña($pass, $repass){
  return  ($pass  == $repass);
}




  
  function updateUser(){
    require_once("../../Connection.php");
    $conexion=Db::getConnect();
      $request_body = file_get_contents('php://input');
      $data = json_decode($request_body, true);
      $contraseña = password_hash($data['nuevacontraseña'], PASSWORD_BCRYPT);
      if(verificarUser($data['nuevousuario'])&& verificarContraseña($data['nuevacontraseña'],$data['repetircontraseña'])){
          $conexion ->query('CALL updateUser("'.$data['nuevousuario'].'","'.$data['email'].'","'. $contraseña.'","'. $data['urlfoto'].'","'. $data['pregunta'].'","'. $data['respuesta'].'",'. intval($data['iduser']).','.intval($data['rol']).');');
          echo "Usuario actualizado";
          
      }else{
        echo "<p class='text-danger'>Uno o varios campos erróneos</p>";
      }
}

updateUser();
 