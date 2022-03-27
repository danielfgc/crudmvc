<?php

class UsuarioController
{
	

	function index(){
		require_once('index.php');
	}

	function save(){
		$Usuario= new Usuario(null, $_POST['username'], $_POST['email'],$_POST['contraseña'],$_POST['urlfoto'],$_POST['pregunta'],$_POST['respuesta'],$_POST['idrol'],$_POST['binfoto']);
		Usuario::save($Usuario);
		$this->ficha();
	}
 
	function ficha(){
		$listaUsuarios=Usuario::all();
 
		require_once('Views/Usuario/ficha.php');
	}
 
 
	function update(){
		$Usuario = new Usuario(null, $_POST['username'], $_POST['email'],$_POST['contraseña'],$_POST['urlfoto'],$_POST['pregunta'],$_POST['respuesta'],$_POST['idrol'],$_POST['binfoto']);
		Usuario::update($Usuario);
		$this->ficha();
	}
	function delete(){
		$id=$_GET['id'];
		Usuario::delete($id);
		$this->index();
	}
 
 
	function error(){
		require_once('Views/Usuario/error.php');
	}
 
}