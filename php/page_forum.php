<?php session_start()?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> Super Sith </title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/forum.css">
    <link rel="shortcut icon" href="../img/fonctionnel/logo_1.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>      
    <?php include('header.php'); ?>

    <main>
        <div id="container">
            
            <?php 

            try{
                require("connexionBDD.php");// $conn

                $id_forum = $_GET["id"];
            
                $req = "SELECT * FROM list_forum LEFT JOIN compte ON compte.id = list_forum.id_auteur WHERE id_forum = ?";
                $req = $conn->prepare($req);
                $req->execute(array($id_forum));
                $forum = $req->fetch(PDO::FETCH_ASSOC);

                //renvoie vers une page d'erreur si le forum demandé n'existe pas
                if (empty($forum)){
                    header("location:error404.php");
                }

                //vérification si le compte de l'auteur est toujours existant
                    if(!isset($forum["name"])){
                        $isauteur_forum = false;
                        $auteur_forum = "Profil Introuvable";
                        $profilePicture_forum = "pp_default.jpg";
                    }

                    else {
                        $isauteur_forum = (isset($_SESSION["id"]) && $_SESSION["name"] == $forum["name"]); //on vérifie que la variable existe puis on vérifie sont état
                        $auteur_forum = $forum["name"];
                        $profilePicture_forum = $forum["profilePicture"];

                        //on ajoute une mention au pseudo de l'auteur si il s'agit d'un admin
                        if ($forum["admin"]) $auteur_forum .= " (Admin)";

                    }

                //Ajout d'une classe CSS si la personnes connecté est propriétaire du forum affiché
                if ($isauteur_forum) $classCss = " user_msg"; //ajout de class
                else $classCss = "";

                echo '<div class="info_forum'.$classCss.'">';
                echo '<h4 id="titre"> Sujet : '. $forum["titre"]. '</h4>';
                echo '<img id="picture" src="../img/compte/'.$profilePicture_forum.'">';
                echo '<p id="auteur">'.$auteur_forum. '</p>';
                echo '<p id="date"> Date : '.$forum["date"]. '</p>';

                if ($isauteur_forum || (isset($_SESSION["admin"]) && $_SESSION["admin"])){ //si le user est admin ou auteur on affiche le bouton de modification
                    echo '<a class="btn'.$classCss.'" href="page_editerForum.php?id='.$id_forum.'&type=1">Modifier le forum</a>'; 
                }

                elseif (isset($forum["name"])) { //si le user n'est pas admin ou auteur on affiche le bouton de signalement (uniquement si le compte de l'auteur existe encore)
                    echo '<a class="btn" href="page_signalement.php?id='.$id_forum.'&type=1">Signaler le forum</a>'; 
                }

            
                echo'</div>';
                echo'<div id="list_msg">';
            
                //AFFICHAGE DU MESSAGE INTIALE

                echo '<div class="reponse'.$classCss.'">';
                echo '<img class="rep_picture" src="../img/compte/'.$profilePicture_forum.'">';
                echo '<p class="rep_auteur">'.$auteur_forum.' (Message initiale) </p>';
                echo '<p class="rep_date"> Date : '.$forum["date"]. '</p>';
                echo '<p class="rep_msg">'.$forum["message"]. '</p>';
                echo '</div>';


                //requete SQL pour obtenir les réponses des autre utilisateurs (LEFT PERMET D'AFFICHER LE MESSAGE MEME SI L'AUTEUR A SUPPRIMER SON COMPTE')
                
                
                    $req = "SELECT * FROM msg_forum LEFT JOIN compte ON compte.id=msg_forum.id_auteur WHERE id_forum = ?";
                    $req = $conn->prepare($req);
                    $req->execute(array($id_forum));

                    $msg = $req->fetchAll(PDO::FETCH_ASSOC);

                    $conn = NULL;               
            }

            catch(Exception $e){
	            die("Erreur : " . $e->getMessage());
            }
                

                //AFFICHAGE DES AUTRES REPONSE
                foreach($msg as $msg){

                    //vérification si le compte de l'auteur est toujours existant
                    if(!isset($msg["name"])){
                        $isauteur = false;
                        $auteur = "Profil Introuvable";
                        $profilePicture = "pp_default.jpg";
                    }

                    else {
                        $isauteur = (isset($_SESSION["id"]) && $_SESSION["name"] == $msg["name"]); //on vérifie que la variable existe puis on vérifie sont état
                        $auteur = $msg["name"];
                        $profilePicture = $msg["profilePicture"];
                    }
                    
                    //on ajoute une mention au pseudo de l'auteur si il s'agit d'un admin
                    if ($msg["admin"]) $auteur .= " (Admin)";

                    //si l'utilisateur connecté est l'auteur ou un admin on affiche le bouton de modification
                    if ($isauteur || (isset($_SESSION["admin"]) && $_SESSION["admin"])){

                        if (($_GET["msg"] == $msg["position"]) && $_SESSION["admin"]) $cssClass = " signal"; //permet aux admins de plus facilement visualiser les messages signalé (s'active que si l'admin accede au forum depuis le dashboard)
                        elseif($isauteur) $cssClass = " user_msg"; //permet aux utilisateur de plus facilement visualiser leurs messages 
                        else $cssClass = "";
                        
                        echo '<div class="reponse'.$cssClass.'">';
                        if (isset($msg["name"])){
                            echo '<a class="btn'.$cssClass.'" href="page_editerForum.php?id='.$msg["position"].'&type=0">Modifier</a>'; //si le user est admin ou auteur on affiche le bouton de modification (si le compte de l'auteur existe encore)
                        } 

                        //on ajoute une mention au pseudo de l'auteur si il s'agit de l'utilisateur connecté'
                        if ($isauteur) $auteur .= " (Vous)";
                    }

                    else{
                        echo '<div class="reponse">';
                        if (isset($msg["name"])){
                            echo '<a class="btn" href="page_signalement.php?id='.$msg["position"].'&type=0">Signaler</a>'; //si le user n'est pas admin ou auteur on affiche le bouton de signalement (si le compte de l'auteur existe encore)
                        } 
                    }

                    echo '<img class="rep_picture" src="../img/compte/'.$profilePicture.'">';

                    //affichage du mention suplémentaire si la réponse provient de l'auteur originel di forum (sauf pour l'auteur lui même)
                    if ($msg["id_auteur"] == $forum["id_auteur"] && !$isauteur){
                        $auteur .= "  (Créateur du forum)";
                    }
                    
                    echo '<p class="rep_auteur">'. $auteur . '</p>';
                    echo '<p class="rep_date"> Date : '.$msg["date"]. '</p>';
                    echo '<p id="'.$msg["position"].'" class="rep_msg">'. $msg["message"]. '</p>';
                    echo '</div>';
                }
            ?>

            </div>
            <form method="post" action="creationForum.php">
                <fieldset id="respond">
                    <!-- affichage du form / bouton de connexion -->
                    <?php if(isset($_SESSION["id"])) {?>
                    
	    		    <legend>répondre</legend>
                    <label for="message">Message :</label>
                    <br>
                    <textarea id="msg" name="msg" maxlength="1250" required></textarea>
                    <input type="hidden" name="forum_id" value="<?php echo $id_forum; ?>">
                    <input id="send" type="submit" name="Envoyer_msg" value="Envoyer la réponse">
                    
                    <?php }
                    else {?>

                    <h2> Vous devez être connecté pour répondre : <a id="connexion" href="page_connexion.php">Se Connecter</a></h2>
                    <?php }?>
                </fieldset>
            </form> 
        </div>
    </main>

    <?php include('footer.php') ?>

</body>
</html>