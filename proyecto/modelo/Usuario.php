<?php 

require_once "Database.php";

class Usuario{

	private $nombre;
	private $apellidos;
	private $usuario;
	private $rol;
	private $email;
	private $pass;
	private $idus;

	public function __construct(){

	}

	function getIdUs(){
		return $this->idus;
	}

	 function getNombre() {
        return $this->nombre;
    }

     function getApellidos() {
        return $this->apellidos;
    }

     function getUsuario() {
        return $this->usuario;
    }

     function getRol() {
        return $this->rol;
    }

    function getPass() {
        return $this->pass;
    }

     function getEmail() {
        return $this->email;
    }

    public function setNombre($nom){
		$this->nombre=$nom;
	}

	public function setApellidos($ape){
		$this->apellidos=$ape;
	}

	public function setUsuario($usr){
		$this->usuario=$usr;
	}

	public function setRol($rol){
		$this->rol=$rol;
	}

	public function setPass($pass){
		$this->pass=$pass;
	}

	public function setEmail($email){
		$this->email=$email;
	}

	public function getAllUsers(){
		$bd=Database::getInstance();
		$bd->doQuery("SELECT * FROM usuario;");

		$datos = [];

		while($item=$bd->getRow("Usuario")):
			array_push($datos, $item);
		endwhile;
		
		return $datos;
	}

	public function insertUser(){
		$bd= Database::getInstance();
		$bd->doQuery("INSERT INTO usuario (nombre, apellidos, usuario, rol, pass, email) VALUES (:nom, :ape, :usr, 'usuario', :pass, :email);", [":nom"=>$this->nombre, ":ape"=>$this->apellidos, ":usr"=>$this->usuario, ":pass"=>$this->pass, ":email"=>$this->email]);
		$this->idus= $bd->getLastId();
	}

	public function insertAdmin(){
		$bd= Database::getInstance();
		$bd->doQuery("INSERT INTO usuario (nombre, apellidos, usuario, rol, pass, email) VALUES (:nom, :ape, :usr, 'admin', :pass, :email);", [":nom"=>$this->nombre, ":ape"=>$this->apellidos, ":usr"=>$this->usuario, ":pass"=>$this->pass, ":email"=>$this->email]);
		$this->idus= $bd->getLastId();
	}

	public static function getUser($id){
		$bd= Database::getInstance();
		$bd->doQuery("SELECT * FROM usuario WHERE idus=:idus;",
									[":idus"=>$id]);
		return $bd->getRow("Usuario");
	}

	public static function getIdByName($usr){
		$bd= Database::getInstance();
		$bd->doQuery("SELECT * FROM usuario WHERE usuario=:usr;",
									[":usr"=>$usr]);
		return $var= $bd->getRow("Usuario");
		
	}

	public static function getUserByName($usr){
		$bd= Database::getInstance();
		$bd->doQuery("SELECT * FROM usuario WHERE usuario=:usr;",
									[":usr"=>$usr]);
		return $bd->getRow("Usuario");
	}

	public function updateUser(){
		$bd=Database::getInstance();
		$bd->doQuery("UPDATE usuario SET nombre=:nom, apellidos=:ape, usuario=:usr, pass=:pass, email=:email WHERE idus=:idus;",
					[":idus"=>$this->idus,
					":nom"=>$this->nombre,
					":ape"=>$this->apellidos,
					":usr"=>$this->usuario,
					":pass"=>$this->pass,
					":email"=>$this->email]);
	}

	public static function deleteUser($id){
		$bd=Database::getInstance();
		$bd->doQuery("DELETE FROM usuario WHERE idus=:idus;",
					[":idus"=>$id]);
	}

	public function compruebaUser($usr, $pass){
		$bd=Database::getInstance();
		$us=$bd->doQuery("SELECT * FROM usuario WHERE usuario=:usr AND pass=:pass",
					[":usr"=>$usr,
					":pass"=>$pass]);
		return $us;

	}

}
 ?>