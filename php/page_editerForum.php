<?php session_start()?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> Super Sith </title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/ModifSignalForum.css">
    <link rel="shortcut icon" href="../img/fonctionnel/logo_1.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>      
    
    <!-- redirection des personnes non connectés -->
    <?php if(!isset($_SESSION["id"])) header("location:page_list_forum.php")?>
    <?php include('header.php'); ?>

    <main>
        <div>
            <?php
            if (($_GET["type"] == true)) echo "<h1 id='Title'>Modification d'un forum</h1>";
            else echo "<h1 id='Title'>Modification d'un message</h1>";
            ?>
        </div>

        <div id="container">

            <?php

            //type est passer en argument GET dans URL si il est égal à "true" cela signifie que la requete de modification concerne un forum
            if ($_GET["type"] == true){
                
                try{
                    require("connexionBDD.php");// $conn

                    $req = "SELECT * FROM list_forum WHERE id_forum = ?";
                    $req = $conn->prepare($req);
                    $req->execute(array($_GET["id"]));
                    $forum = $req->fetch(PDO::FETCH_ASSOC);

                    if($_SESSION["id"] != $forum["id_auteur"] && $_SESSION["admin"]==0) header("location:list_forum.php") ; //on vérifie que la personne connecté est bien l'auteur du forum ou admin 

                    echo '<div class="info_forum">';
                    echo '<h4 id="titre"> Sujet : '. $forum["titre"]. '</h4>';
                    echo '<img id="picture" src="../img/compte/'.$_SESSION["profilePicture"].'">';
                    echo '<p id="auteur">'.$_SESSION["name"]. '</p>';
                    echo '<p id="date"> Date : '.$forum["date"]. '</p>';
                    echo '</div>';

                    $msg = str_replace(" (Message Modifié)", "", $forum["message"]) ; //on récupère le message originel du forum
                    $date = $forum["date"]; 
                    $titre = str_replace(" (Titre Modifié)", "", $forum["titre"]); //on recupere le titre en retirant un potentiel avertissement présent si le message a déjà été modifié une fois
                    $id_auteur = $forum["id_auteur"]; //id de l'auteur pour faire une vérification de sécurité 
                    $conn = NULL;  
                }

                catch(Exception $e){
	                die("Erreur : " . $e->getMessage());
                }

            }

            else {

                echo "<div class='info_forum empty'></div>";

                try{
                    require("connexionBDD.php");// $conn

                    $req = "SELECT message, date, id_auteur, id_forum FROM msg_forum WHERE position = ?";
                    $req = $conn->prepare($req);
                    $req->execute(array($_GET["id"]));
                    $res = $req->fetch(PDO::FETCH_ASSOC);

                    $msg = str_replace(" (Message Modifié)", "", $res["message"]); //si on édite un message seule, il est récupérer ici
                    $date = $res["date"];
                    $id_auteur = $res["id_auteur"];
                    $id_forum = $res["id_forum"];
                    $conn = NULL;  
                }

                catch(Exception $e){
	                die("Erreur : " . $e->getMessage());
                }

            }

            //on vérifie que la personne connecté est bien l'auteur du forum ou admin (seul personne autorisé a modifier un message)
            //vérification insuffisante (les input hidden peuvent être modifier) une autre vérification est prévu dans editerForum.php
            if($_SESSION["id"] != $id_auteur && $_SESSION["admin"]==0) header("location:page_list_forum.php") ; 

            //affichage du message
            echo '<div class="reponse">';
            echo '<img class="rep_picture" src="../img/compte/'.$_SESSION["profilePicture"].'">';
            echo '<p class="rep_auteur">'.$_SESSION["name"].' (Message initiale) </p>';
            echo '<p class="rep_date"> Date : '.$date. '</p>';
            echo '<p class="rep_msg">'.$msg. '</p>';
            echo '</div>';


            ?>
                
            <form method="post" action="editerForum.php">
                <fieldset id="form">
                    <?php

                    //si l'objet modifié est un forum, son titre peut aussi être modifier 
                    if ($_GET["type"]){
                        echo '<label for="titre">Titre : </label>';
                        echo '<input id="sujet" type="text" name="titre" maxlength="128" value="'.$titre.'" required><br><br>';
                    }
                    //nouveau message 
                    echo '<label for="message">Message modifié:</label>';
                    echo '<br>';
                    echo '<textarea id="msg" name="msg" maxlength="1250" required>'.$msg.'</textarea>';
                    //on passe à la page traitement les même argument GET
                    echo '<input type="hidden" name="id" value="'.$_GET["id"].'">';
                    echo '<input type="hidden" name="type" value="'.$_GET["type"].'">';
                    //id du forum (utile pour la redirection suite à l'édition d'un message) (Modifiable par un utilisateur : Aucune utilisation "sensible")
                    if ($_GET["type"] == 0){
                        echo '<input type="hidden" name="id_forum" value="'.$id_forum.'">';
                    }
                    //deux demande possible (delete/edit)
                    echo '<input id="send" type="submit" name="Modifier" value="Modifier">';
                    echo '<input id="send" type="submit" name="Supprimer" value="Supprimer">';

                    ?>

                </fieldset>
            </form> 
        </div>
    </main>

    <?php include('footer.php') ?>

</body>
</html>