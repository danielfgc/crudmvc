<?php

class UsuarioController
{
	

	function index(){
		require_once('Views/Usuario/index.php');
	}

	function save(){
		$Usuario= new Usuario(null, $_POST['username'],$_POST['contraseña'], $_POST['email']);
		Usuario::save($Usuario);
		$this->show();
	}
 
	function show(){
		$listaUsuarios=Usuario::all();
 
		require_once('Views/Usuario/show.php');
	}
 
 
	function update(){
		$Usuario = new Usuario(null, $_POST['username'],$_POST['contraseña'], $_POST['email']);
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