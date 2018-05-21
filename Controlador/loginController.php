<?php 
session_start();
	if (isset($_POST['nombreUsuario'])) {
		require_once("../Modelo/Usuario.php");

//		var_dump($_POST["nombreUsuario"]);die();
		$objUsuario= new Usuario($_POST['nombreUsuario'], $_POST['password']);
		$resultado=$objUsuario->login();

		echo $resultado;
	}else{

		header("location: ../Vistas/login.php");
	}

 ?>