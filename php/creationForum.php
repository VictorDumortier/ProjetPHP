<?php
    session_start();
    include("functions.php");

    //gestion de la création d'un nouveau forum
    if(isset($_POST["Envoyer_forum"]) && isset($_SESSION["name"])){

        try{
            require("connexionBDD.php");

            //recupération des données néccessaire
            $id_auteur = $_SESSION["id"];
            $titre = nettoyer_donnees($_POST["sujet"]);
            $msg = nettoyer_donnees($_POST["msg"]);
            $date = date("Y-m-d H:i:s");

            //préparation et éxecution de la requete SQL
            $req = "INSERT INTO list_forum (id_auteur, message, titre, date) VALUES (:id_auteur, :message, :titre, :date)";
            $req = $conn->prepare($req);
            $req->execute(array(":id_auteur"=>$id_auteur, ":message"=>$msg, ":titre"=>$titre, ":date"=>$date));

            //récupération de l'id du forum qui vient d'être crée
            $id = $conn->lastInsertId();

            $conn = NULL; //on détruit la connexion à la DB
            header('location:page_forum.php?id='.$id.'&msg=0');
        }
   
        catch(Exception $e){
		   die("Erreur : " . $e->getMessage());
		}  
    }

    //gestion de l'envoie d'une réponse
    elseif(isset($_POST["Envoyer_msg"]) && isset($_SESSION["name"])){

        try{
            require("connexionBDD.php");

            //récupération des données
            $id_auteur = $_SESSION["id"];
            $msg = nettoyer_donnees($_POST["msg"]);
            $id_forum = $_POST["forum_id"]; //input de type hidden aucun nettoyage néccessaire
            $date = date("Y-m-d H:i:s");

            //préparation et éxecution de la requete SQL
            $req = "INSERT INTO msg_forum (id_forum, id_auteur, message, date) VALUES (:id_forum, :id_auteur, :message, :date)";
            $req = $conn->prepare($req);
            $req->execute(array(":id_forum"=> $id_forum, ":id_auteur"=>$id_auteur, ":message"=>$msg, ":date"=>$date));

            $conn = NULL; // destruction de la connexion à la DB 
            header('location:page_forum.php?id='.$id_forum.'&msg=0'); //redirection vers le forum qui 
        }
   
        catch(Exception $e){
		   die("Erreur : " . $e->getMessage());
		}
        
    }

    else{
        header("location:page_list_forum.php"); //on redirige vers la liste des forum en cas de problème
    }
?>