<?php
include('DO\ClientDO.php');
use Client as Client;


//namespace BDD;
//dao
class AccesBDD{


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
  			//return $conn;
  	}
  	catch(PDOException $e) {
  		die("Erreur : " . $e->getMessage());
  	}
  }

  function recupererListeClient() {

  $this->connectionBdd();
    $res =$this->conn->query("SELECT Id,nom,prenom,age,situation_familiale,annee_anciennete,numero_compte	 FROM client");


    $i = 0;

		$clients = [];
		//convertion
		foreach ($res as $row) {
			$util = new Client;
			$util->id_client = $row['Id'];
			$util->nom = $row['nom'];
			$util->prenom = $row['prenom'];
      $util->age = $row['age'];
			$util->situation_familiale = $row['situation_familiale'];
      $util->annee_anciennete = $row['annee_anciennete'];
			$util->numero_compte = $row['numero_compte'];
			$clients[$i] = $util;
			$i++;
		}


		return $clients;
	}

}
?>
