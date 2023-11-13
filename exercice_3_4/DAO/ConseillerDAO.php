<?php

  include('DO\ConseillerDO.php');
  use Conseiller as Conseiller;

class AccesBDDConseiller{
	public $conn;

	// Connexion à la base de données
	function connectionBdd() {

    // Déclaration des variables de connexion
	$DB_HOST = "127.0.0.1";
	$DB_NAME = "examen_test";
	$DB_PORT = 3306;
	$DB_USER = "root";
	$DB_PSWD = "";

	try {
		$connString =
			"mysql:host=".$DB_HOST.";dbname=".$DB_NAME.";
			port=".$DB_PORT.";charset=utf8";
			$this->conn = new PDO($connString, $DB_USER, $DB_PSWD);

	}
	catch(PDOException $e) {
		die("Erreur : " . $e->getMessage());
	}
}


// Requête de récupération des données en BDD
function recupererListeConseiller() {
$this-> connectionBdd();
$res = $this->conn->query("SELECT Id,Nom,prenom,age,annee_anciennete,nombre_client		 FROM conseiller");


$i = 0;

$conseiller = [];
//convertion
foreach ($res as $row) {
  $util = new Conseiller;
  $util->id_conseiller = $row['Id'];
  $util->nom = $row['Nom'];
  $util->prenom = $row['prenom'];
  $util->age = $row['age'];
  $util->annee_anciennete = $row['annee_anciennete'];
  $util->nombre_client = $row['nombre_client'];
  $conseiller[$i] = $util;
  $i++;
}
return $conseiller;


}

}
;

?>
