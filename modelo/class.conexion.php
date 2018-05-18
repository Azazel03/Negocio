<?php 
session_start(); 
class Conectar{
	protected $db;

	protected function conexion(){
		$conectar = $this->db = new PDO("mysql:local=localhost; dbname=negocio","root","");
		return $conectar;
	
	}
	//esto arregla problemas de tildes
	public function set_names(){
		return $this->db->query("SET NAMES 'utf8'");
	}

}
?>