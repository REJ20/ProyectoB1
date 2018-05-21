<!DOCTYPE html>
<html>
<head>
	<?php require_once "../src/headerVistas.php"; ?>
	<title>Iniciar sesión</title>
<script type="text/javascript">
	$(document).ready(function () {
		$("[name='login']").click(function () {
			var user = $('[name="nombreUsuario"]').val();
			var pass = $('[name="password"]').val();
			$.ajax({
				url:"../Controlador/loginController.php",
				type:"POST",
				dataType:"json",
				data:{nombreUsuario:user,password:pass},
				success: function (estatus) {
					if (estatus=='1') {
						$(location).attr("indexUsuario.php");
					}
				}
			});
		});
	});
</script>
</head>
<body>
	<div class="container">
		<div  role="form">
			<div class="form-group">
			<div class="form-column col-dm-3 col-sm-3 col-xs-3">
				<div>
					<h4>Iniciar sesion</h4>
					<label class="control-label">Usuario</label>
					<!-- campo con un valor valido -->
					<input type="text" name="nombreUsuario" class="form-control" placeholder="Usuario: trol2000" id="campoValido" required="">
				</div>
				<div>
					<label class="control-label">Contraseña</label>
					<input type="password" name="password" class="form-control" placeholder="*********" required="">
				</div>
				<br>
				<div class="clearfix"></div>
				
					<button name="login" value="Iniciar sesión" class="btn btn-primary">Enviar</button>
				</div>
				
			</div>
			</div>
		</div>
	</div>
	



</body>
</html>