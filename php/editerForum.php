<?php
    session_start();
    require("connexionBDD.php");
    require("functions.php");
 
    //extraction des données du form
    $id = nettoyer_donnees($_POST["id"]);
    $new_msg = nettoyer_donnees($_POST["msg"]);

    if ($_POST["type"]){
         $new_titre = nettoyer_donnees($_POST["titre"]); //variable existante uniquement pour la modification d'un forum
         $req = "SELECT id_auteur FROM list_forum WHERE id_forum = ?"; //requete SQL utile a une vérification de sécurité
    }

    else{
        $id_forum = nettoyer_donnees($_POST["id_forum"]);
        $req = "SELECT id_auteur FROM msg_forum WHERE position = ?";//requete différente pour un message
    }
    
    //on recupere l'id de l'auteur original dans la base de donnée, passer cette information par une input hidden dans le form n'est sur car cela peut etre modifier par un utilisateur 
    $req = $conn->prepare($req);
    $req->execute(array($_POST["id"]));

    $id_auteur = $req->fetch(PDO::FETCH_ASSOC);
    $id_auteur = $id_auteur["id_auteur"];

    //vérification de l'autorisation
    if($_SESSION["id"] != $id_auteur && $_SESSION["admin"] == 0){
        header("location:../index.php");
        $conn = NULL;
        die(); //tentative de modifification non autorisé 
    }


    //modification/suppresion d'un forum
    if($_POST["type"]){
        
        //demande de suppresion
        if(isset($_POST["Supprimer"]) && isset($_SESSION["id"])){
            $req = "DELETE FROM msg_forum WHERE id_forum=?";
            $req = $conn->prepare($req);
            $req->execute(array($id));
            
            $req2 = "DELETE FROM list_forum WHERE id_forum=?";
            $req2 = $conn->prepare($req2);
            $req2->execute(array($id));

            $conn=NULL;
            header("location:page_list_forum.php");
        }

        //demande de modification
        else{

            $new_msg .= " (Message Modifié)";

            $req = "UPDATE list_forum SET message = :message, titre = :titre WHERE id_forum = :id_forum";
            $req = $conn->prepare($req);
            $req->execute(array(":message"=>$new_msg, ":titre"=>$new_titre, ":id_forum"=> $id));
            
           $conn = NULL;
           header("location:page_forum.php?id=$id&msg=0");
        }

    }


    //modification/suppresion d'un message seule
    elseif (!$_POST["type"]){

        //demande de suppresion (on ne supprime pas le message de la DB, on le modifie en précisant que le message n'existe plus pour garder une cohérence dans la conversation)
        if(isset($_POST["Supprimer"]) && isset($_SESSION["id"])){
            $new_msg = "Ce message a été supprimé";
            if($_SESSION["admin"] == 1 && $_SESSION["id"] != $id_auteur) $new_msg .= " par un administrateur";

            $req = "UPDATE msg_forum SET message = ?, id_auteur=-1 WHERE position=" .$id;
        }

        else{
            $req = "UPDATE msg_forum SET message = ? WHERE position=" .$id;
            $new_msg .= " (Message Modifié)";
        }

        //execution de la requete 
        $req = $conn->prepare($req);
        $req->execute(array($new_msg));
        $conn=NULL;

        header("location:page_forum.php?id=$id_forum&msg=0");

    }

    else{
        header("location:page_list_forum.php");
    }
    
