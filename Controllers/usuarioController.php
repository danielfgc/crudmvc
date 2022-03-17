<?php

class UsuarioController
{
	
	function __construct()
	{
		
	}
 
	function index(){
		require_once('Views/Usuario/bienvenido.php');
	}
 
	function register(){
		require_once('Views/Usuario/register.php');
	}
 
	function save(){
		if (!isset($_POST['estado'])) {
			$estado="of";
		}else{
			$estado="on";
		}
		$Usuario= new Usuario(null, $_POST['nombres'],$_POST['apellidos'],$estado);
 
		Usuario::save($Usuario);
		$this->show();
	}
 
	function show(){
		$listaUsuarios=Usuario::all();
 
		require_once('Views/Usuario/show.php');
	}
 
	function updateshow(){
		$id=$_GET['idUsuario'];
		$Usuario=Usuario::searchById($id);
		require_once('Views/Usuario/updateshow.php');
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
 
	function search(){
		if (!empty($_POST['id'])) {
			$id=$_POST['id'];
			$Usuario=Usuario::searchById($id);
			$listaUsuarios[]=$Usuario;
			//var_dump($id);
			//die();
			require_once('Views/Usuario/show.php');
		} else {
			$listaUsuarios=Usuario::all();
 
			require_once('Views/Usuario/show.php');
		}
		
		
	}
 
	function error(){
		require_once('Views/Usuario/error.php');
	}
 
}