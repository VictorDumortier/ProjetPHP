<?php
	session_start(); //Démarrer la session
	if(isset($_SESSION["authentifie"])){ // si un utilisateur est authentifié (session en cours)
		session_unset(); //détruire les variables de sessions
		session_destroy();//détruire la session
	}
    header("Location: page_connexion.php");
?>