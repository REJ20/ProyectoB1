<!DOCTYPE html>
<html>
<head>
	<?php include_once '../src/header.php' ?>
	<title>Iniciar sesión</title>
</head>
<body>
	<div class="container">
		<form method="POST" action="../Controlador/usuarioController.php" role="form">
			<div class="form-group">
			<div class="form-column col-dm-2 col-sm-2 col-rm-2">
				<div>
					<h4>Iniciar sesion</h4>
					<label class="form-label">Usuario</label>
					<input type="text" name="username" class="form-control" placeholder="Usuario: trol2000">
				</div>
				<div>
					<label class="control-label">Contraseña</label>
					<input type="password" name="password" class="form-control" placeholder="*********">
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