<?php

function verificarContraseña($pass, $repass){
    return  (strlen($pass)!=0)&&($pass  == $repass);
  }

function respuesta(){
    require_once("../../Connection.php");
    $conexion=Db::getConnect();
      $request_body = file_get_contents('php://input');
      $data = json_decode($request_body, true);
      $contraseña = password_hash($data['recucontra'], PASSWORD_BCRYPT);
      if(verificarContraseña($data['recucontra'],$data['reperecucontra'])){
        $conexion->query("call recuperarContraseña('".$data['user']."','".$contraseña."')");
        echo true;       
    }
}

respuesta();
