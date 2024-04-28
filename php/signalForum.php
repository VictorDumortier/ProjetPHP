<?php 
	session_start();

	//si un problème intervient on renvoie sur la page précedament visiter (signalement avec argument GET)
	if(!isset($_POST["Envoyer"]) || !isset($_SESSION["id"])) {
		header("location:".$_SERVER['HTTP_REFERER']);
	}

	require("functions.php");

	$id_compte = nettoyer_donnees($_POST["id_compte"]); //id de la personne ayant signalé le message
	$motif = nettoyer_donnees($_POST["msg"]); // message explicatif sur la raison du signalement 
	$id_signal = nettoyer_donnees($_POST["id_signal"]); //id du message/forum signalé
	$msg_signal = nettoyer_donnees($_POST["msg_signal"]); //copie du message signalé dans le cas ou l'auteur l'aurais modifié
	$type_forum = nettoyer_donnees($_POST["type"]); //true si le signalement concerne un forum, false si il s'agit d'un seule message

	if(empty($id_compte) || empty($motif) || empty($id_signal) || empty($msg_signal)) {
		header("location:".$_SERVER['HTTP_REFERER']);// Au moins l'une des variables est vide
	}

    //preparation de la requete SQL 

    try {
        require("connexionBDD.php"); //$conn
        $req = "INSERT INTO signalement (id_compte, motif, id_signal, msg_signal, type_forum) VALUES (:id_compte, :motif, :id_signal, :msg_signal, :type_forum)";
        $req = $conn->prepare($req);
        $req->execute(array(":id_compte"=>$id_compte, ":motif"=>$motif, ":id_signal"=>$id_signal, ":msg_signal"=>$msg_signal, ":type_forum"=>$type_forum));
    }

    catch(Exception $e){
         header("location:../index.php");
         die("Erreur : " . $e->getMessage());
    }

?>

<!-- Afichage d'une confirmation -->

    <style>
        /* Styles pour le conteneur principal */
        .container {
            display: flex;
            font-family : Arial;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 98vh; /* Hauteur de la fenêtre */
        }

        /* Styles pour le lien hypertexte bouton */
        .btn {
            padding: 10px 20px;
            background-color: #007bff; /* Couleur de fond */
            color: white; /* Couleur du texte */
            text-decoration: none; /* Supprime les soulignements par défaut */
            border-radius: 5px; /* Coins arrondis */
            transition: background-color 0.3s; /* Transition fluide de couleur de fond */
        }

        /* Changement de couleur de fond au survol */
        .btn:hover {
            background-color: #0056b3; /* Nouvelle couleur de fond au survol */
        }
    </style>

        <div class="container">
            <h1>Signalement soumis</h1>
            <a href="page_list_forum.php" class="btn">Retour</a>
        </div>