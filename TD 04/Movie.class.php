<?php
require_once 'MyPDO.imac.movies.include.php'; //TO DO : à modifier
require_once 'Genre.class.php';
require_once "Country.class.php";

/**
 * Classe Movie
 */
class Movie {

	/***********************ATTRIBUTS***********************/

	// Identifiant
	private $id = null;
	// Titre
	private $title = null;
	// Date de sortie
	private $releaseDate = null;
	//Identifiant du pays
	private $idCountry = null;

	/*********************CONSTRUCTEURS*********************/

	// Constructeur non accessible
	function __construct() {}

	/**
	 * Usine pour fabriquer une instance de Movie à partir d'un id (via la bdd)
	 * @param int $id identifiant du film à créer (bdd)
	 * @return Movie instance correspondant à $id
	 * @throws Exception s'il n'existe pas cet $id dans a bdd
	 */
	public static function createFromId($id){
		$stmt = MyPDO::getInstance()->prepare(<<<SQL
		SELECT * FROM movie WHERE id = ?;

SQL
		);
		$stmt->execute(array($id));
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Movie");
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
	 * Getter sur le titre
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Getter sur la date de sortie
	 * @return string $releaseDate
	 */
	public function getReleaseDate() {
		return $this->releaseDate;
	}

	/**
	 * Getter sur l'identifiant du pays
	 * @return string $idCountry
	 */
	public function getIdCountry() {
		return $this->idCountry;
	}

	/*******************GETTERS COMPLEXES*******************/

	/**
	 * Récupère tous les enregistrements de la table Movie de la bdd
	 * Tri par ordre décroissant sur la date de sortie
	 * puis par ordre alphabétique sur le titre
	 * @return array<Movie> liste d'instances de Movie
	 */
	public static function getAll() {
		$stmt = MyPDO::getInstance()->prepare(<<<SQL
		SELECT * FROM movie ORDER BY releaseDate DESC;

SQL
		);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Movie");
		if (($objects = $stmt->fetchAll()) !== false)
			return $objects;

		else
			throw new Exception("Les objets n'ont pas pu être créés !");
	}

	/**
	 * Récupère tous les films du réalisateur/de la réalisatrice
	 * Tri par ordre décroissant sur la date de sortie
	 * puis par ordre alphabétique sur le titre
	 * @param int $idDirector identifiant du réalisateur/de la réalisatrice
	 * @return array<Movie> liste d'instances de Movie
	 */
	public static function getFromDirectorId($idDirector){
		//TO DO next : #04 Jointure Cast - Movie
		$stmt = MyPDO::getInstance()->prepare(<<<SQL
		SELECT m.* FROM movie AS m INNER JOIN director AS d WHERE m.id = d.idMovie AND d.idDirector = ? ORDER BY m.releaseDate DESC, m.title ASC;

SQL
		);
		$stmt->execute(array($idDirector));
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Movie");
		if (($objects = $stmt->fetchAll()) !== false)
			return $objects;

		else
			throw new Exception("L'objet à partir de l'indice $idDirector n'a pas pu être créé !");
	}

	/**
	 * Récupère tous les films de l'act.eur.rice avec son rôle pour chaque
	 * Tri par ordre décroissant sur la date de sortie
	 * puis dans l'ordre alphabétique sur le titre
	 * @param int $idActor identifiant l'act.eur.rice
	 * @return array<Movie> liste d'instances de Movie
	 */
	public static function getFromActorId($idActor){
		// TO DO next : #04 Jointure Cast - Movie
		$stmt = MyPDO::getInstance()->prepare(<<<SQL
		SELECT m.*, a.name FROM movie AS m INNER JOIN actor AS a WHERE m.id = a.idMovie AND a.idActor = ? ORDER BY m.releaseDate DESC, m.title ASC;

SQL
		);
		$stmt->execute(array($idActor));
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Movie");
		if (($objects = $stmt->fetchAll()) !== false)
			return $objects;

		else
			throw new Exception("L'objet à partir de l'indice $idActor n'a pas pu être créé !");
	}

	/**
	 * Récupère les genres du film courant ($this)
	 * Tri par ordre alphabétique
	 * @return array<Genre> liste d'instances de Genre
	 */
	public function getGenres() {
		// TO DO next : #05 Classe Genre
		$stmt = MyPDO::getInstance()->prepare(<<<SQL
		SELECT g.* FROM genre AS g INNER JOIN moviegenre AS m WHERE m.idMovie = {$this->getId()} AND m.idGenre = g.id ORDER BY g.name ASC;

SQL
		);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Genre");
		if (($objects = $stmt->fetchAll()) !== false)
			return $objects;

		else
			throw new Exception("Les objets n'ont pas pu être créés !");
	}

	/**
	 * Récupère les films correspondants à la recherche
	 * Tri par ordre alphabétique
	 * @return array<Movie> liste d'instances de Movie
	 */
	static private function getAllFiltered($title = null, $dateFrom = null, $dateTo = null, $genres = null, $country = null, $cast = null) {

		$selectCountry = "SELECT movie.id FROM movie INNER JOIN country AS c ON movie.idCountry = c.code";
		if(!empty($country)) $selectCountry .= " WHERE c.code = '$country'";

		$selectDirector = "SELECT movie.id FROM movie INNER JOIN director AS d ON d.idMovie = movie.id INNER JOIN cast AS ca ON ca.id = d.idDirector";
		$selectActor = "SELECT movie.id FROM movie INNER JOIN actor AS a ON a.idMovie = movie.id INNER JOIN cast AS ca ON ca.id = a.idActor";
		if(!empty($cast)) {
			$selectDirector .= " WHERE CONCAT(ca.firstName, ' ', ca.lastname) LIKE '%$cast%' OR CONCAT(ca.lastName, ' ', ca.firstname) LIKE '%$cast%'";
			$selectActor .= " WHERE CONCAT(ca.firstName, ' ', ca.lastname) LIKE '%$cast%' OR CONCAT(ca.lastName, ' ', ca.firstname) LIKE '%$cast%'";
		}

		$selectGenre = "SELECT movie.id FROM movie INNER JOIN moviegenre AS mg ON mg.idMovie = movie.id INNER JOIN genre AS g ON g.id = mg.idGenre";
		if(!empty($genres)) {
			$aGenres = implode("', '", $genres);
			$selectGenre .=  " WHERE g.name IN('$aGenres')";
		}


		$condition = "";
		if(!(empty($dateFrom) && empty($dateTo))) {

			if(empty($dateFrom)){
				$condition .= " AND m.releaseDate <= '$dateTo'";
			} else if(empty($dateTo)) {
				$condition .= " AND m.releaseDate >= '$dateFrom'";
			} else {
				$condition .= " AND m.releaseDate BETWEEN '$dateFrom' AND '$dateTo'";
			}

		}

		if(!empty($title)) {
			$condition .= " AND m.title LIKE '%$title%'";
		}

		//echo "SELECT DISTINCT m.* FROM movie AS m WHERE m.id IN ($selectCountry) AND m.id IN ($selectDirector) OR m.id IN ($selectActor) AND m.id IN ($selectGenre) $condition;";

		$stmt = MyPDO::getInstance()->prepare(<<<SQL
		SELECT DISTINCT m.* FROM movie AS m WHERE m.id IN ($selectCountry) AND (m.id IN ($selectDirector) OR m.id IN ($selectActor)) AND m.id IN ($selectGenre) $condition;

SQL
		);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Movie");
		if (($objects = $stmt->fetchAll()) !== false)
			return $objects;

		else
			throw new Exception("Les objets n'ont pas pu être créés !");
	}

	static public function getFromPost($post) {
		$title = null;
		$genres = null;
		$dateFrom = null;
		$dateTo = null;
		$country = null;
		$cast = null;

		//var_dump($post);

		if(!empty($post['genres'])) $genres = $post['genres'];
		if(!empty($post['date1'])) $dateFrom = (new DateTime($post['date1']))->format("Y");
		if(!empty($post['date2'])) $dateTo = (new DateTime($post['date2']))->format("Y");
		if(!empty($post['title'])) $title = $post['title'];
		if(!empty($post['country'])) $country = $post['country'];
		if(!empty($post['cast'])) $cast = $post['cast'];

		return SELF::getAllFiltered($title, $dateFrom, $dateTo, $genres, $country, $cast);
	}

	/*******************FONCTIONS AJOUTEES*******************/

	public function renderHTML() {

		$pGenre = "<dd>GENRE : ";
		$genres = $this->getGenres();
		foreach($genres as $genre) {
			$pGenre .= "{$genre->getName()}; ";
		}
		$pGenre .= "</dd>";

		$country = Country::createFromCode($this->getIdCountry());

		echo <<<MOVIE
		<dl>
			<dt>{$this->title}</dt>
			<dd>RELEASEDATE : {$this->releaseDate}</dd>
			<dd>COUNTRY : {$country->getName()}</dd>
			$pGenre
		</dl>
MOVIE;
	}

}
?>
