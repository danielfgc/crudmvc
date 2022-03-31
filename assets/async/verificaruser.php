<?php

function verificarUser($name){
    require_once("../../Connection.php");
    $conexion=Db::getConnect();
    $consulta = $conexion->prepare('call verificarUser(:user);');
    $consulta->bindParam('user',$name);
    $consulta->execute();
    $verificar = $consulta->fetch();
    return $verificar;
}

function respuesta(){
    require_once("../../Connection.php");
    $conexion=Db::getConnect();
    $request_body = file_get_contents('php://input');
    $data = json_decode($request_body, true);
    $consulta = $conexion->query("call preguntaRespuesta('".$data['recuperaruser']."');");
    $modal= "#respuestarecu";
    foreach($consulta->fetchAll() as $fila){
    if (verificarUser($data['recuperaruser'])){
        $jayson = json_encode(['modal'=>$modal,'pregunta'=>$fila[0], 'user'=>$data['recuperaruser']]);
        echo $jayson;
        break;
        
    }
}

}
respuesta();
