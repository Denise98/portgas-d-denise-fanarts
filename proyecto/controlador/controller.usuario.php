<?php 

require_once "modelo/Usuario.php";
require_once "modelo/Dibujo.php";

class controllerUsuario{

	public function __construct()
	{
		
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

public function indexAdminUser(){

	if (isset($_SESSION['rol'])) {

		if ($_SESSION['rol']=='admin') {

			$datos= Usuario::getAllUsers();
			require_once "vista/indexAdminUser.usuario.php";

		} elseif($_SESSION['rol']=='usuario'){
			require_once "vista/indexUser.usuario.php";
		}else{
			require_once "vista/indexLogin.usuario.php" ;
		}
	} else{
		require_once "vista/indexLogin.usuario.php" ;
	}
}

public function indexUser(){

		$this->CheckUser();
	
			$datos=[];

			$datos = Dibujo::getAll();

		require_once "vista/indexUser.usuario.php";
	


}


public function createUser(){

	$this->Check();

		if(isset($_GET['usr'])):
		$usr = new Usuario();
		$usr->setNombre($_GET['nom']);
		$usr->setApellidos($_GET['ape']);
		$usr->setUsuario($_GET['usr']);
		$usr->setPass($_GET['pass']);
		$usr->setEmail($_GET['email']);
		$usr->insertUser();

		header("Location: /proyecto/index.php?mod=usuario&ope=indexAdminUser") ;
		else:
			require_once "vista/crearUser.usuario.php";
		endif;
	
}

public function register(){

	if(isset($_GET['usr'])):
	$usr = new Usuario();
	$usr->setNombre($_GET['nom']);
	$usr->setApellidos($_GET['ape']);
	$usr->setUsuario($_GET['usr']);
	$usr->setPass($_GET['pass']);
	$usr->setEmail($_GET['email']);
	$usr->insertUser();

	header("Location: /proyecto/index.php?mod=usuario&ope=indexLogin") ;
else:
	require_once "vista/register.usuario.php";
endif;
}

public function createAdmin(){
    $this->Check();

	if(isset($_GET['usr'])):
	$usr = new Usuario();
	$usr->setNombre($_GET['nom']);
	$usr->setApellidos($_GET['ape']);
	$usr->setUsuario($_GET['usr']);
	$usr->setPass($_GET['pass']);
	$usr->setEmail($_GET['email']);
	$usr->insertAdmin();

	header("Location: /proyecto/index.php?mod=usuario&ope=indexAdminUser") ;
else:
	require_once "vista/crearAdmin.usuario.php";
endif;
}

public function editUser(){

	$this->Check();

	$id=$_GET['idus']??"";

if(!empty($id)):
	$usr= Usuario::getUser($id);
	if(isset($_GET['usr'])):

		$usr->setNombre($_GET['nom']);
		$usr->setApellidos($_GET['ape']);
		$usr->setUsuario($_GET['usr']);
		$usr->setPass($_GET['pass']);
		$usr->setEmail($_GET['email']);
		$usr->updateUser();
		header("Location: /proyecto/index.php?mod=usuario&ope=indexAdminUser") ;

	else:
		$nombre=$usr->getNombre();
		$apellidos=$usr->getApellidos();
		$usuario=$usr->getUsuario();
		$pass=$usr->getPass();
		$email=$usr->getEmail();
		require_once "vista/editUser.usuario.php";
	endif;

else:
	header("Location: /proyecto/index.php?mod=usuario&ope=indexAdminUser") ;
endif;
}

public function deleteUser(){
	$this->Check();
	if(isset($_GET['idus'])):
	 Usuario::deleteUser($_GET['idus']);
	header("Location: /proyecto/index.php?mod=usuario&ope=indexAdminUser") ;
else:
	header("Location: /proyecto/index.php?mod=usuario&ope=indexAdminUser") ;
endif;
}

public function compruebaUser(){

	$usr = $_GET["usr"] ;
	$u=new Usuario;
	if(!empty($usr)):
		$var=Usuario::getUserByName($_GET['usr']);
		var_dump($var);

		
		
		
		$varid=$var->getIdUs();
		$_SESSION['varid']=$varid;

		$var2=Usuario::getUser($_SESSION['varid']);
		$varus=$var2->getUsuario();
		$_SESSION['varus']=$varus;
		var_dump($varid);
		//exit();

		if($usr=Usuario::getUserByName($usr)):

			$rol= $usr->getRol();
		
			if(isset($_GET['usr'])):
				if(Usuario::compruebaUser($_GET['usr'], $_GET['pass'])):
				
					if($rol=='admin'):
					$_SESSION['rol']='admin';
					header("Location: /proyecto/index.php?mod=usuario&ope=indexAdminUser") ;
				
					else:
						$_SESSION['rol']='usuario';
						
						header("Location: /proyecto/index.php?mod=usuario&ope=indexUser");
					
					endif;
				else:
				header("Location: /proyecto/index.php?mod=usuario&ope=indexLogin") ;
				echo "El usuario y/o la contraseña son incorrectos";
				endif;
			else:
			header("Location: /proyecto/index.php?mod=usuario&ope=indexLogin") ;
			echo "El usuario y/o la contraseña son incorrectos";
			endif;
		else:
		header("Location: /proyecto/index.php?mod=usuario&ope=indexLogin") ;
		echo "El usuario y/o la contraseña son incorrectos";
		endif;
	endif;
}

public function indexLogin(){
	 require_once "vista/indexLogin.usuario.php" ;
}


public function logout(){
	session_destroy();
	$_SESSION=array();

	header("Location: /proyecto/index.php?mod=usuario&ope=indexLogin") ;
}
}

 ?>