<?php
	include('DAO\ClientDOA.php');
	use AccesBDD as AccesBDD;
	include('DAO\AgenceDAO.php');
	use AccesBDDAgence as AccesBDDAgence;
	include('DAO\CompteClientDAO.php');
	use AccesBDDComtpeClient as AccesBDDComtpeClient;
	include('DAO\ConseillerDAO.php');
	use AccesBDDConseiller as AccesBDDConseiller;
	include('DAO\EmbaucheDAO.php');
	use AccesBDDEmbauche as AccesBDDEmbauche;
	include('DAO\GestionDAO.php');
	use AccesBDDGestion as AccesBDDGestion;
	include('DAO\LigneCompteDAO.php');
	use AccesBDDLigneCompte as AccesBDDLigneCompte;
?>

<html>

	<head>
		<title>Liste des clients</title>
	</head>

	<body style="font-family: 'Arial', sans-serif;font-size: 16px;color: #333;background-color: #fff;	line-height: 1.6;">
	<div>
			<h1 style=' margin: 10px;border: 2px solid #000; padding: 10px;display: inline-block; '>Bienvenue sur la plateforme de gestion de client de la banque Exam</h1>
<br><br>

<script>

function Affiche(id)
{

 if (document.getElementById('cache'+id).style.display == 'none')  {

	document.getElementById('cache'+id).style.display = 'block';

	} else if(document.getElementById('cache'+id).style.display == 'block') {

	document.getElementById('cache'+id).style.display = 'none';

	}
}


</script>


<?php
//Récupération des DAO et DO
$bdd = new AccesBDD;
$resClient = $bdd->recupererListeClient();
$bdd2 = new AccesBDDAgence;
$resAgence = $bdd2->recupererListeAgence();
$bdd3 = new AccesBDDComtpeClient;
$resCompteClient = $bdd3->recupererListeComtpeClient();
$bdd4 = new AccesBDDConseiller;
$resConseiller = $bdd4->recupererListeConseiller();
$bdd5 = new AccesBDDEmbauche;
$resEmbauche = $bdd5->recupererListeEmbauche();
$bdd6= new AccesBDDGestion;
$resGestion = $bdd6->recupererListeGestion();
$bdd7 = new AccesBDDLigneCompte;
$resLigneCompte = $bdd7->recupererListeLigneCompte();



/*
//Ligne de test pour vérifier la connection au DAO et DO
$count = count($resClient);
	for ($i = 0; $i < $count; $i++) {
		echo "connexion client réussi <br>";
	}
$count = count($resAgence);
	for ($i = 0; $i < $count; $i++) {
		echo "connexion agence réussi <br>";
	}
$count = count($resCompteClient);
	for ($i = 0; $i < $count; $i++) {
		echo "connexion CompteClient réussi <br>";
	}
$count = count($resConseiller);
	for ($i = 0; $i < $count; $i++) {
		echo "connexion conseiller réussi <br>";
	}
$count = count($resEmbauche);
	for ($i = 0; $i < $count; $i++) {
		echo "connexion embauche réussi <br>";
	}
$count = count($resGestion);
	for ($i = 0; $i < $count; $i++) {
		echo "connexion gestion réussi <br>";
	}
$count = count($resLigneCompte);
	for ($i = 0; $i < $count; $i++) {
		echo "connexion LigneCompte réussi <br>";
	}

*/



$count = count($resClient);
for ($i = 0; $i < $count; $i++) {
	echo " Client : ". $resClient[$i]->nom ."   ". $resClient[$i]->prenom ." <button type='button' name='button' onclick={Affiche(". $resClient[$i]->id_client .")} > Plus d'informations </button> <br>";
	echo "<div id='cache".$resClient[$i]->id_client . "' style='display:none'> AGE : " .$resClient[$i]->age   ." &emsp; SITUATION FAMILIALE :  ".$resClient[$i]->situation_familiale ." &emsp; NOMBRE ANNEE ANCIENNETE : " .$resClient[$i]->annee_anciennete. " &emsp;NUMERO COMPTE : ". $resClient[$i]->numero_compte. " </div>";

}


	// Fermeture de la connexion
	/*if ($conn != null)
		$conn->close();*/
?>
		</div>

	</body>
</html>
