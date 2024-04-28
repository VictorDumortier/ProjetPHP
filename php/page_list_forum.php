<?php session_start() ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title> Super Sith </title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/list_forum.css">
    <link rel="shortcut icon" href="../img/fonctionnel/logo_1.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<?php include('header.php'); ?>
<main>
    <div id="Titre">
        <h1>Forum et discussions</h1>
        <h2>Liste des forums : </h2>
        </div>
    </div>
    
    <div id="container">

        <div id="list_forum">

        <?php

            try{
                require("connexionBDD.php"); //$conn
    
                //preparation de la requete SQL pour obtenir les infos des forums et de leur auteurs
                $req = "SELECT * FROM list_forum LEFT JOIN compte ON compte.id=list_forum.id_auteur ORDER BY id_forum DESC";
                $req = $conn->prepare($req);
                $req->execute();

                $resultat_list_forum = $req->fetchAll(PDO::FETCH_ASSOC); 
                $conn = NULL; //destruction de la connection à la BD
            }

            catch(Exception $e){
	                die("Erreur : " . $e->getMessage());
            }

            //affichage de la liste des forums
            foreach ($resultat_list_forum as $value){

                 //vérification si le compte de l'auteur est toujours existant
                    if(!isset($value["name"])){
                        $isauteur = false;
                        $name = "Profil Introuvable";
                        $profilePicture = "pp_default.jpg";
                    }

                    else {
                        $isauteur = (isset($_SESSION["id"]) && $_SESSION["name"] == $value["name"]); //on vérifie que la variable existe puis on vérifie sont état
                        $name = $value["name"];
                        $profilePicture = $value["profilePicture"];
                    }

                //on ajoute une mention au pseudo de l'auteur si il s'agit d'un admin
                if ($value["admin"]) $name .= " (Admin)";

                //ajout d'une classe CSS si la personnes connecté est propriétaire du forum affiché
                if ($isauteur) $classCss = " user_msg"; //ajout de class
                else $classCss = "";

                //affichage des info du forum dans un div lui meme dans un lien hypertexe qui permet de ce rendre sur le forum en question
                echo '<a class="forum_link'.$classCss.'" href="page_forum.php?id='.$value["id_forum"].'&msg=0"><div class="forum'.$classCss.'">';
                echo '<h4 class="titre"> Sujet : '. $value["titre"]. '</h4>';
                echo '<img class="picture" src="../img/compte/'.$profilePicture.'">';
                echo '<p class="auteur">'. $name. '</p>';
                echo '<p class="msg">'. $value["message"]. '</p>';
                echo '<p class="date"> Date : '. $value["date"]. '</p>';
                echo '</div></a>';
            }

        ?>
        </div>

        <form method="post" action="creationForum.php">
                <fieldset id="create">
	    		    <legend>Crée un forum</legend>

                    <!-- On affiche le formulaire de réponse uniquement pour les membre connecté -->
                    <?php if(isset($_SESSION["id"])){?>

                    <label for="sujet"> Titre :</label>
                    <input id="sujet" type="text" name="sujet" maxlength="128" required>
                    <input id="send" type="submit" name="Envoyer_forum" value="Crée le forum">
                    <br><br>
                    <label for="message">Message :</label>
                    <br>
                    <textarea id="msg" name="msg" maxlength="1250" required></textarea>

                    <?php }
                    else {?>

                    <!-- lien vers la page de connexion -->
                    <h2> Vous devez être connecté pour crée un nouveau forum : <a id="connexion" href="page_connexion.php">Se Connecter</a></h2>
                    <?php }?>
                 </fieldset>
        </form>           
    </div>
</main>

    <?php include('footer.php') ?>


</body>
</html>