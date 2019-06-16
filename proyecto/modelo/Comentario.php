<?php 

require_once "Database.php";

class Comentario{

	private $idcom;
	private $texto;
	private $iddib;
	private $idus;
	private $usuario;


	public function __construct(){

	}


	function getIdCom(){
		return $this->idcom;
	}

	function getTexto(){
		return $this->texto;
	}

	function getIdDib(){
		return $this->iddib;
	}

	function getIdUs(){
		return $this->idus;
	}

	function getUsuario(){
		return $this->usuario;
	}

	public function setIdCom($idcom){
		$this->idcom=$idcom;
	}

	public function setTexto($texto){
		$this->texto=$texto;
	}

	public function setIdDib($iddib){
		$this->iddib=$iddib;
	}

	public function setIdUs($idus){
		$this->idus=$idus;
	}

	public function setUsuario($usr){
		$this->usuario=$usr;
	}

	public function getAllComms($id){
		$bd=Database::getInstance();
		$bd->doQuery("SELECT * FROM comentario WHERE idus=:idus;",[":idus"=>$id]);

		$datos = [];

		while($item=$bd->getRow("Comentario")):
			array_push($datos, $item);
		endwhile;
		
		return $datos;
	}

	public function getAllCommsFromDraw($id){
		$bd=Database::getInstance();
		$bd->doQuery("SELECT * FROM comentario WHERE iddib=:iddib;",[":iddib"=>$id]);

		$datos = [];

		while($item=$bd->getRow("Comentario")):
			array_push($datos, $item);
		endwhile;
		
		return $datos;
	}

	public function insertComment(){
		$bd= Database::getInstance();
		$bd->doQuery("INSERT INTO comentario (texto, iddib, idus, usuario) VALUES (:tex, :iddib, :idus, :usr);", [":tex"=>$this->texto, ":iddib"=>$this->iddib, ":idus"=>$this->idus, ":usr"=>$this->usuario]);
		$this->idcom= $bd->getLastId();
	}

	public function join(){
		$bd=Database::getInstance();
		$bd->doQuery("SELECT url
						FROM dibujo D
						INNER JOIN comentario C
						ON D.iddib = C.iddib WHERE C.iddib=:iddib AND C.idus=:idus;",[":iddib"=>$this->iddib, ":idus"=>$_SESSION['varid']]);

		return $bd->getRow("Comentario");

	}

	public static function getComment($id){
		$bd= Database::getInstance();
		$bd->doQuery("SELECT * FROM comentario WHERE idcom=:idcom;",
									[":idcom"=>$id]);
		return $bd->getRow("Comentario");
	}


	public function updateComment(){
		$bd=Database::getInstance();
		$bd->doQuery("UPDATE comentario SET texto=:tex, iddib=:iddib, idus=:idus, usuario=:usr WHERE idcom=:idcom;",
					[":idcom"=>$this->idcom,
					":tex"=>$this->texto,
					":iddib"=>$this->iddib,
					":idus"=>$this->idus,
					":usr"=>$this->usuario]);
	}

	public static function deleteComment($id){
		$bd=Database::getInstance();
		$bd->doQuery("DELETE FROM comentario WHERE idcom=:idcom;",
					[":idcom"=>$id]);
	}
}

 ?>