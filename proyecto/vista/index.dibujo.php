<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dibujos</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
	<link rel="stylesheet" href="estilos.css">
</head>
<body class="body12">
	
	<h1>Listado de Dibujos</h1>
	<h3><a href="../proyecto/index.php?mod=usuario&ope=indexAdminUser">Volver</a></h3>
	<h3><a href="../proyecto/index.php?mod=dibujo&ope=create&idus=<?=$_GET['idus'];?>">Crear nuevo Dibujo</a></h3>
	
	<div class="form">
		<?php if(empty($datos)){
			echo "No hay dibujos";
		}else{
		 ?>
	<table>
		<td>Titulo</td>
		<td>Url</td>

		<?php 
		foreach ($datos as $item) {
		?>

		<tr>
			<td><?=$item->getTitulo();?></td>
			<td><?=$item->getUrl();?></td> 
			<td><a href="../proyecto/index.php?mod=dibujo&ope=edit&iddib=<?= $item->getIdDib();?>&idus=<?=$item->getIdUs();?>"><i class="fas fa-edit" id="editar"></i>
</a></td>
			<td><a href="../proyecto/index.php?mod=dibujo&ope=delete&iddib=<?= $item->getIdDib();?>&idus=<?=$item->getIdUs();?>"><i class="fas fa-trash-alt" id="borrar"></i>
</a></td>
<td><a href="../proyecto/index.php?mod=comentario&ope=index&iddib=<?=$item->getIdDib();?>&idus=<?=$item->getIdUs();?>"><i class="far fa-comment-dots" id="com"></i></a></td>
		</tr>

		<?php
		}}
		 ?>
	</table>
</div>
	<form action="../proyecto/index.php">
		<input type="hidden" name="mod" value="usuario">
		<input type="hidden" name="ope" value="logout">
		<button class="cerrar">Cerrar Sesion</button>
	</form>
</body>
</html>