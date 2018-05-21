<?php 
	if (isset($_POST('login'))) {

		header("location: ../Vistas/indexUsuario.php")
	}else{

		header("location: ../Vistas/login.php")
	}

 ?>