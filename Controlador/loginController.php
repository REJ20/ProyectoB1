<?php 
session_start();
	if (isset($_POST['login'])) {
		require_once("../Modelo/Usuario.php");
		$objUsuario= new Usuario($_POST['nombreUsuario']), ($_POST['password']);

		header("location: ../Vistas/indexUsuario.php");
	}else{

		header("location: ../Vistas/login.php");
	}

 ?>