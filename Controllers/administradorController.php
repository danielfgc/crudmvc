<?php

class AdministradorController
{
	
	function __construct()
	{
		
	}
 
	function inicio(){
		require_once('Views/Administrador/inicio.php');
	}

 
	function lista(){
		require_once('Views/Administrador/lista.php');
	}
	function ficha(){

 
		require_once('Views/Administrador/ficha.php');
	}
	function update(){
		
		require_once('Views/Administrador/lista.php');
	}
 
	function editar(){
		require_once('Views/Administrador/editar.php');
	}
	function eliminar(){
		$id=$_GET['id'];
		Administrador::eliminar($id);
		$this->lista();
	}
	function cerrarsesion(){
		setcookie('rol','',time()-1000);
		setcookie('usario','',time()-1000);
		header('Location:index.php');
	}
 
	function error(){
		require_once('Views/Administrador/error.php');
	}
 
}