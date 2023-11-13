<?php

  include('DO\EmbaucheDO.php');
  use Embauche as Embauche;

class AccesBDDEmbauche{
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
function recupererListeEmbauche() {
$this-> connectionBdd();
$res = $this->conn->query("SELECT Id_agence,Id_conseiller	 FROM embauche");


$i = 0;

$embauche = [];
//convertion
foreach ($res as $row) {
  $util = new Embauche;
  $util->id_agence = $row['Id_agence'];
  $util->id_conseiller = $row['Id_conseiller'];
  $embauche[$i] = $util;
  $i++;
}
return $embauche;


}

}
;

?>
