<?php
    session_start();
    require('connexionBDD.php');
    include('functions.php');

    if(isset($_POST["envoyer"]) && !empty($_POST["email"]) && !empty($_POST["name"]) && !empty($_POST["subject"]) && !empty($_POST["message"])){
		$email=nettoyer_donnees($_POST["email"]); 
        $name=nettoyer_donnees($_POST["name"]);
		$subject=nettoyer_donnees($_POST["subject"]);
        $message=nettoyer_donnees($_POST["message"]);
    }

    if (valider_email($email) && valider_nom($name)){
        try{
        $reqprep = "INSERT INTO contact (name,email,sujet,message) VALUES (:nom,:email,:sujet,:message)";
        $req = $conn->prepare($reqprep);
        $req->execute(array(
                            ":nom"=>$name,
                            ":email"=>$email,
                            ":sujet"=>$subject,
                            ":message"=>$message
                            ));
        }
        catch(Exception $e){
            die("Erreur : " . $e->getMessage());
        }
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
            <h1>Merci de nous avoir contactez nous vous répondrons au plus vite ;)</h1>
            <a href="../index.php" class="btn">Retour</a>
        </div>
