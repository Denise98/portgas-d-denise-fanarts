<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Editar dibujos</title>
	<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
	<link rel="stylesheet" href="estilos.css">
</head>
<body class="body7">
	<h1>Editar dibujo</h1>
	<h3><a href="../proyecto/index.php?mod=dibujo&ope=index&idus=<?=$_GET['idus'];?>">Volver atras</a></h3>
	<div class="form">
	<form action="/proyecto/index.php?mod=dibujo&ope=edit&iddib=<?= $id?>" method="post" enctype="multipart/form-data">

		<input type="hidden" name="mod" value="dibujo" />
		<input type="hidden" name="ope" value="edit" />
		<input type="hidden" name="iddib" value="<?= $_GET["iddib"] ; ?>" />
		<input type="hidden" name="idus" value="<?= $_GET["idus"] ; ?>" />


		<label for="">Titulo</label>
		<input type="text" id="tit" name="tit" value="<?= $titulo?>">
		<br/>
		<input type="hidden" id="idus" name="idus" value="<?=$idus?>">
		<input type="file" id="url" name="url" required><br/>
		<button type="submit" class="edit">Actualizar dibujo</button>
	</form>
</div>
</body>
</html>
