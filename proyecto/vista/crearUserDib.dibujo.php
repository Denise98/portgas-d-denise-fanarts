<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Añadir dibujo</title>
	<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
	<link rel="stylesheet" href="estilos.css">
</head>
<body class="body5">
<h1>Añadir dibujo</h1>
	<h3><a href="../proyecto/index.php?mod=dibujo&ope=indexUser&idus=<?=$_SESSION['varid'];?>">Volver atras</a></h3>
	<div class="form2">
	<form action="index.php?mod=dibujo&ope=createUserDib&idus=<?=$_SESSION['varid'];?>" method="post" enctype="multipart/form-data">
		<input type="hidden" name="mod" value="dibujo" />
		<input type="hidden" name="ope" value="createUserDib" />
		<input type="hidden" name="idus" value="$_SESSION['varid']" />

		<label for="">Titulo:</label><br>
		<input type="text" id="tit" name="tit" required><br/>
		<label >Dibujo:</label><br>
		<input type="file" id="url" name="url" required><br/>
		<button type="submit" class="añadir">Añadir</button>
	</form>
	</div>	
</body>
</html>