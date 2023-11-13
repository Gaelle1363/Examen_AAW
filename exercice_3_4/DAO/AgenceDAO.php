<?php

  include('DO\AgenceDO.php');
  use Agence as Agence;

class AccesBDDAgence{
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
function recupererListeAgence() {
$this-> connectionBdd();
$res = $this->conn->query("SELECT Id,ville,adresse,numéro_accueil,directeur_agence		 FROM agence");


$i = 0;

$agence = [];
//convertion
foreach ($res as $row) {
  $util = new Agence;
  $util->id_Agence = $row['Id'];
  $util->ville = $row['ville'];
  $util->adresse = $row['adresse'];
  $util->numero_acceuil = $row['numéro_accueil'];
  $util->directeur_agence = $row['directeur_agence'];
  $agence[$i] = $util;
  $i++;
}
return $agence;


}


}

?>
