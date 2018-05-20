<?php 
	
	if (isset($_POST['inicio'])) {

		header("location: ../Vistas/login.php");

	}else{
		 header("location: index.php");
	}

 ?>