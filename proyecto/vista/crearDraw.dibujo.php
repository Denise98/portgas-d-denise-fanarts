<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Añadir dibujo</title>
	<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
	<link rel="stylesheet" href="estilos.css">
</head>
<body class="body3">
	<h1>Añadir dibujo</h1>
	<h3><a href="../proyecto/index.php?mod=dibujo&ope=index&idus=<?=$_GET['idus'];?>">Volver atras</a></h3>
	<div class="form">
	<form action="index.php?mod=dibujo&ope=create&idus=<?=$_GET['idus'];?>" method="post" enctype="multipart/form-data">
		<input type="hidden" name="mod" value="dibujo" />
		<input type="hidden" name="ope" value="create" />

		<label for="">Titulo:</label><br><br>
		<input type="text" id="tit" name="tit" required><br/>
		<input type="hidden" id="idus" name="idus" value="<?=$_GET['idus'];?>"><br/>
		<label for="url">Dibujo:</label><br><br>
		<input type="file" id="url" name="url" required><br/>
		<button type="submit" class="añadir">Añadir</button>
	</form>
	</div>
</body>
</html>