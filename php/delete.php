<?php
    session_start();

    try{
		//Ouvrir la connexion à la bd
		require("connexionBDD.php");

		$reqSQL = "DELETE FROM Compte WHERE email=:email";
		//préparer, exécuter la requête et récuperer le résultat
		$req = $conn->prepare($reqSQL);
		$req->execute(array(':email'=>$_SESSION['email']));

		if ($_SESSION['profilePicture'] != "pp_default.jpg") {
			unlink("../img/compte/".$_SESSION['profilePicture']);
		}
		//Fermer la connexion
		$conn = NULL;
	}
	catch(Exception $e){
		die("Erreur : " . $e->getMessage());
	}


    header("location: logout.php");
?>