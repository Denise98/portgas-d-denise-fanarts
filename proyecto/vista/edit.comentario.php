<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>editar</title>
	<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
	<link rel="stylesheet" href="estilos.css">
</head>
<body class="body6">
	<h1>Editar comentario</h1>
	<h3><a href="../proyecto/index.php?mod=comentario&ope=index&iddib=<?=$_GET['iddib'];?>&idus=<?=$_SESSION['varidus'];?>">Volver atras</a></h3>
	<div class="form">
	<form action="/proyecto/index.php?mod=comentario&ope=edit&idcom=<?= $id?>" method="get" >

		<input type="hidden" name="mod" value="comentario" />
		<input type="hidden" name="ope" value="edit" />
		<input type="hidden" name="idcom" value="<?= $_GET['idcom'] ; ?>" />
		<input type="hidden" name="iddib" value="<?= $_GET['iddib'] ; ?>" />
		<input type="hidden" name="idus" value="<?= $_GET['idus'] ; ?>" />
		<input type="hidden" name="idus2" value="<?= $_GET['idus2'] ; ?>" />


		
		<textarea name="tex" id="tex" cols="30" rows="5" ><?=$texto;?></textarea>
		<br/>
		<button type="submit" class="edit">Actualizar</button>
	</form>
</div>
</body>
</html>