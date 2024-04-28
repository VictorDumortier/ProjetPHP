<?php
    session_start();
    include("functions.php");

    if(isset($_POST["Envoyer"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
        $email=nettoyer_donnees($_POST["email"]);
		$mdp=nettoyer_donnees($_POST["password"]);

        setcookie("ErrorEmailOrMdp", "", time());
        setcookie("ErrorEmailExist", "", time());
        setcookie("ErrorNameExist", "", time());
        setcookie("ErrorEmailformatInvalide", "", time());
        setcookie("ErrorNameformatInvalide", "", time());
        setcookie("ErrorMdpformatInvalide", "", time());
        setcookie("ErrorPPformatInvalide", "", time());

        $error = false; //variable utile pour gérer la redirection

        try{
			//Ouvrir la connexion à la bd
			require("connexionBDD.php");

			$reqSQL = "SELECT * FROM Compte WHERE email=:email";
			//préparer, exécuter la requête et récuperer le résultat
			$req = $conn->prepare($reqSQL);
			$req->execute(array(':email'=>$email));
			$resultat = $req->fetchAll(PDO::FETCH_ASSOC);

            if(!empty($resultat) && password_verify($mdp, $resultat[0]['mdp'])){
                $newemail=nettoyer_donnees($_POST["newemail"]);
                $newname=nettoyer_donnees($_POST["newname"]);
                $newmdp=nettoyer_donnees($_POST["newpassword"]);
                $newpp = $_FILES['newpp'];


                //Modification email
                if (!empty($newemail)) {
                    if (valider_email($newemail)){    
                        $reqSQL = "SELECT * FROM Compte WHERE email=:newemail";
                        //préparer, exécuter la requête et récuperer le résultat
                        $req = $conn->prepare($reqSQL);
                        $req->execute(array(':newemail'=>$newemail));
                        $newresultat = $req->fetchAll(PDO::FETCH_ASSOC);

                        if (empty($newresultat)){
                            $reqSQL = "UPDATE Compte SET email=:newemail WHERE email=:email";
                            //préparer, exécuter la requête
                            $req = $conn->prepare($reqSQL);
                            $req->execute(array(':newemail'=>$newemail,
                                                ':email'=>$email));
    
                            //modification variable de session
                            $_SESSION["email"]=$newemail;

                            $email = $newemail;
                            //modification cookie
                            if (isset($_COOKIE['remember'])) {
                                setcookie("email", $email, time()+365*24*3600);
                            }
                        }
                        else {
                            setcookie("ErrorEmailExist", true, time()+20);
                            $error = true;
                        }
                    }
                    else {
                        setcookie("ErrorEmailformatInvalide", true, time()+20);
                        $error = true;
                    }
                }


                //Modification name
                if (!empty($newname)) {
                    if (valider_nom($newname)){
                        $reqSQL = "SELECT * FROM Compte WHERE name=:newname";
                        //préparer, exécuter la requête et récuperer le résultat
                        $req = $conn->prepare($reqSQL);
                        $req->execute(array(':newname'=>$newname));
                        $newresultat = $req->fetchAll(PDO::FETCH_ASSOC);

                        if (empty($newresultat)){
                            $reqSQL = "UPDATE Compte SET name=:name WHERE email=:email";
                            //préparer, exécuter la requête
                            $req = $conn->prepare($reqSQL);
                            $req->execute(array(':name'=>$newname,
                                                ':email'=>$email));
    
                            //modification variable de session
                            $_SESSION["name"]=$newname;
                        }
                        else {
                            setcookie("ErrorNameExist", true, time()+20);
                            $error = true;
                        }
                    }
                    else {
                        setcookie("ErrorNameformatInvalide", true, time()+20);
                        $error = true;
                    }
                }


                //Modification mdp
                if (!empty($newmdp)){
                    if (valider_mdp($newmdp)){
                        $newmdp_hash=password_hash($newmdp, PASSWORD_DEFAULT);
    
                        $reqSQL = "UPDATE Compte SET mdp=:mdp WHERE email=:email";
                        //préparer, exécuter la requête
                        $req = $conn->prepare($reqSQL);
                        $req->execute(array(':mdp'=>$newmdp_hash,
                                            ':email'=>$email));
                        
                        //modification cookie
                        if (isset($_COOKIE['remember'])) {
                            setcookie("password", $newmdp, time()+365*24*3600);
                        }
                    }
                    else {
                        setcookie("ErrorMdpformatInvalide", true, time()+20);
                        $error = true;
                    }
                }
                

                //modification pp
                if (!empty($newpp['name'])) {
                    if (valider_Photo($newpp)){
                        if ($_SESSION['profilePicture'] != "pp_default.jpg") {
                            unlink("../img/compte/".$_SESSION['profilePicture']);
                        }
                        $extension = strtolower(pathinfo($newpp['name'], PATHINFO_EXTENSION));
                        $newppnew = str_replace('.', '_', "pp_$email").".".$extension;//Nouveau nom de l'image
                        $upload = move_uploaded_file($newpp['tmp_name'], "../img/compte/$newppnew");//Enregister l'image

                        switch ($extension) {
                            case 'jpg':
                                $im = imagecreatefromjpeg("../img/compte/".$newppnew); // Créer une image à partir d'un fichier JPG
                                break;
                            case 'jpeg':
                                $im = imagecreatefromjpeg("../img/compte/".$newppnew); // Créer une image à partir d'un fichier JPEG
                                break;
                            case 'png':
                                $im = imagecreatefrompng("../img/compte/".$newppnew); // Créer une image à partir d'un fichier PNG
                                break;
                        }
                    
                        $width = imagesx($im);
                        $height = imagesy($im);
                        $size = min($width, $height);
                        $x = ($width - $size) / 2;
                        $y = ($height - $size) / 2;
                        $newpp = imagecrop($im, ['x' => $x, 'y' => $y, 'width' => $size, 'height' => $size]);
                        if ($newpp !== FALSE) {
                            switch ($extension) {
                                case 'jpg':
                                    imagejpeg($newpp, "../img/compte/".$newppnew); // Sauvegarder l'image recadrée
                                    break;
                                case 'jpeg':
                                    imagejpeg($newpp, "../img/compte/".$newppnew); // Sauvegarder l'image recadrée
                                    break;
                                case 'png':
                                    imagepng($newpp, "../img/compte/".$newppnew); // Sauvegarder l'image recadrée
                                    break;
                            }
                            imagedestroy($newpp);
                        }
                        imagedestroy($im);

                        $reqSQL = "UPDATE Compte SET profilePicture=:pp WHERE email=:email";
                        //préparer, exécuter la requête
                        $req = $conn->prepare($reqSQL);
                        $req->execute(array(':pp'=>$newppnew,
                                            ':email'=>$email));
    
                        //modification variable de session
                        $_SESSION["profilePicture"]=$newppnew;
                    }
                    else {
                        setcookie("ErrorPPformatInvalide", true, time()+20);
                        $error = true;
                    }
                }

            }
            else {
                setcookie("ErrorEmailOrMdp", true, time()+20);
                $error = true;
            }
			//Fermer la connexion
			$conn = NULL;
		}
		catch(Exception $e){
			die("Erreur : " . $e->getMessage());
		}
    }

    if ($error){
        header("location: page_editerProfil.php");
    }
    else {
        header("location: page_profil.php");
    }

?>