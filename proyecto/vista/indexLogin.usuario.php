<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
	<link rel="stylesheet" href="estilos.css">
</head>
<body class="body14">
	<h1 class="h1">Login</h1>
	<div class="form3">
	<form action="../proyecto/index.php">
		<input type="hidden" name="mod" value="usuario" />
		<input type="hidden" name="ope" value="compruebaUser"/><br>
		<label>Usuario:</label><br>
		<input type="text" name="usr" id="usr"><br>
		<label>Contraseña:</label><br>
		<input type="password" name="pass" id="pass">
		<button type="submit" id="entrar">Acceder</button>
	</form>
	<form action="/proyecto/index.php">
		<input type="hidden" name="mod" value="usuario">
		<input type="hidden" name="ope" value="register"><br>
		<button id="register">Registrarse</button>
	</form>
	</div>
</body>
</html>