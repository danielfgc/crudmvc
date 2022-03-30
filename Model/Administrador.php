<?php

class Administrador
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
 
	
	function __construct($id, $username,$email, $contraseña,$urlfoto,$pregunta,$respuesta,$idrol,$binfoto)
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
 
	public function getemail(){
 
		return $this->email;
	}
 
	public function setemail($email){
		
	
			$this->email=$email;

 
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
 
	public static function save($Administrador){
		$db=Db::getConnect();
		//var_dump($Administrador);
		//die();
		
 
		$insert=$db->prepare('call insertarUser(:username,:email,:contraseña, :urlfoto,:pregunta,:respuesta,:binfoto, :id)');
		$insert->bindValue('username',$Administrador->getusername());
		$insert->bindValue('contraseña',$Administrador->getcontraseña());
		$insert->bindValue('email',$Administrador->getemail());
		$insert->bindValue('urlfoto',$Administrador->geturlfoto());
		$insert->bindValue('pregunta',$Administrador->getpregunta());
		$insert->bindValue('respuesta',$Administrador->getrespuesta());
		$insert->bindValue('binfoto',$Administrador->getbinfoto());
		$insert->bindValue('id',$Administrador->getId());
		$insert->execute();
	}
	
	public static function all(){
		$db=Db::getConnect();
		$listaAdministradors=[];
 
		$select=$db->query('call selectAll();');
 
		foreach($select->fetchAll() as $Administrador){
			$listaAdministradors[]=new Administrador($Administrador['id'],$Administrador['username'],$Administrador['email'],$Administrador['contraseña'],$Administrador['urlfoto'],$Administrador['pregunta'],$Administrador['respuesta'],$Administrador['idrol'],$Administrador['binfoto']);
		}
		return $listaAdministradors;
	}

 
	public static function update($Administrador){
		$db=Db::getConnect();
		$update=$db->prepare('call updateUser(:username, :email, :contraseña, :urlfoto,:pregunta,:respuesta,:binfoto, :id)');
		$update->bindValue('id',$Administrador->getId());
		$update->bindValue('username', $Administrador->getusername());
		$update->bindValue('contraseña',$Administrador->getcontraseña());
		$update->bindValue('email',$Administrador->getemail());
		$update->bindValue('id',$Administrador->getId());
		$update->bindValue('urlfoto',$Administrador->geturlfoto());
		$update->bindValue('pregunta',$Administrador->getpregunta());
		$update->bindValue('respuesta',$Administrador->getrespuesta());
		$update->bindValue('binfoto',$Administrador->getbinfoto());
		
		$update->execute();
	}
 
	public static function eliminar($id){
		$db=Db::getConnect();
		$delete=$db->prepare('call deleteUser(:id)');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}
 
?>