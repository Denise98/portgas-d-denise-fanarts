<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>index</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
	<link rel="stylesheet" href="estilos.css">
</head>
<body class="body11">
	
	<h1>Listado de Comentarios</h1>
	<?php $_SESSION['varidus']=$_GET['idus']; ?>
	<h3><a href="../proyecto/index.php?mod=dibujo&ope=index&idus=<?=$_SESSION['varidus'];?>">Volver</a></h3>
	<h3><a href="../proyecto/index.php?mod=comentario&ope=create&iddib=<?=$_GET['iddib'];?>&idus=<?=$_SESSION['varidus']?>">Crear nuevo Comentario</a></h3>
	
	
	<div class="form">
		<?php if(empty($datos)){
			echo "No hay comentarios";
		}else{
		 ?>
	<table>

		<td>Usuario</td>
		<td>Texto</td>

		<?php 
		
		foreach ($datos as $item) {
		?>

		<tr>
			
			<td><?=$item->getUsuario();?></td>
			<td><?=$item->getTexto();?></td> 
			<td><a href="../proyecto/index.php?mod=comentario&ope=edit&idcom=<?= $item->getIdCom();?>&iddib=<?= $item->getIdDib();?>&idus=<?=$item->getIdUs();?>"><i class="fas fa-edit" id="editar"></i>
</a></td>
			<td><a href="../proyecto/index.php?mod=comentario&ope=delete&iddib=<?= $item->getIdDib();?>&idcom=<?= $item->getIdCom();?>&idus=<?=$_SESSION['varidus']?>"><i class="fas fa-trash-alt" id="borrar"></i>
</a></td>
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