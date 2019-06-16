<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Usuarios</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
	<link rel="stylesheet" href="estilos.css">
</head>
<body class="body13">
	<h1 class="h1-2">Listado de usuarios</h1>
	<h3><a href="../proyecto/index.php?mod=usuario&ope=createUser">Crear nuevo Usuario</a></h3>
	<h3><a href="../proyecto/index.php?mod=usuario&ope=createAdmin">Crear nuevo Admin</a></h3>
	
	<div class="form">
	<table>
		<td class="td">Nombre</td>
		<td class="td">Apellidos</td>
		<td class="td">Usuario</td>
		<td class="td">Rol</td>
		<td class="td">Contraseña</td>
		<td class="td">Email</td>

		<?php 
		foreach ($datos as $item) {
		?>

		<tr>
			<td class="td"><?=$item->getNombre();?></td>
			<td class="td"><?=$item->getApellidos();?></td>
			<td class="td"><?=$item->getUsuario();?></td>
			<td class="td"><?=$item->getRol();?></td>
			<td class="td"><?=$item->getPass();?></td>
			<td class="td"><?=$item->getEmail();?></td> 
			<td class="td"><a href="../proyecto/index.php?mod=usuario&ope=editUser&idus=<?= $item->getIdUs()?>"><i class="fas fa-edit" id="editar"></i></a></td>
			<td class="td"><a href="../proyecto/index.php?mod=usuario&ope=deleteUser&idus=<?= $item->getIdUs()?>"><i class="fas fa-trash-alt" id="borrar"></i></a></td>
			<td class="td"><a href="../proyecto/index.php?mod=dibujo&ope=index&idus=<?=$item->getIdUs()?>"><i class="far fa-image" id="dibujo"></i></a></td>
			
		</tr>

		<?php
		}
		 ?>
	</table>
</div>
	<form action="../proyecto/index.php">
		<input type="hidden" name="mod" value="usuario">
		<input type="hidden" name="ope" value="logout">
		<button class="cerrar2">Cerrar Sesion</button>
	</form>
</body>
</html>