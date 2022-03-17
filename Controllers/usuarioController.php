<?php

class UsuarioController
{
	
	function __construct()
	{
		
	}
 
	function index(){
		require_once('Views/Usuario/bienvenido.php');
	}

	function save(){
		$Usuario= new Usuario(null, $_POST['nombres'],$_POST['apellidos']);
		Usuario::save($Usuario);
		$this->show();
	}
 
	function show(){
		$listaUsuarios=Usuario::all();
 
		require_once('Views/Usuario/show.php');
	}
 
 
	function update(){
		$Usuario = new Usuario($_POST['id'],$_POST['nombres'],$_POST['apellidos'],$_POST['estado']);
		Usuario::update($Usuario);
		$this->show();
	}
	function delete(){
		$id=$_GET['id'];
		Usuario::delete($id);
		$this->show();
	}
 
 
	function error(){
		require_once('Views/Usuario/error.php');
	}
 
}