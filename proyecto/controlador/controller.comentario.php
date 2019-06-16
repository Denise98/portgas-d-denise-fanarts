<?php 

require_once "modelo/Dibujo.php";
require_once "controlador/controller.usuario.php";
require_once "controlador/controller.dibujo.php";
require_once "modelo/Usuario.php";
require_once "modelo/Comentario.php";

class controllerComentario{

	public function __construct(){
		$dib= new controllerDibujo;
		
	}

	public function CheckUser(){
		if (isset($_SESSION['rol'])) {

			if ($_SESSION['rol']=='usuario') {
				return true;
			} elseif($_SESSION['rol']=='admin'){
				//require_once "vista/indexAdminUser.usuario.php";
				header("Location: /proyecto/index.php?mod=usuario&ope=indexAdminUser");
				//die();
			}else{
				header("Location: /proyecto/index.php?mod=usuario&ope=indexLogin");
				die();
			}
		} else{
			header("Location: /proyecto/index.php?mod=usuario&ope=indexLogin");
			die();
		}
	}

	public function Check(){
		if (isset($_SESSION['rol'])) {

			if ($_SESSION['rol']=='admin') {
				return true;
			} elseif($_SESSION['rol']=='usuario'){
				header("Location: /proyecto/index.php?mod=usuario&ope=indexUser");
				die();
			}else{
				header("Location: /proyecto/index.php?mod=usuario&ope=indexLogin");
				die();
			}
		} else{
			header("Location: /proyecto/index.php?mod=usuario&ope=indexLogin");
			die();
		}
	}

	public function only($id=""){
		$this->CheckUser();
		if(isset($_GET['iddib'])){
			$datos = Dibujo::getDraw($_GET['iddib']);
			$datosCom=Comentario::getAllCommsFromDraw($_GET['iddib']);
			
			
		} else {
			$datos = Dibujo::getDraw($id);
			$datosCom=Comentario::getAllCommsFromDraw($id);


		}

		require_once "vista/only.dibujo.php";
	}

	public function createUser(){
		$this->CheckUser();
		if(isset($_POST['tex'])):

			
			$tab = new Comentario();
			$tab->setTexto($_POST['tex']);
			$tab->setIdDib($_GET['iddib']);
			$tab->setIdUs($_SESSION['varid']);
			$tab->setUsuario($_SESSION['varus']);
			$tab->insertComment();

			$this->only($_GET['iddib']);
			//require_once "vista/only.dibujo.php";
		else:
			require_once "vista/only.dibujo.php";
		endif;
	}

	public function create(){

		$this->Check();

		$datosUs=Usuario::getAllUsers();

		if(isset($_GET['tex'])):

			$us=Usuario::getIdByName($_GET['usr']);
			$tab = new Comentario();
			$tab->setTexto($_GET['tex']);
			$tab->setIdDib($_GET['iddib']);
			$tab->setIdUs($us->getIdUs());
			$tab->setUsuario($_GET['usr']);
			$tab->insertComment();
			
			$this->index($_GET['iddib']);
			//header("Location: /DWES/NO DUAL/proyecto/index.php?mod=comentario&ope=index&iddib=$_GET['iddib']");


		else:
			require_once "vista/crear.comentario.php";
		endif;
	}

	public function index($id=""){

		$this->Check();

		if(isset($_GET['iddib'])){
			$datos = Comentario::getAllCommsFromDraw($_GET['iddib']);
			
		} else {
			$datos = Comentario::getAllCommsFromDraw($id);
		}

		require_once "vista/index.comentario.php";
	}




	public function edit(){
		$this->Check();
		$id=$_REQUEST['idcom']??"";

		if(!empty($id)):
			$tab= Comentario::getComment($id);
			if(isset($_GET['tex'])):

				$tab->setTexto($_GET['tex']);
				$tab->setIdDib($_GET['iddib']);
				$tab->setIdUs($_GET['idus']);
				$tab->setUsuario($tab->getUsuario());
				$tab->updateComment();

				$this->index($_GET['iddib']) ;
		//require_once "/DWES/NO DUAL/MVC/index.php?mod=nota&ope=index&idTab=8" ;

			else:
				$texto=$tab->getTexto();
				$iddib=$tab->getIdDib();
				$idus=$tab->getIdUs();
				$url=$tab->getUsuario();
				require_once "vista/edit.comentario.php";
			endif;

		else:
			$this->index();
		endif;
	}

	public function editUser(){
		$this->CheckUser();
		$id=$_REQUEST['idcom']??"";

		if(!empty($id)):
			$tab= Comentario::getComment($id);
			if(isset($_GET['tex'])):

				$tab->setTexto($_GET['tex']);
				$tab->setIdDib($_GET['iddib']);
				$tab->setIdUs($_GET['idus']);
				$tab->setUsuario($tab->getUsuario());
				$tab->updateComment();

				$this->only($_GET['iddib']) ;
		//require_once "/DWES/NO DUAL/MVC/index.php?mod=nota&ope=index&idTab=8" ;

			else:
				$texto=$tab->getTexto();
				$iddib=$tab->getIdDib();
				$idus=$tab->getIdUs();
				$url=$tab->getUsuario();
				require_once "vista/editUser.comentario.php";
			endif;

		else:
			$this->only($_GET['iddib']);
		endif;
	}

	public function delete(){
		$this->Check();
		if(isset($_GET['idcom'])):
	 		Comentario::deleteComment($_GET['idcom']);
	 		$this->index($_GET['iddib']);
	 		//header("Location: http://localhost/DWES/NO%20DUAL/proyecto/index.php?mod=comentario&ope=index&iddib=$_GET['iddib']&idcom=$_GET['idcom']&idus=$_SESSION['varidus']");
		else:
			$this->index($_GET['iddib']);
		endif;
	}

	public function deleteUser(){
		$this->CheckUser();
		if(isset($_GET['idcom'])):
	 		Comentario::deleteComment($_GET['idcom'], $_GET['idus']);
	 		$this->only($_GET['iddib']);
		else:
			$this->only($_GET['iddib']);
		endif;
	}
}

 ?>