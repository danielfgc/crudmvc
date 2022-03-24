<?php
  require_once("../../Connection.php");

  $conexion=Db::getConnect();
  $consulta = $conexion->query('call recorrerElemento();');

  function verificarUser($name){
    GLOBAL $consulta;
    foreach($consulta->fetchAll() as $con){
      if(strlen($name)>5 && (strtoupper($name) != strtoupper($con[0])) && strlen($name)<20){
        return(true);
        break;
    }
}
  


}
function verificarContraseña($pass, $repass){
  return ($pass>6 && $pass<20)&&($pass===$repass);
}




  $contraseña = password_hash($_POST['nuevacontaseña'], PASSWORD_BCRYPT);
  function insertarUser(){
      GLOBAL $conexion;
      GLOBAL $contraseña;
      if((verificarUser($_POST['nuevousuario']))&&($_POST['email'] !="")&& verificarContraseña($_POST['nuevacontraseña'], $_POST['repetircontraseña']) && ($_POST['urlfoto']=! "" || $_POST['foto']=!"") && $_POST['respuesta'] != ""){
          $conexion ->query("call insertarUser(".$_POST['nuevousuario'].",".$_POST['email'].",". $contraseña.",". $_POST['urlfoto'].",". $_POST['pregunta'].",". $_POST['respuesta'].",". $_POST['foto'].");");
          echo "<script>window.alert('Se ha realizado el registro con éxito')</script>";
          header("Location: index.php");
      }else{
        echo "<p class='text-danger'>Uno o varios de los datos son erróneos.</p>";
      }
}

insertarUser();
 
