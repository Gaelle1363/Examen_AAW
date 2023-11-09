<?php

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
			$conn = new PDO($connString, $DB_USER, $DB_PSWD);
			return $conn;
	}
	catch(PDOException $e) {
		die("Erreur : " . $e->getMessage());
	}
}

// Requête de récupération des données en BDD
function recupererListeClient() {
	$conn = connectionBdd();
	$res = $conn->query("SELECT Id,nom,prenom,age,situation_familiale,annee_anciennete,numero_compte	 FROM client");
	return $res;
}

function recupererListeConseiller() {
	$conn = connectionBdd();
	$res = $conn->query("SELECT Id,Nom,prenom,age,annee_anciennete,nombre_client		 FROM conseiller");
	return $res;
}
	function recupererListeAgence() {
		$conn = connectionBdd();
		$res = $conn->query("SELECT Id,ville,adresse,numéro_accueil,directeur_agence		 FROM agence");
		return $res;
	}
	function recupererListeCompteClient() {
		$conn = connectionBdd();
		$res = $conn->query("SELECT Id,numero_compte,type_comtpe,decouvert_autorise,type_carte,plafond_carte FROM compte_client");
		return $res;
	}
	function recupererListeLigneCompte() {
		$conn = connectionBdd();
		$res = $conn->query("SELECT Id_transaction,Id_client,Montant_transaction,Objet_transaction,Type_transaction,Autorise		 FROM ligne_compte");
		return $res;
	}
	function recupererListeEmbauche() {
		$conn = connectionBdd();
		$res = $conn->query("SELECT Id_agence,Id_conseiller	 FROM embauche");
		return $res;
	}
	function recupererListeGestion() {
		$conn = connectionBdd();
		$res = $conn->query("SELECT Id_conseiller, Id_client	 FROM gestion");
		return $res;
	}

?>
