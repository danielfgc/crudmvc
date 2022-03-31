<?php

class Usuario
{

 
	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('call deleteUser(:id)');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}

 
?>