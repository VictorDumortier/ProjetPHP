<?php
    session_start();
    include("functions.php");
    //redirection des personnes non admin
    if(!isset($_SESSION["authentifie"]) || $_SESSION["admin"] == 0) {
        header("location:../index.php");
    }

    if (isset($_POST['supprimersignal'])){
        try {
            //Ouvrir la connexion à la bd
            require("connexionBDD.php");

            $reqSQL = "DELETE FROM signalement WHERE id_signalement=:id";
            //préparer, exécuter la requête
            $req = $conn->prepare($reqSQL);
            $req->execute(array(':id'=>$_POST['id']));

            //Fermer la connexion
            $conn = NULL;
        }
        catch(Exception $e){
            die("Erreur : " . $e->getMessage());
        }
    }

    if (isset($_POST['supprimer']) && isset($_POST['name'])){
        $name = nettoyer_donnees($_POST['name']);
        if (valider_nom($name) && $_SESSION["name"] != $name) {
            try {
                //Ouvrir la connexion à la bd
                require("connexionBDD.php");
                
                $reqSQL = "SELECT profilePicture FROM Compte WHERE name=:name";
                //préparer, exécuter la requête
                $req = $conn->prepare($reqSQL);
                $req->execute(array(':name'=>$name));
                $pp = $req->fetchAll(PDO::FETCH_ASSOC);
                $pp = $pp[0]['profilePicture'];

                $reqSQL = "DELETE FROM Compte WHERE name=:name";
                //préparer, exécuter la requête
                $req = $conn->prepare($reqSQL);
                $req->execute(array(':name'=>$name));

                if ($pp != "pp_default.jpg") {
                    unlink("../img/compte/".$pp);
                }

                //Fermer la connexion
                $conn = NULL;
            }
            catch(Exception $e){
                die("Erreur : " . $e->getMessage());
            }
        }
    }

    if (isset($_POST['promouvoir']) && isset($_POST['name'])){
        $name = nettoyer_donnees($_POST['name']);
        if (valider_nom($name)) {
            try {
                //Ouvrir la connexion à la bd
                require("connexionBDD.php");

                $reqSQL = "UPDATE Compte SET admin=1 WHERE name=:name";
                //préparer, exécuter la requête
                $req = $conn->prepare($reqSQL);
                $req->execute(array(':name'=>$name));

                //Fermer la connexion
                $conn = NULL;
            }
            catch(Exception $e){
                die("Erreur : " . $e->getMessage());
            }
        }
    }


    try{
        //Ouvrir la connexion à la bd
        require("connexionBDD.php");

        $reqSQL = "SELECT id_signalement,
                          motif,
                          id_signal,
                          msg_signal,
                          type_forum,
                          id_forum,
                          message,
                          compte1.name as name1,
                          compte2.name as name2
                    FROM signalement 
                    INNER JOIN msg_forum ON position = id_signal
                    INNER JOIN compte AS compte1 ON id_compte = compte1.id
                    INNER JOIN compte AS compte2 ON id_auteur = compte2.id";
        //préparer, exécuter la requête et récuperer le résultat
        $req = $conn->prepare($reqSQL);
        $req->execute();
        $resultat1 = $req->fetchAll(PDO::FETCH_ASSOC);

        $reqSQL = "SELECT id_signalement,
                          motif,
                          id_signal,
                          msg_signal,
                          id_forum,
                          message,
                          compte1.name as name1,
                          compte2.name as name2
                    FROM signalement 
                    INNER JOIN list_forum ON id_forum = id_signal
                    INNER JOIN compte AS compte1 ON id_compte = compte1.id
                    INNER JOIN compte AS compte2 ON id_auteur = compte2.id
                    WHERE type_forum = 1";
        //préparer, exécuter la requête et récuperer le résultat
        $req = $conn->prepare($reqSQL);
        $req->execute();
        $resultat2 = $req->fetchAll(PDO::FETCH_ASSOC);

        $resultat = array_merge($resultat1,$resultat2);
        //Fermer la connexion
        $conn = NULL;
    }
    catch(Exception $e){
        die("Erreur : " . $e->getMessage());
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> Super Sith </title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="shortcut icon" href="../img/fonctionnel/logo_1.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>      
    
    
    <?php include('header.php') ?>

    <main>
        <?php
            echo"<fieldset>
                <legend>Message signaler</legend>";
            if (empty($resultat)) {
                echo"Aucun message signaler";
            }
            foreach($resultat as $ligne) {
                $auteur_signalement = $ligne['name1'];
                $auteur_signaler = $ligne['name2'];
                $idforum = $ligne['id_forum'];
                $idmsg = $ligne['id_signal'];
                $msgsignal = $ligne["msg_signal"];
                $msgmodif = $ligne["message"];
                $motif = $ligne["motif"];

                if(!isset($ligne["type_forum"])){
                    $type = "la discussion crée par ";
                }
                else{
                    $type = "le message de ";
                }

                echo "
                <a href='page_forum.php?id=".$idforum."&msg=".$idmsg."#".$idmsg."'>
                    <div id='signal'>
                        <p>$auteur_signalement a signalé $type $auteur_signaler: </p>
                        <p>$msgsignal</p>";
                        if ($msgsignal != $msgmodif) {
                            echo "<p>Depuis le message a était modifier en : </p>
                            <p>$msgmodif</p>";
                        }
                        echo "<p> Pour le motif suivant : </p>
                        <p>". $motif."</p>
                        <form method='post' action=''>
                            <input name='id' value=".$ligne['id_signalement']." type='hidden'>
                            <input class='button' type='submit' name='supprimersignal' Value='Supprimer le signalement'>
                        </form>
                    </div>
                </a>";
            }
            echo"</fieldset>";
        ?>
        
        <div>

        <fieldset>
            <legend>Consulter les messages</legend>
            <a id="message" href="./page_liste_messages_recue.php">Liste des messages</a>      
        </fieldset>

        <form action="" method="post"> 
            <fieldset>
                <legend>Supprimer un compte</legend>

                <label>Nom d'utilisateur :</label><br>
                <input type="text" name="name" id="name" placeholder="Nom d'utilisateur" required pattern = "^[A-Za-z0-9-'_ ]{1,40}$" maxlength="40">
	            
                <input class="button" type="submit" name="supprimer" Value="Supprimer"/>
            </fieldset>
        </form>

        <form action="" method="post">
            <fieldset>
                <legend>Promouvoir un utilisateur en admin</legend>

                <label>Nom d'utilisateur :</label><br>
                <input type="text" name="name" id="name" placeholder="Nom d'utilisateur" required pattern = "^[A-Za-z0-9-'_ ]{1,40}$" maxlength="40">
	            
                <input class="button" type="submit" name="promouvoir" Value="Promouvoir"/>
            </fieldset>
        </form>
        </div>
    </main>

    <?php include('footer.php') ?>

</body>
</html>