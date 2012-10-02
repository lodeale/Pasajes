<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Gestio Pasajes</title>
		<script type="text/javascript" src=""></script>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilo.css">
	</head>
	<body>
		<div id="container">

			<div id="header">
				<h1>Sistema Gestion Pasajes</h1>
			</div>

			<div id="wrapper">
				<div id="login">
					<?php echo form_open("inicio/acceder") ?>
						<input type="user" name="usuario" placeholder="Ingrese usuario" required>
						<input type="password" name="clave" placeholder="Ingrese contraseña" required>
						<hr>
						<input type="submit" name="btoEnviar" value="Enviar">
					<?php echo form_close(); ?>
				</div>
				
			</div>

			<div id="footer">
				alumnos@curso-php.com.ar
			</div>

		</div>
	</body>
</html>