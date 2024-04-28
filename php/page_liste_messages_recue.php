<?php
    session_start();
    if (isset($_SESSION["admin"]) && $_SESSION == 0){
        header("location:index.php");
        die();
    }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title> Super Sith </title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/list_message.css"> 
    <link rel="shortcut icon" href="../img/fonctionnel/logo_1.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<?php include('header.php'); ?>
<main>
    <div id="Titre">
        <h1>Messages recue :</h1>
        </div>
    </div>
    
    <div id="container">

        <div id="list_message">

        <?php

            try{
                require("connexionBDD.php"); //$conn
    
                //preparation de la requete SQL pour obtenir les infos des forums et de leur auteurs
                $req = "SELECT * FROM contact ";
                $req = $conn->prepare($req);
                $req->execute();

                $resultat_list_message = $req->fetchAll(PDO::FETCH_ASSOC); 

                //affichage de la liste des msg
                foreach ($resultat_list_message as $value){

                    echo '<div class="message">'; 
                    echo '<h4 class="titre"> Sujet : '. $value["sujet"]. '</h4>';
                    echo '<p class="auteur"> Nom : '.$value["name"]. '</p>';
                    echo '<p class="email">Email : '. $value["email"]. '</p>';
                    echo '<p class="msg">'. $value["message"]. '</p>';
                    echo '<a class="btn" href="deleteMsg.php?id='.$value["id"].'">Supprimer ce message</a>';
                    echo '</div>';
                }

                $conn = NULL; //destruction de la connection à la BD
            }
            
            catch(Exception $e){
	                die("Erreur : " . $e->getMessage());
            }

        ?>
        </div>

</main>

    <?php include('footer.php') ?>

</body>
</html>