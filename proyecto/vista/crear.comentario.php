<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Añadir comentario</title>
	<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
	<link rel="stylesheet" href="estilos.css">
</head>
<body class="body2">
	<h1>Añadir comentario</h1>
	<h3><a href="../proyecto/index.php?mod=comentario&ope=index&iddib=<?=$_GET['iddib'];?>&idus=<?=$_SESSION['varidus']?>">Volver atras</a></h3>
	<div class="form">
	<form action="index.php?mod=comentario&ope=create&iddib=<?=$_GET['iddib'];?>" method="get" enctype="multipart/form-data">
		<input type="hidden" name="mod" value="comentario" />
		<input type="hidden" name="ope" value="create" />


		<textarea name="tex" id="tex" cols="30" rows="5" placeholder="Añade un comentario"></textarea><br><br>
		<input type="hidden" id="iddib" name="iddib" value="<?=$_GET['iddib'];?>"><br/>
		<input type="hidden" id="idus" name="idus" value="<?=$_SESSION['varidus'];?>"><br/>
		<label for="url">Usuario:</label><br><br>
		<select name="usr">
			<?php foreach ($datosUs as $item) { ?>
				<option value="<?=$item->getUsuario();?>"><?=$item->getUsuario();?></option>
			<?php } ?>
		</select>
		<button type="submit" class="añadir">Añadir</button>
	</form>
	</div>
</body>
</html>