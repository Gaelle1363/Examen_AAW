<?php
	include('acces_bdd.php');
?>

<html>

	<head>
		<title>Liste des clients</title>
		<!--<link href="style.css" rel="stylesheet">-->
	</head>

	<body>
	<div>
			<h1 style='text-align:center'>Bienvenue sur la plateforme de gestion de client de la banque Exam</h1>

<?php

		$resClient = recupererListeClient();
		$resAgence = recupererListeAgence();
		$resConseiller = recupererListeConseiller();
		$resCompteClient = recupererListeCompteClient();
		$resLigneCompte = recupererListeLigneCompte();
		$resEmbauche = recupererListeEmbauche();
		$resgestion = recupererListeGestion();

	// Affichage à l'écran
	foreach ($resClient as $row) {
        //var_dump($row);
		echo '<div> Nom & prenom du client : <button id="'.$row['Id'] .' " onclick="{ if(document.getElementById(`cache'.$row["Id"].'`).style.display=`none`){document.getElementById(`cache'.$row["Id"].'`).style.display=`block`; console.log(`working !!`)} else if (document.getElementById(`cache'.$row["Id"].'`).style.display=`block`){document.getElementById(`cache'.$row["Id"].'`).style.display=`none`;  console.log(`working ? `)}  }">'.$row['nom']. '  '. $row['prenom'] .'</button><div id="cache'.$row["Id"].'" style="display:none;"> AGE : ' . $row['age']  .' <br> SITUATION FAMILIALE :  '. $row['situation_familiale'] .' <br> NOMBRE ANNEE ANCIENNETE : ' . $row['annee_anciennete'] .' <br>NUMERO COMPTE : '. $row['numero_compte'].'  '.'</div></div>';

		echo '<br/>';

	}

	// Fermeture de la connexion
	/*if ($conn != null)
		$conn->close();*/
?>
		</div>

	</body>
</html>
