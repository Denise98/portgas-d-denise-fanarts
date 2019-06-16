<?php 

require_once "modelo/Dibujo.php";
require_once "controlador/controller.usuario.php";
require_once "modelo/Usuario.php";
require_once "modelo/Comentario.php";


class controllerDibujo{

	public function __construct(){
		$usr= new controllerUsuario;
		
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



	public function index($id=""){

		$this->Check();

		if(isset($_GET['idus'])){
			$datos = Dibujo::getAllDraws($_GET['idus']);
		} else {
			$datos = Dibujo::getAllDraws($id);
		}

		require_once "vista/index.dibujo.php";
	}

	public function indexUser($id=""){

		$this->CheckUser();

		if(isset($_GET['idus'])){
			$datos = Dibujo::getAllDraws($_GET['idus']);
		} else {
			$datos = Dibujo::getAllDraws($id);
		}

		require_once "vista/indexUser.dibujo.php";
	}

	public function create(){

		$this->Check();

		if(isset($_POST['tit'])):

			
			$tab = new Dibujo();
			$tab->setTitulo($_POST['tit']);
			$tab->setIdUs($_POST['idus']);
			$tab->setUrl($_FILES['url']['name']);
			$carpeta_destino = 'dibujo/';
			$archivo_subido = $carpeta_destino . $_FILES['url']['name'];
			move_uploaded_file($_FILES['url']['tmp_name'], $archivo_subido);
			$tab->insertDraw();
			

			$this->index();


		else:
			require_once "vista/crearDraw.dibujo.php";
		endif;
	}



	public function createUserDib(){

		$this->CheckUser();

		if(isset($_POST['tit'])):

			
			$tab = new Dibujo();
			$tab->setTitulo($_POST['tit']);
			$tab->setIdUs($_SESSION['varid']);
			$tab->setUrl($_FILES['url']['name']);
			$carpeta_destino = 'dibujo/';
			$archivo_subido = $carpeta_destino . $_FILES['url']['name'];
			move_uploaded_file($_FILES['url']['tmp_name'], $archivo_subido);
			$tab->insertDraw();
			

			$this->indexUser($_SESSION['varid']);

		else:
			require_once "vista/crearUserDib.dibujo.php";
		endif;
	}



	public function edit(){
		$this->Check();
		$id=$_REQUEST['iddib']??"";

		if(!empty($id)):
			$tab= Dibujo::getDraw($id);
			if(isset($_POST['iddib'])):

				$tab->setTitulo($_POST['tit']);
				$tab->setIdUs($_POST['idus']);
				$tab->setUrl($_FILES['url']['name']);
				$carpeta_destino = 'dibujo/';
				$archivo_subido = $carpeta_destino . $_FILES['url']['name'];
				move_uploaded_file($_FILES['url']['tmp_name'], $archivo_subido);
				$tab->updateDraw();

				$this->index($_POST['idus']) ;
                
		//require_once "/DWES/NO DUAL/MVC/index.php?mod=nota&ope=index&idTab=8" ;

			else:
				$titulo=$tab->getTitulo();
				$idus=$tab->getIdUs();
				$url=$tab->getUrl();
				require_once "vista/edit.dibujo.php";
			endif;

		else:
			$this->index();
		endif;
	}

	public function editUserDib(){
		$this->CheckUser();
		$id=$_REQUEST['iddib']??"";

		if(!empty($id)):
			$tab= Dibujo::getDraw($id);
			if(isset($_POST['iddib'])):

				$tab->setTitulo($_POST['tit']);
				$tab->setIdUs($_SESSION['varid']);
				$tab->setUrl($_FILES['url']['name']);
				$carpeta_destino = 'dibujo/';
				$archivo_subido = $carpeta_destino . $_FILES['url']['name'];
				move_uploaded_file($_FILES['url']['tmp_name'], $archivo_subido);
				$tab->updateDraw();

				$this->indexUser($_SESSION['varid']) ;
                
		//require_once "/DWES/NO DUAL/MVC/index.php?mod=nota&ope=index&idTab=8" ;

			else:
				$titulo=$tab->getTitulo();
				$idus=$tab->getIdUs();
				$url=$tab->getUrl();
				require_once "vista/editUserDib.dibujo.php";
			endif;

		else:
			$this->index();
		endif;
	}

	public function delete(){
		$this->Check();
		if(isset($_GET['iddib'])):
	 		Dibujo::deleteDraw($_GET['iddib'], $_GET['idus']);
	 		$this->index();
		else:
			$this->index();
		endif;
	}

	public function deleteUserDib(){
		$this->CheckUser();
		if(isset($_GET['iddib'])):
	 		Dibujo::deleteDraw($_GET['iddib'], $_GET['idus']);
	 		$this->indexUser();
		else:
			$this->indexUser();
		endif;
	}

	

}

?>