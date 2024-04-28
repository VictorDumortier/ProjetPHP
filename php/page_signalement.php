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
            if (($_GET["type"] == true)) echo "<h1 id='Title'>Singalement d'un forum</h1>";
            else echo "<h1 id='Title'>Singalement d'un message</h1>";
            ?>
        </div>

        <div id="container">

            <?php

            //type est passer en argument GET dans URL si il est égal à "true" cela signifie que la requete de Signalement concerne un forum
            if ($_GET["type"] == true){
                
                try{
                    require("connexionBDD.php");// $conn

                    $req = "SELECT * FROM list_forum INNER JOIN compte ON compte.id=list_forum.id_auteur WHERE id_forum = ?";
                    $req = $conn->prepare($req);
                    $req->execute(array($_GET["id"]));
                    $forum = $req->fetch(PDO::FETCH_ASSOC);

                    //on récupère le message originel du forum et les information associé
                    $msg = $forum["message"]; 
                    $date = $forum["date"];
                    $titre = $forum["titre"];
                    $auteur = $forum["name"];
                    $picture = $forum["profilePicture"];
                    $id_auteur = $forum["id_auteur"];

                    echo '<div class="info_forum">';
                    echo '<h4 id="titre"> Sujet : '. $titre. '</h4>';
                    echo '<img id="picture" src="../img/compte/'.$picture.'">';
                    echo '<p id="auteur">'.$auteur. '</p>';
                    echo '<p id="date"> Date : '.$date. '</p>';
                    echo '</div>';

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

                    $req = "SELECT message, date, name, profilePicture FROM msg_forum INNER JOIN compte ON compte.id = msg_forum.id_auteur WHERE position = ?";
                    $req = $conn->prepare($req);
                    $req->execute(array($_GET["id"]));
                    $res = $req->fetch(PDO::FETCH_ASSOC);

                    $msg = $res["message"]; //si on signal un message seule, il est récupérer ici
                    $date = $res["date"];
                    $auteur = $res["name"];
                    $picture = $res["profilePicture"];

                    $conn = NULL;  
                }

                catch(Exception $e){
	                die("Erreur : " . $e->getMessage());
                }
                
            }

            //affichage du message
            echo '<div class="reponse">';
            echo '<img class="rep_picture" src="../img/compte/'.$picture.'">';
            echo '<p class="rep_auteur">'.$auteur.'</p>';
            echo '<p class="rep_date"> Date : '.$date. '</p>';
            echo '<p class="rep_msg">'.$msg. '</p>';
            echo '</div>';


            ?>
                
            <form method="post" action="signalForum.php">
                <fieldset id="form">
                    <?php

                    echo '<label for="message">Raison du signalement :</label>';
                    echo '<br>';
                    echo '<textarea id="msg" name="msg" maxlength="1300" required></textarea>';
                    echo '<input type="hidden" name="id_compte" value="'.$_SESSION["id"].'">';
                 
                    //on passe à la page traitement les même argument GET
                    echo '<input type="hidden" name="id_signal" value="'.$_GET["id"].'">';
                    echo '<input type="hidden" name="msg_signal" value="'.$msg.'">';
                    echo '<input type="hidden" name="type" value="'.$_GET["type"].'">';
                    echo '<input id="send" type="submit" name="Envoyer" value="Envoyer le signalement">';

                    ?>

                </fieldset>
            </form> 
        </div>
    </main>

    <?php include('footer.php') ?>

</body>
</html>