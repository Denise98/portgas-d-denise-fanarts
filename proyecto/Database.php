<?php
class Database{
	private $dbHost ="localhost";
	private $dbUser ="root";
	private $dbPort ="3306";
	private $dbPass ="";
	private $dbName ="fanart";

	private static $prp;
	private static $pdo = null;

	//vamos a aplicar el metodo singleton:para ello comentamos el antiguo constructor
	/*public function _construct(){
		$this->conectar()*/
	//

	private static $instancia = null;
	public function __construct(){
		$this->conect();
	}
	private function __clone(){
		
	}

	//como este metodo es a nivel clase ya que exista o no el objeto el metodo ha de crear instancia

	//puedo acceder desde fuerA de la clase si Y solo si es static objeto::y. si no es estatica $obj->y' de un objeto en concreto no de la clase.

    public static function getInstance(){
    	if(is_null(self::$instancia)):
    		self::$instancia =new Database();
    	endif;
    	return self::$instancia;
    }


	


	

//transformo en privado el metodo conect ya que al hacer el getInsta
	public function conect(){

		try{
			self::$pdo = new PDO("mysql:host={$this->dbHost};port={$this->dbPort};dbname={$this->dbName};charset=utf8;",
			$this->dbUser,
			$this->dbPass) ;
		} catch (Exception $e){
		die ("Error en conectar la BBDD");
		}
	}

	

	public function doQuery($sql, $params=[]){
		// Realizo la consulta a la base de datos y la recojo para generar el Objeto "PDOStatement"
				self::$prp = self::$pdo->prepare($sql) ;
		
		//Bindeamos los parámetros del Objeto "PDOStatement"
				/*foreach ($variable as $key => $value) {
					self::$prp->bindParam($key, $valor) ;
					# code...
				}
				endforeach;
				// todo el foreach se podria ejecutar la sentencia en una sola linea.
				$flg = self::$prp->execute($params);

				// ejecutamos la sentencia del Objeto PDOStatement y guardamos el valor en una variable $flg para poder analizar 
				$flg = self::$prp->execute() ;*/


				// desde el foreach hasta la linea 33 ($flg = self::$prp->execute() ;)se podria ejecutar la sentencia en una sola linea.

				$flg = self::$prp->execute($params);


				//devuelve TRUE si es correcto (insert, update, delete) Esto se consigue con rowCount()y false si la consulta es incorrecta  o no hay valor (en una consulta select)
				if (($flg) && (self::$prp->rowCount() > 0))  return true;
				else return false;

				//return ($flg) && (self::$prp->rowCount() > 0) ; 
	}

	public function getRow($class){
		if (self::$prp)
		return self::$prp -> fetchObject($class);

} 
//FetchObject devuelve un objeto estandar (std) pero si le incluimos al metodo getRow como parametro la variable clase, el objeto que devuelve fetchObject tambien es de tipo class. De esta forma, si desde el index hago un echo print- r de getRow($user)cuando exista. 
//Asi, si desde Sesión llamamos a Database y hacemos la consulta con el metodo doQuery ($sql), posteriormente mediante el metodo getRow sobre la clase ($sesion o $user)obtenemos el primer objeto.
	public function getString(){
		if(self::$prp)
			return self::$prp->fetchAll();
	}

	public function getLastId()
  {
    return self::$pdo->lastInsertId();
  }
	}

	
	
