<?php
    session_start();
    include("functions.php");
	
	//Script du traitement du formulaire d'authentification
	if(isset($_POST["Envoyer"]) && !empty($_POST["email"]) && !empty($_POST["password"])){
		$email=nettoyer_donnees($_POST["email"]);
		$mdp=nettoyer_donnees($_POST["password"]);

        try{
			//Ouvrir la connexion à la bd
			require("connexionBDD.php");

			$reqSQL = "SELECT * FROM Compte WHERE email=:email";
			//préparer, exécuter la requête et récuperer le résultat
			$req = $conn->prepare($reqSQL);
			$req->execute(array(':email'=>$email));
			$resultat = $req->fetchAll(PDO::FETCH_ASSOC);
			//Fermer la connexion
			$conn = NULL;
		}
		catch(Exception $e){
			die("Erreur : " . $e->getMessage());
		}
        
        if (isset($_POST['remember'])) {
            setcookie("email", $email, time()+365*24*3600);
            setcookie("password", $mdp, time()+365*24*3600);
            setcookie("remember", $_POST['remember'], time()+365*24*3600);
        }
        else {
            setcookie("email", "", time());
            setcookie("password", "", time());
            setcookie("remember", "", time());
        }

		if(!empty($resultat) && password_verify($mdp, $resultat[0]['mdp'])){
            $_SESSION["email"]=$resultat[0]['email'];
			$_SESSION["name"]=$resultat[0]['name'];
            $_SESSION["profilePicture"]=$resultat[0]['profilePicture'];
            $_SESSION["admin"]=$resultat[0]['admin'];
			$_SESSION["id"]=$resultat[0]['id'];
			$_SESSION["authentifie"]=true;
			header("Location: page_profil.php");
		}
        else {
            setcookie("errorConnexion", true, time()+20);
        }
	}
    header("Location: page_connexion.php");
?>