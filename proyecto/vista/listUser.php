	<link rel="stylesheet" href="estilos.css">
	<div class="wrapper">
	<table>

		<?php 
		//require_once "Database.php";

		define("HOST","localhost");
		define("NOMBRE_DB","fanart");
		define("USUARIO_DB","root");
		define("CLAVE_DB","");


		$conexion = new mysqli(HOST, USUARIO_DB,CLAVE_DB);

		if ($conexion->connect_errno > 0) {
        	echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die ("Error: " . $conexion->connect_error);
		} else {
        	$conexion->select_db(NOMBRE_DB);
        	$conexion->set_charset("utf8");
}

//INICIALIACION DE VBLES

		$numregxpagina=4;
		$paginaactual=1;

		if (empty($_GET["page"]) || ($_GET["page"]==1) ) {
			$regcomienzo = 0;
		}else{
			$regcomienzo = (($_GET["page"]-1) * $numregxpagina);
			$paginaactual= $_GET["page"];
}


		$consulta = "SELECT * FROM dibujo ";
		
		 

//CONSTRUCCION DEL LIMIT EN FUNCION DE VBLES
		$limit = " LIMIT ". $regcomienzo . "," . $numregxpagina;
		$resultado = $conexion->query($consulta . $limit);?>

		

	<?php while ($fila = $resultado->fetch_object()){?>
		<tr><a href="../proyecto/index.php?mod=comentario&ope=only&iddib=<?= $fila->iddib?>"><img src="dibujo/<?=$fila->url?>" alt="" height="300" width="350"></a></tr>
	
		<?php }?>

	</table>
</div>


<!-- pagination CONTROL -->

<section class="paginacion">
<ul class="pagination">
<?php 
if ($paginaactual!=1){?>
  <li><a href="#" data-page="1">Primero</a></li>
  <li><a href="#" data-page="<?php echo ($paginaactual-1)?>"><<</a></li>
<?php
}?>
<?php
//Cuantas páginas
$resultado2 = $conexion->query($consulta);
$totalregistros = $resultado2->num_rows;
$numpaginas=intval($totalregistros/ $numregxpagina)+1;
for ($i=1;$i<=$numpaginas;$i++){ ?>  
  <li><a href="#" data-page="<?php echo $i;?>" 
  <?php
if ($i==$paginaactual){?> class="active" <?php }?>
  ><?php echo $i;?></a></li>
<?php } ?>
<?php 
if ($paginaactual!=$numpaginas){?>
  <li><a href="#" data-page="<?php echo ($paginaactual+1)?>">>></a></li>
  <li><a href="#" data-page="<?php echo $numpaginas?>">Último</a></li>
<?php }?>
</ul>
</section>
