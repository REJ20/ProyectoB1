<?php 
/**
 * 
 */
class Conexion
{
	private $host;
	private $user;
	private $password;
	private $db;
	
	function __construct()
	{
		$data = require_once("../app/config.php");
		$this->host=$data["localhost"];
		$this->user=$data["root"];
		$this->password=$data[""];
		$this->db=$data["sms_marketing"];
	}


	
	function conectar()
	{
		$con = new mysqli($this->$host, $this->$user, $this->password, $this->db);
			if ($con->connect_errno){
				echo "Error en la Conexion";
				die();
	}
	return $con;
}
}

 ?>