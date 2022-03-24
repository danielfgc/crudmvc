<?php

class Usuario
{
	private $id;
	private $username;
	private $contraseña;
	private $email;
	private $urlfoto;
	private $pregunta;
	private $respuesta;
	private $idrol;
	private $binfoto;
 
	
	function __construct($id, $username, $email,$contraseña,$urlfoto,$pregunta,$respuesta,$idrol,$binfoto)
	{
		$this->setId($id);
		$this->setusername($username);
		$this->setcontraseña($contraseña);
		$this->setemail($email);		
		$this->seturlfoto($urlfoto);
		$this->setpregunta($pregunta);
		$this->setrespuesta($respuesta);
		$this->setidrol($idrol);
		$this->setbinfoto($binfoto);
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
	public function setemail($email){
		
		$this->email=$email;
}
public function getemail(){

	return $this->email;
}
 
	public function geturlfoto(){
 
		return $this->urlfoto;
	}
 
	public function seturlfoto($urlfoto){
		
			$this->urlfoto=$urlfoto;
	}
	public function getpregunta(){
 
		return $this->pregunta;
	}
 
	public function setpregunta($pregunta){
		
			$this->pregunta=$pregunta;
	}
	public function getrespuesta(){
 
		return $this->respuesta;
	}
 
	public function setrespuesta($respuesta){
		
			$this->respuesta=$respuesta;
	}
	public function getidrol(){
 
		return $this->idrol;
	}
 
	public function setidrol($idrol){
		
			$this->idrol=$idrol;
	}
	public function getbinfoto(){
 
		return $this->binfoto;
	}
 
	public function setbinfoto($binfoto){
		
			$this->binfoto=$binfoto;
	}

 
	public static function save($Usuario){
		$db=Db::getConnect();
		//var_dump($Usuario);
		//die();
		
 
		$insert=$db->prepare('call insertarUsuario (NULL, :username,:email,:contraseña,:urlfoto,:pregunta,:respuesta,:binfoto, :id)');
		$insert->bindValue('username',$Usuario->getusername());
		$insert->bindValue('contraseña',$Usuario->getcontraseña());
		$insert->bindValue('email',$Usuario->getemail());
		$insert->bindValue('id',$Usuario->getId());
		$insert->bindValue('urlfoto',$Usuario->geturlfoto());
		$insert->bindValue('pregunta',$Usuario->getpregunta());
		$insert->bindValue('respuesta',$Usuario->getrespuesta());
		$insert->bindValue('binfoto',$Usuario->getbinfoto());
		$insert->execute();
	}
 
	public static function all(){
		$db=Db::getConnect();
		$listaUsuarios=[];
 
		$select=$db->query('');
 
		foreach($select->fetchAll() as $Usuario){
			$listaUsuarios[]=new Usuario($Usuario['id'],$Usuario['username'],$Usuario['email'],$Usuario['contraseña'],$Usuario['urlfoto'],$Usuario['pregunta'],$Usuario['respuesta'],$Usuario['idrol'],$Usuario['binfoto']);
		}
		return $listaUsuarios;
	}
 
	public static function searchById($id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM Usuario WHERE id=:id');
		$select->bindValue('id',$id);
		$select->execute();
 
		$UsuarioDb=$select->fetch();
 
 
		$Usuario = new Usuario ($UsuarioDb['id'],$UsuarioDb['username'], $UsuarioDb['email'], $UsuarioDb['contraseña'],$UsuarioDb['urlfoto'],$UsuarioDb['pregunta'],$UsuarioDb['respuesta'],$UsuarioDb['idrol'],$UsuarioDb['binfoto']);
		//var_dump($Usuario);
		//die();
		return $Usuario;
 
	}
 
	public static function update($Usuario){
		$db=Db::getConnect();
		$update=$db->prepare('call updateUser(:username, :email, :contraseña,:urlfoto,:pregunta,:respuesta,:binfoto, :id)');
		$update->bindValue('username', $Usuario->getusername());
		$update->bindValue('contraseña',$Usuario->getcontraseña());
		$update->bindValue('email',$Usuario->getemail());
		$update->bindValue('id',$Usuario->getId());
		$update->bindValue('urlfoto',$Usuario->geturlfoto());
		$update->bindValue('pregunta',$Usuario->getpregunta());
		$update->bindValue('respuesta',$Usuario->getrespuesta());
		$update->bindValue('binfoto',$Usuario->getbinfoto());
		$update->execute();
	}
 
	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('call deleteUser(:id)');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}

 
?>