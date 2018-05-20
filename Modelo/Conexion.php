<?php 
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'SMS_MARKETING');
	
	function conectar()
	{
		$con = new mysqli(HOST, USER, PASS, BD);
			if ($con->connect_errno){
				echo "Error en la Conexion";
				die();
	}
	return $con;


 ?>