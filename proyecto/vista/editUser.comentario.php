<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Editar Comentario</title>
	<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
	<link rel="stylesheet" href="estilos.css">
</head>
<body class="body8">
	<h1 class="">Editar Comentario</h1>
	<h3><a href="../proyecto/index.php?mod=dibujo&ope=only&iddib=<?=$_GET['iddib'];?>">Volver atras</a></h3>
	<div class="form">
	<form action="/proyecto/index.php?mod=comentario&ope=editUser&idcom=<?= $id?>" method="get" >

		<input type="hidden" name="mod" value="comentario" />
		<input type="hidden" name="ope" value="editUser" />
		<input type="hidden" name="idcom" value="<?= $_GET['idcom'] ; ?>" />
		<input type="hidden" name="iddib" value="<?= $_GET['iddib'] ; ?>" />
		<input type="hidden" name="idus" value="<?= $_GET['idus'] ; ?>" />


		<textarea name="tex" id="tex" cols="30" rows="5" ><?=$texto;?></textarea>
		<br/>
		<button type="submit" class="edit">Actualizar dibujo</button>
	</form>
</div>
</body>
</html>