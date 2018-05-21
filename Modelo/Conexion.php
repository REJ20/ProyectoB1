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
		$this->host="localhost";
		$this->user="root";
		$this->password="";
		$this->db="sms_marketing";
	}


	
	function conectar()
	{
		$con = new mysqli($this->host, $this->user, $this->password, $this->db);
			if ($con->connect_errno){
				echo "Error en la Conexion";
				die();
	}
	return $con;
}
}

 ?>