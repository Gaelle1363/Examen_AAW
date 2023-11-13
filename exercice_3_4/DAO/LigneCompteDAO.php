<?php

  include('DO\LigneCompteDO.php');
  use LigneCompte as LigneCompte;

class AccesBDDLigneCompte{
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
function recupererListeLigneCompte() {
$this-> connectionBdd();
$res = $this->conn->query("SELECT Id_transaction,Id_client,Montant_transaction,Objet_transaction,Type_transaction,Autorise		 FROM ligne_compte");


$i = 0;

$lignecompte = [];
//convertion
foreach ($res as $row) {
  $util = new LigneCompte;
  $util->id_transaction = $row['Id_transaction'];
  $util->id_client = $row['Id_client'];
  $util->montant_transaction = $row['Montant_transaction'];
  $util->objet_transaction = $row['Objet_transaction'];
  $util->type_transaction = $row['Type_transaction'];
  $util->autorise = $row['Autorise'];
  $lignecompte[$i] = $util;
  $i++;
}
return $lignecompte;


}

}
;

?>
