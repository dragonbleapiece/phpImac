<?php
require_once 'MyPDO.imac.movies.include.php'; //TO DO : à modifier

/**
 * Classe Country
 */
class Country {

	/***********************ATTRIBUTS***********************/

	// Identifiant
	private $code = null;
	// Nom
	private $name = null;


	/*********************CONSTRUCTEURS*********************/

	// Constructeur non accessible
	function __construct() {}

	/**
	 * Usine pour fabriquer une instance de Country à partir d'un code (via la bdd)
	 * @param int $id identifiant du Country à créer (bdd)
	 * @return Country instance correspondant à $code
	 * @throws Exception s'il n'existe pas cet $id dans a bdd
	 */
	public static function createFromCode($code){
		// TO DO
		$stmt = MyPDO::getInstance()->prepare(<<<SQL
		SELECT * FROM country WHERE code = ?;

SQL
		);
		$stmt->execute(array($code));
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Country");
		if (($object = $stmt->fetch()) !== false)
			return $object;

		else
			throw new Exception("L'objet d'indice $code n'a pas pu être créé !");

	}

	/********************GETTERS SIMPLES********************/

	/**
	 * Getter sur l'identifiant
	 * @return int $id
	 */
	public function getCode() {
		// TO DO
		return $this->code;
	}

	/**
	 * Getter sur le nom
	 * @return string $name
	 */
	public function getName() {
		// TO DO
		return $this->name;
	}

	/*******************GETTERS COMPLEXES*******************/

	/**
	 * Récupère tous les enregistrements de la table Country de la bdd
	 * Tri par ordre alphabétique
	 * @return array<Country> liste d'instances de Country
	 */
	public static function getAll() {
		// TO DO
		$stmt = MyPDO::getInstance()->prepare(<<<SQL
		SELECT * FROM country ORDER BY name ASC;

SQL
		);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Country");
		if (($objects = $stmt->fetchAll()) !== false)
			return $objects;

		else
			throw new Exception("Les objets n'ont pas pu être créés !");
	}
}
?>
