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
		$Administrador= new Administrador(null, $_POST['username'],$_POST['email'], $_POST['contraseña'],$_POST['urlfoto'],$_POST['pregunta'],$_POST['respuesta'],$_POST['idrol'],$_POST['binfoto']);
		Administrador::save($Administrador);
		$this->lista();
	}
 
	function lista(){
		require_once('Views/Administrador/lista.php');
	}
 
 
	function editar(){
		$Administrador = new Administrador(null, $_POST['username'], $_POST['email'],$_POST['contraseña'],$_POST['urlfoto'],$_POST['pregunta'],$_POST['respuesta'],$_POST['idrol'],$_POST['binfoto']);
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