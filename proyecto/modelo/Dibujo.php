<?php 

require_once "Database.php";

class Dibujo{

	private $iddib;
	private $titulo;
	private $idus;
	private $url;
	private $idgal;

	public function __construct(){

	}

	function getIdDib(){
		return $this->iddib;
	}

	function getTitulo(){
		return $this->titulo;
	}

	function getIdUs(){
		return $this->idus;
	}

	function getUrl(){
		return $this->url;
	}

	public function setIdUs($idus){
		$this->idus=$idus;
	}

	public function setTitulo($tit){
		$this->titulo=$tit;
	}

	public function setIdDib($iddib){
		$this->iddib=$iddib;
	}

	public function setUrl($url){
		$this->url=$url;
	}


	public function getAllDraws($id){
		$bd=Database::getInstance();
		$bd->doQuery("SELECT * FROM dibujo WHERE idus=:idus;",[":idus"=>$id]);

		$datos = [];

		while($item=$bd->getRow("Dibujo")):
			array_push($datos, $item);
		endwhile;
		
		return $datos;
	}

	public function getAllDrawsById($id){
		$bd=Database::getInstance();
		$bd->doQuery("SELECT * FROM dibujo WHERE iddib=:iddib;",[":iddib"=>$id]);

		$datos = [];

		while($item=$bd->getRow("Dibujo")):
			array_push($datos, $item);
		endwhile;
		
		return $datos;
	}

	public function getAllTitulos(){
		$bd=Database::getInstance();
		$bd->doQuery("SELECT * FROM dibujo;");
		$datos = [];

		while($item=$bd->getRow("Dibujo")):
			array_push($datos, $item);
		endwhile;
		
		return $datos['titulo'];

	}

	public function getAll(){
		$bd=Database::getInstance();
		$bd->doQuery("SELECT * FROM dibujo;");

		$datos = [];

		while($item=$bd->getRow("Dibujo")):
			array_push($datos, $item);
		endwhile;
		
		return $datos;
	}

	public function getPage($page){
//numregpag

		//calcular registro de comienzoç
		//regcomienzo = page-1 * numregpag

		//LIMIT  regcomienzo, numregpag

	}

	public function insertDraw(){
		$bd= Database::getInstance();
		$bd->doQuery("INSERT INTO dibujo (titulo, idus, url) VALUES (:tit, :idus, :url);", [":tit"=>$this->titulo, ":idus"=>$this->idus, ":url"=>$this->url]);
		$this->idus= $bd->getLastId();
	}


	public static function getDraw($id){
		$bd= Database::getInstance();
		$bd->doQuery("SELECT * FROM dibujo WHERE iddib=:iddib;",
									[":iddib"=>$id]);
		return $bd->getRow("Dibujo");
	}

	public static function getDrawByTitle($tit){
		$bd= Database::getInstance();
		$bd->doQuery("SELECT * FROM dibujo WHERE titulo=:tit;",
									[":tit"=>$tit]);
		return $bd->getRow("Dibujo");
	}

	public function updateDraw(){
		$bd=Database::getInstance();
		$bd->doQuery("UPDATE dibujo SET titulo=:tit, idus=:idus, url=:url WHERE iddib=:iddib;",
					[":iddib"=>$this->iddib,
					":tit"=>$this->titulo,
					":idus"=>$this->idus,
					":url"=>$this->url]);
	}

	public static function deleteDraw($id,$idus){
		$bd=Database::getInstance();
		$bd->doQuery("DELETE FROM dibujo WHERE iddib=:iddib AND idus=:idus;",
					[":iddib"=>$id,
					":idus"=>$idus]);
	}

}

?>
