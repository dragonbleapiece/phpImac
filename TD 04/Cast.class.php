<?php
require_once 'MyPDO.imac.movies.include.php'; // TO DO : à modifier

/**
 * Classe Cast
 */
class Cast {

	/***********************ATTRIBUTS***********************/

	// Identidiant
	private $id=null;
	// Prénom
	private $firstname=null;
	// Nom
	private $lastname=null;
	// Année de naissance
	private $birthYear=null;
	// Année de décès
	private $deathYear=null;

	/*********************CONSTRUCTEURS*********************/

	// Constructeur non accessible
	function __construct() {}

	/**
	 * Usine pour fabriquer une instance de Cast à partir d'un id (via la bdd)
	 * @param int $id identifiant du cast à créer (bdd)
	 * @return Cast instance correspondant à $id
	 * @throws Exception s'il n'existe pas cet $id dans a bdd
	 */
	public static function createFromId($id){
		// TO DO
		$stmt = MyPDO::getInstance()->prepare(<<<SQL
		SELECT * FROM cast WHERE id = ?;

SQL
		);
		$stmt->execute(array($id));
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Cast");
		if (($object = $stmt->fetch()) !== false)
			return $object;

		else
			throw new Exception("L'objet d'indice $id n'a pas pu être créé !");
	}

	/********************GETTERS SIMPLES********************/

	/**
	 * Getter sur l'identifiant
	 * @return int $id
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Getter sur le prénom
	 * @return string $firstname
	 */
	public function getFirstname() {
		return $this->firstname;
	}

	/**
	 * Getter sur le nom
	 * @return string $lastname
	 */
	public function getLastname() {
		return $this->lastname;
	}

	/**
	 * Getter sur l'année de naissance
	 * @return int $birthYear
	 */
	public function getBirthYear() {
		return $this->birthYear;
	}

	/**
	 * Getter sur l'année de décès
	 * @return int $deathYear (null si vivant)
	 */
	public function getDeathYear() {
		return $this->deathYear;
	}

	/**
	 * Vérifie si le cast est vivant.e
	 * @return bool
	 */
	public function isAlive() {
		return ($this->deathYear === null);
	}

	/*******************GETTERS COMPLEXES*******************/

	/**
	 * Récupère tous les enregistrements de la table Cast de la bdd
	 * Tri par ordre alphabétique sur le nom puis sur le prénom
	 * @return array<Cast> liste d'instances de Cast
	 */
	public static function getAll() {
		$stmt = MyPDO::getInstance()->prepare(<<<SQL
		SELECT * FROM cast ORDER BY birthYear DESC;

SQL
		);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Cast");
		if (($objects = $stmt->fetchAll()) !== false)
			return $objects;

		else
			throw new Exception("Les objets n'ont pas pu être créés !");
	}

	/**
	 * Récupère tou.te.s les réalisateurs/réalisatrices d'un film
	 * Tri par ordre alphabétique selon le nom puis le prénom
	 * @param  $idMovie identifiant du film
	 * @return array<Cast> liste des instances de Cast
	 */
	public static function getDirectorsFromMovieId($idMovie) {
		// TO DO next : #04 Jointure Cast - Movie
		$stmt = MyPDO::getInstance()->prepare(<<<SQL
		SELECT c.* FROM cast AS c INNER JOIN movie AS m  INNER JOIN director AS d WHERE c.id = d.idDirector AND m.id = d.idMovie AND m.id = ? ORDER BY c.lastname ASC, c.firstname ASC;

SQL
		);
		$stmt->execute(array($idMovie));
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Cast");
		if (($objects = $stmt->fetchAll()) !== false)
			return $objects;

		else
			throw new Exception("L'objet à partir de l'indice $idMovie n'a pas pu être créé !");
	}

	/**
	 * Récupère tou.te.s les acteurs/actrices d'un film avec leur rôle
	 * Tri par ordre alphabétique selon le nom puis le prénom
	 * @param  $idMovie identifiant du film
	 * @return array<Cast> liste d'instances de Cast
	 */
	public static function getActorsFromMovieId($idMovie) {
		// TO DO next : #04 Jointure Cast - Movie
		$stmt = MyPDO::getInstance()->prepare(<<<SQL
		SELECT c.*, a.name FROM cast AS c INNER JOIN movie AS m INNER JOIN actor AS a WHERE c.id = a.idActor AND m.id = a.idMovie AND m.id = ? ORDER BY c.lastname ASC, c.firstname ASC;

SQL
		);
		$stmt->execute(array($idMovie));
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Cast");
		if (($objects = $stmt->fetchAll()) !== false)
			return $objects;

		else
			throw new Exception("L'objet à partir de l'indice $idMovie n'a pas pu être créé !");
	}

	/*******************FONCTIONS AJOUTEES*******************/

	public function renderHTML() {
		$death = $this->isAlive() ? "" : "<dd>DEATHYEAR : {$this->deathYear}</dd>";

		echo <<<CAST
		<dl>
			<dt>{$this->firstname} {$this->lastname}</dt>
			<dd>BIRTHYEAR : {$this->birthYear}</dd>
			$death
		</dl>
CAST;
	}

}
?>
