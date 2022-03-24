
<?php
  require_once("../../Connection.php");

  $conexion=Db::getConnect();
  
  $consulta = $conexion->query('call selectAll();');

 
  
  function login(){
    GLOBAL $consulta;
    $request_body = file_get_contents('php://input');
    $data = json_decode($request_body, true);
    foreach($consulta->fetchAll() as $con){
    if($data['usuario'] === $con[1] && password_verify($data['contraseña'], $con[3])){
        setcookie("username", $data['usuario'], time()+3600);
        setcookie("rol", $con[7], time()+3600);
      
        header("Location: index.php");
    }else{
        echo "<p class='text-danger'>Usuario o contraseña incorrectos.</p>";
        }
    }
  }

  

  login();