<?php
class Db
{
	
	function __construct(){}
 
	public static function  getConnect(){
	
			$conexion= new PDO('mysql:host=localhost;dbname=hito2','root','');
		return $conexion;
	}
}