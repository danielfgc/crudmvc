<?php

class Administrador
{
	private $id;
	private $username;
	private $contraseña;
	private $email;
 
	
	function __construct($id, $username,$contraseña, $email)
	{
		$this->setId($id);
		$this->setusername($username);
		$this->setcontraseña($contraseña);
		$this->setemail($email);		
	}
 
	public function getId(){
		return $this->id;
	}
 
	public function setId($id){
		$this->id = $id;
	}
 
	public function getusername(){
		return $this->username;
	}
 
	public function setusername($username){
		$this->username = $username;
	}
 
	public function getcontraseña(){
		return $this->contraseña;
	}
 
	public function setcontraseña($contraseña){
		$this->contraseña = $contraseña;
	}
 
	public function getemail(){
 
		return $this->email;
	}
 
	public function setemail($email){
		
	
			$this->email=$email;

 
	}
 
	public static function save($Administrador){
		$db=Db::getConnect();
		//var_dump($Administrador);
		//die();
		
 
		$insert=$db->prepare('call insertarAdministrador (NULL, :username,:contraseña,:email)');
		$insert->bindValue('username',$Administrador->getusername());
		$insert->bindValue('contraseña',$Administrador->getcontraseña());
		$insert->bindValue('email',$Administrador->getemail());
		$insert->execute();
	}
 
	public static function all(){
		$db=Db::getConnect();
		$listaAdministradors=[];
 
		$select=$db->query('SELECT * FROM Administrador order by id');
 
		foreach($select->fetchAll() as $Administrador){
			$listaAdministradors[]=new Administrador($Administrador['id'],$Administrador['username'],$Administrador['contraseña'],$Administrador['email']);
		}
		return $listaAdministradors;
	}
 
	public static function searchById($id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM Administrador WHERE id=:id');
		$select->bindValue('id',$id);
		$select->execute();
 
		$AdministradorDb=$select->fetch();
 
 
		$Administrador = new Administrador ($AdministradorDb['id'],$AdministradorDb['username'], $AdministradorDb['contraseña'], $AdministradorDb['email']);
		//var_dump($Administrador);
		//die();
		return $Administrador;
 
	}
 
	public static function update($Administrador){
		$db=Db::getConnect();
		$update=$db->prepare('call actualizarAdministrador(:username, :contraseña, :email,)');
		$update->bindValue('username', $Administrador->getusername());
		$update->bindValue('contraseña',$Administrador->getcontraseña());
		$update->bindValue('email',$Administrador->getemail());
		$update->bindValue('id',$Administrador->getId());
		$update->execute();
	}
 
	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('call eliminarAdministrador(:id)');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}
 
?>