<?php

class UsuarioController
{
	

	function index(){
		header('Location:index.php');
	}

 
	function ficha(){

 
		require_once('Views/Usuario/ficha.php');
	}
	
	function editar(){
		require_once('Views/Usuario/editar.php');
	}

	function eliminar(){
		$id=$_GET['id'];
		Usuario::delete($id);
		setcookie('rol','',time()-1000);
		setcookie('usario','',time()-1000);
		header('Location:index.php');
	}
 	function cerrarsesion(){
		setcookie('rol','',time()-1000);
		setcookie('usario','',time()-1000);
		header('Location:index.php');
	}
 
	function error(){
		require_once('Views/Usuario/error.php');
	}
	

 
}