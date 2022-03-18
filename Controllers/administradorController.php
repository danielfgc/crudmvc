<?php

class AdministradorController
{
	
	function __construct()
	{
		
	}
 
	function index(){
		require_once('Views/Administrador/bienvenido.php');
	}

	function save(){
		$Administrador= new Administrador(null, $_POST['username'],$_POST['contraseña'], $_POST['email']);
		Administrador::save($Administrador);
		$this->show();
	}
 
	function show(){
		$listaAdministradors=Administrador::all();
 
		require_once('Views/Administrador/show.php');
	}
 
 
	function update(){
		$Administrador = new Administrador(null, $_POST['username'],$_POST['contraseña'], $_POST['email']);
		Administrador::update($Administrador);
		$this->show();
	}
	function delete(){
		$id=$_GET['id'];
		Administrador::delete($id);
		$this->show();
	}
 
 
	function error(){
		require_once('Views/Administrador/error.php');
	}
 
}