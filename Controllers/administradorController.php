<?php

class AdministradorController
{
	
	function __construct()
	{
		
	}
 
	function inicio(){
		require_once('Views/Administrador/inicio.php');
	}

	function save(){
		$Administrador= new Administrador(null, $_POST['username'],$_POST['contraseña'], $_POST['email']);
		Administrador::save($Administrador);
		$this->lista();
	}
 
	function lista(){
		$listaAdministradors=Administrador::all();
 
		require_once('Views/Administrador/lista.php');
	}
 
 
	function editar(){
		$Administrador = new Administrador(null, $_POST['username'],$_POST['contraseña'], $_POST['email']);
		Administrador::editar($Administrador);
		$this->lista();
	}
	function eliminar(){
		$id=$_GET['id'];
		Administrador::eliminar($id);
		$this->lista();
	}
 
 
	function error(){
		require_once('Views/Administrador/error.php');
	}
 
}