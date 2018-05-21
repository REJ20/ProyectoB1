<!DOCTYPE html>
<html>
<head>
	<?php require_once "../src/headerVistas.php"; ?>
	<title>Iniciar sesión</title>
</head>
<body>
	<div class="container">
		<form method="POST" action="../Controlador/loginController.php" role="form">
			<div class="form-group">
			<div class="form-column col-dm-3 col-sm-3 col-xs-3">
				<div>
					<h4>Iniciar sesion</h4>
					<label class="control-label">Usuario</label>
					<!-- campo con un valor valido -->
					<input type="text" name="username" class="form-control" placeholder="Usuario: trol2000" id="campoValido" required="">
				</div>
				<div>
					<label class="control-label">Contraseña</label>
					<input type="password" name="password" class="form-control" placeholder="*********" required="">
				</div>
				<br>
				<div class="clearfix"></div>
				
					<input type="submit" name="login" value="Iniciar sesión" class="btn btn-primary">
				</div>
				
			</div>
			</div>
		</form>
	</div>
	



</body>
</html>