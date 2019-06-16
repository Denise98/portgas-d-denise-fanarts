<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
	<link rel="stylesheet" href="estilos.css">

	<title>Crear Usuario</title>
</head>
<body class="body4">
	<h1 class="h1">Crear nuevo Usuario</h1>
	<h3><a href="../proyecto/index.php?mod=usuario&ope=indexAdminUser">Volver atras</a></h3>
	<div class="form1">
	<form action="index.php" method="get">
		<input type="hidden" name="mod" value="usuario" />
		<input type="hidden" name="ope" value="createUser" />

		<label for="">Nombre:</label><br><br>
		<input type="text" id="nom" name="nom" required><br/>
		<label for="">Apellidos:</label><br><br>
		<input type="text" id="ape" name="ape" required><br/>
		<label for="">Usuario:</label><br><br>
		<input type="text" id="usr" name="usr" required><br/>
		<label for="">Contraseña:</label><br><br>
		<input type="password" id="pass" name="pass" required><br/>
		<label for="">Email:</label><br><br>
		<input type="text" id="email" name="email" required><br/><br>
		<button type="submit" class="añadir1">Crear usuario</button>
	</form>
	</div>
</body>
</html>