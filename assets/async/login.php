
<?php
 

 
  
  function login(){
    require_once("../../Connection.php");
    $conexion=Db::getConnect();
    $request_body = file_get_contents('php://input');
    $data = json_decode($request_body, true);
    $consulta = $conexion->query('call selectUser("'.$data['usuario'].'");');
    foreach($consulta->fetchAll() as $con){
    if($data['usuario'] == $con[0] && password_verify($data['contraseña'], $con[1])){
        $jayson = json_encode(['usuario'=>$data['usuario'],'rol'=>$con[2]]);
        echo $jayson;
        break;
    }
    }
  }


  login();