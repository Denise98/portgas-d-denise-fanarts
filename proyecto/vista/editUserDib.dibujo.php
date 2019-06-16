<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Editar dibujo</title>
	<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
	<link rel="stylesheet" href="estilos.css">
</head>
<body class="body10">
<h1 class="h1">Editar dibujo</h1>
	<h3 class="h3"><a href="../proyecto/index.php?mod=dibujo&ope=indexUser&idus=<?=$_SESSION['varid'];?>">Volver atras</a></h3>
	<div class="form2">
	<form action="/proyecto/index.php?mod=dibujo&ope=editUserDib&iddib=<?= $id?>" method="post" enctype="multipart/form-data">

		<input type="hidden" name="mod" value="dibujo" />
		<input type="hidden" name="ope" value="edit" />
		<input type="hidden" name="iddib" value="<?= $_GET["iddib"] ; ?>" />
		<input type="hidden" name="idus" value="<?= $_SESSION['varid'] ; ?>" />


		<label for="">Texto</label>
		<input type="text" id="tit" name="tit" value="<?= $titulo?>">
		<br/>
		<input type="hidden" id="idus" name="idus" value="<?=$idus?>">
		<input type="file" id="url" name="url" required><br/>
		<button type="submit" class="edit">Actualizar dibujo</button>
	</form>	
	</div>
</body>
</html>