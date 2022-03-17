<?php

class Usuario
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
		
		if (strcmp($email, 'on')==0) {
			$this->email=1;
		} elseif(strcmp($email, '1')==0) {
			$this->email='checked';
		}elseif (strcmp($email, '0')==0) {
			$this->email='of';
		}else {
			$this->email=0;
		}
 
	}
 
	public static function save($Usuario){
		$db=Db::getConnect();
		//var_dump($Usuario);
		//die();
		
 
		$insert=$db->prepare('INSERT INTO Usuario VALUES (NULL, :username,:contraseña,:email)');
		$insert->bindValue('username',$Usuario->getusername());
		$insert->bindValue('contraseña',$Usuario->getcontraseña());
		$insert->bindValue('email',$Usuario->getemail());
		$insert->execute();
	}
 
	public static function all(){
		$db=Db::getConnect();
		$listaUsuarios=[];
 
		$select=$db->query('SELECT * FROM Usuario order by id');
 
		foreach($select->fetchAll() as $Usuario){
			$listaUsuarios[]=new Usuario($Usuario['id'],$Usuario['username'],$Usuario['contraseña'],$Usuario['email']);
		}
		return $listaUsuarios;
	}
 
	public static function searchById($id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM Usuario WHERE id=:id');
		$select->bindValue('id',$id);
		$select->execute();
 
		$UsuarioDb=$select->fetch();
 
 
		$Usuario = new Usuario ($UsuarioDb['id'],$UsuarioDb['username'], $UsuarioDb['contraseña'], $UsuarioDb['email']);
		//var_dump($Usuario);
		//die();
		return $Usuario;
 
	}
 
	public static function update($Usuario){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE Usuario SET username=:username, contraseña=:contraseña, email=:email WHERE id=:id');
		$update->bindValue('username', $Usuario->getusername());
		$update->bindValue('contraseña',$Usuario->getcontraseña());
		$update->bindValue('email',$Usuario->getemail());
		$update->bindValue('id',$Usuario->getId());
		$update->execute();
	}
 
	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM Usuario WHERE id=:id');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}
 
?>