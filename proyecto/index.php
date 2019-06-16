<?php 

//ini_set("display_errors", 1);
//ini_set("display_startup_errors", 1);
//error_reporting(E_ALL);

session_start();

//$_SESSION['rol']='hola';

$mod=$_GET['mod']??"usuario";
$ope=$_GET['ope']??"indexLogin";


require_once "controlador/controller.$mod.php";

$nme= "controller$mod";

$cont= new $nme();

if(method_exists($cont, $ope)):
 $cont->$ope();
else:
	die("***ERROR***");
endif;

 ?>