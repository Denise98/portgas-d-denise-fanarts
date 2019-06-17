<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Crear Usuario</title>
	<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
	<link rel="stylesheet" href="estilos.css">
</head>
<body class="body18">
	<h1 class="h1">Registro</h1>
	<h3><a href="../proyecto/index.php?mod=usuario&ope=indexLogin">Volver atras</a></h3>


	<div class="form4">
	<form action="/proyecto/index.php" method="get">
		<input type="hidden" name="mod" value="usuario" />
		<input type="hidden" name="ope" value="register" />

		<label for="">Nombre:</label><br><br>
		<input type="text" id="nom" name="nom" required><br/><br>
		<label for="">Apellidos:</label><br><br>
		<input type="text" id="ape" name="ape" required><br/><br>
		<label for="">Usuario:</label><br><br>
		<input type="text" id="usr" name="usr" required><br/><br>
		<label for="">Contraseña:</label><br><br>
		<input type="password" id="pass" name="pass" required><br/><br>
		<label for="">Email:</label><br><br>
		<input type="text" id="email" name="email" required><br/><br>
		<button type="submit" class="reg">Registrarse</button>
	</form>
</div>
</body>
</html>
