<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dibujo</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
	<link rel="stylesheet" href="estilos.css">
</head>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#miboton').click(function() {
                // Recargo la página
                location.reload();
            });
        });
    </script>
<body class="body17">
	
	<h3 class="volver"><a href="../proyecto/index.php?mod=usuario&ope=indexUser" >Volver</a></h3>



		
			<div class="only">
			<img src="dibujo/<?=$datos->getUrl();?>" height="400" width="450"><br><br>
			<?=$datos->getTitulo();?>
			</div>
			<div class="comentario">
			<?php if(empty($datosCom)){
				echo "No hay comentarios";
			}else{
			foreach ($datosCom as $item) {
		?>
		
		<h4 class="h3-3"><?=$item->getUsuario();?></h4>
		<h5><?=$item->getTexto();?>

		<?php if ($item->getIdUs()==$_SESSION['varid']) { ?>
			<a href="../proyecto/index.php?mod=comentario&ope=editUser&idcom=<?= $item->getIdCom();?>&iddib=<?= $item->getIdDib();?>&idus=<?=$item->getIdUs();?>"><i class="fas fa-edit" id="editar"></i></a>
			<a href="../proyecto/index.php?mod=comentario&ope=deleteUser&iddib=<?= $item->getIdDib();?>&idcom=<?= $item->getIdCom();?>&idus=<?=$item->getIdUs();?>"><i class="fas fa-trash-alt" id="borrar"></i></a>
		<?php } ?>
			</h5>
		<?php
		}}
		 ?>
		</div>

		 <form action="../proyecto/index.php?mod=comentario&ope=createUser&iddib=<?=$_GET['iddib']?>" method="post">
		 	
		 	<textarea name="tex" id="tex" cols="30" rows="5" placeholder="Añade un comentario" required></textarea><br><br>
		 	<button type="submit" class="añadir" id="miboton">Aceptar</button>
		 </form>
</body>
</html>