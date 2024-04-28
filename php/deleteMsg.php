<?php

session_start();

if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 0){
	header("location:../index.php");
	die();
}

if (isset($_GET["id"])){

	try{
		require("connexionBDD.php");

		$req = "DELETE FROM contact WHERE id=?";
		$req = $conn->prepare($req);
		$req->execute(array($_GET["id"]));

		$conn = NULL;
		header("location:page_liste_messages_recue.php");
	}


	catch(Exception $e){
		die("Erreur : " . $e->getMessage());
	}
}

else{
	header("location:../index.php");
}