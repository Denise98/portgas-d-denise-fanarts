
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de dibujos</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
	<link rel="stylesheet" href="estilos.css">
	
</head>
<body class="body15">
<h1>Listado de Dibujos</h1>
<h3 class="h3-2"><a href="../proyecto/index.php?mod=usuario&ope=indexUser">Volver</a></h3>	
<h3 class="h3-2"><a href="../proyecto/index.php?mod=dibujo&ope=createUserDib&idus=<?=$_SESSION['varid'];?>"> Añadir Dibujo</a></h3>
	
	<div class="form">
		<?php if (empty($datos)) {
		echo "No hay ningun dibujo registrado";
	} else{?>
	<table>
		<td>Titulo</td>


		<?php 
		foreach ($datos as $item) {
		?>

		<tr>
			<td><?=$item->getTitulo();?></td>
			<td><img src="dibujo/<?=$item->getUrl();?>" height=75 with=75></td>
			<td><a href="../proyecto/index.php?mod=dibujo&ope=editUserDib&iddib=<?= $item->getIdDib();?>&idus=<?=$item->getIdUs();?>"><i class="fas fa-edit" id="editar"></i>
</a></td>
			<td><a href="../proyecto/index.php?mod=dibujo&ope=deleteUserDib&iddib=<?= $item->getIdDib();?>&idus=<?=$item->getIdUs();?>"><i class="fas fa-trash-alt" id="borrar"></i>
</a></td>
		</tr>

		<?php
		}}
		 ?>
	</table>
</div>


</body>
</html>