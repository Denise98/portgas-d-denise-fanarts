<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>editar usuario</title>
	<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
	<link rel="stylesheet" href="estilos.css">
</head>
<body class="body9">
	<h1 class="h1">Editar usuarios</h1>
	<h3><a href="../proyecto/index.php?mod=usuario&ope=indexAdminUser">Volver atras</a></h3>
	<div class="form1">
	<form action="../proyecto/index.php?mod=usuario&ope=editUser&idus=<?= $id?>" method="get">

		<input type="hidden" name="mod" value="usuario" />
		<input type="hidden" name="ope" value="editUser" />
		<input type="hidden" name="idus" value="<?= $id ; ?>" />
		<label for="">Nombre:</label><br><br>
		<input type="text" name="nom" id="nom" value="<?= $nombre;?>"><br>
		<label for="">Apellidos:</label><br><br>
		<input type="text" name="ape" id="ape" value="<?= $apellidos;?>"><br>
		<label for="">Usuario:</label><br><br>
		<input type="text" name="usr" id="usr" value="<?= $usuario;?>"><br>
		<label for="">Email:</label><br><br>
		<input type="text" name="email" id="email" value="<?= $email;?>"><br>
		<label for="">Contraseña:</label><br><br>
		<input type="password" name="pass" id="pass" value="<?= $pass;?>"><br><br>
		<button type="submit" class="añadir1">Cambiar</button>
	</form>
</div>
</body>
</html>