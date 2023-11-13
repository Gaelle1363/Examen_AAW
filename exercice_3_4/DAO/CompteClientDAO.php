<?php

  include('DO\CompteClientDO.php');
  use ComtpeClient as ComtpeClient;

class AccesBDDComtpeClient{
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
function recupererListeComtpeClient() {
$this-> connectionBdd();
$res = $this->conn->query("SELECT Id,numero_compte,type_comtpe,decouvert_autorise,type_carte,plafond_carte FROM compte_client");


$i = 0;

$compteclient = [];
//convertion
foreach ($res as $row) {
  $util = new ComtpeClient;
  $util->id_compte = $row['Id'];
  $util->numero_compte = $row['numero_compte'];
  $util->type_comtpe = $row['type_comtpe'];
  $util->decouvert_autorise = $row['decouvert_autorise'];
  $util->type_carte = $row['type_carte'];
  $util->plafond_carte = $row['plafond_carte'];
  $compteclient[$i] = $util;
  $i++;
}
return $compteclient;


}


}
;

?>
