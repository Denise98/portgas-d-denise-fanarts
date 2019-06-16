<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Index</title>
	<script src="jquery-3.4.1.min.js"></script>
	<script src="anime.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
	<link rel="stylesheet" href="estilos.css">

</head>

<body class="body16">
	
	<div class="header">
	<div class="header1">
	<img src="fruta.svg" class="logo" height="100" width="100">
	</div>
	<audio autoplay>
  <source src="audio.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>
	<script src="logo.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
        $(document).on("click",".pagination li a",function(){
            var numpage = $(this).data("page");
            $.get("vista/listUser.php",{page:numpage},function(data){           
                $("#listUser").html(data);  
            });
        });
    });
	</script>
	
	<div class="header2">
    <h2 class="titulo">PORTGAS D. DENISE FANARTS</h2>
	</div>
	<div class="header3">
	<form action="/proyecto/index.php?mod=dibujo&ope=indexUser&id=<?= $_SESSION['varid'];?>" class="cuenta">
		<input type="hidden" name="mod" value="dibujo">
		<input type="hidden" name="ope" value="indexUser">
		<input type="hidden" name="idus" value="<?= $_SESSION['varid'] ; ?>">

		<button class="accederCuenta">mis Fanarts</button>
	</form>
	</div>   
	</div>

	<div id="listUser">
	<?php 
	include "listUser.php";

	?></div>
	
	

	<form action="../proyecto/index.php">
		<input type="hidden" name="mod" value="usuario">
		<input type="hidden" name="ope" value="logout">
		<button class="cerrar">Cerrar Sesion</button>
	</form>
</body>
</html>