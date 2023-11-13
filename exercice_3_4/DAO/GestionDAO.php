<?php

  include('DO\GestionDO.php');
  use Gestion as Gestion;

class AccesBDDGestion{
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
function recupererListeGestion() {
$this-> connectionBdd();
$res = $this->conn->query("SELECT Id_conseiller, Id_client	 FROM gestion");


$i = 0;

$gestion = [];
//convertion
foreach ($res as $row) {
  $util = new Gestion;
  $util->id_conseiller = $row['Id_conseiller'];
  $util->id_client = $row['Id_client'];
  $gestion[$i] = $util;
  $i++;
}
return $gestion;


}

}
;

?>
