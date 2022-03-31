<?php

class Administrador
{

 
	public static function eliminar($id){
		$db=Db::getConnect();
		$delete=$db->prepare('call deleteUser(:id)');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}
 
?>