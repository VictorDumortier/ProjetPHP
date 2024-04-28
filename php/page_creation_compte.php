<?php
    session_start();
?>

<!Doctype html>
<html lang="fr">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title> Super Sith </title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/connexion.css">
    <link rel="shortcut icon" href="../img/fonctionnel/logo_1.ico" type="image/x-icon">
</head>

<body>
	
    <?php include('header.php') ?>
	
    <main>
        <video id="background-video" autoplay loop muted>
            <source src="../img/compte/star-background.mp4" type="video/mp4" />
        </video>

        <?php
        if (isset($_SESSION["authentifie"])) {
            header("location:page_profil.php");
        }
        else {
        ?>
        <form  method="post" action="creationCompte.php" enctype="multipart/form-data">
            <fieldset>
	            <legend>Créer votre compte</legend>
                <br>
                <label>Email :</label>
                <input type="email" name="email" id="email" placeholder="Email" required pattern = "^\w+([.-]?\w+)*@\w+([.-]?\w+)*(.\w{2,3})+$" <?php if (isset($_COOKIE['email'])) {echo "value=".$_COOKIE['email'];} ?>>
	            <br>
                <label>Nom d'utilisateur :</label>
                <input type="text" name="name" id="name" placeholder="Nom d'utilisateur" required pattern = "^[A-Za-z0-9-'_ ]{1,40}$" maxlength="40" <?php if (isset($_COOKIE['name'])) {echo "value=".$_COOKIE['name'];} ?>>
	            <br>
                <label>Mot de passe :</label>
                <input type="password" name="password" id="password" placeholder="Mot de passe" required pattern = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" <?php if (isset($_COOKIE['password'])) {echo "value=".$_COOKIE['password'];} ?>>
	            <ul>
		            <li>Au moins une majuscule</li>
		            <li>Au moins une miniscule</li>
		            <li>Au moins un chiffre</li>
		            <li>Au moins un caractère special</li>
		            <li>Doit avoir au moins 8 caractères</li>
	            </ul>
                <?php 
                    if (isset($_COOKIE['errorEmailExist'])) {
                        echo "<p style='color:red;'>Cette adresse email est déjà prise</p>";
                    }
                    else if (isset($_COOKIE['errorNameExist'])) {
                        echo "<p style='color:red;'>Ce nom d'utilisateur est déjà pris</p>";
                    }
                    else if (isset($_COOKIE['formatInvalide'])) {
                        echo "<p style='color:red;'>Format invalide</p>";
                    }
                ?>
                <div class="envoie"><input  class="button" type="submit" name="Envoyer" Value="Créer un compte"/></div>
                <p>Vous avez déjà un compte ? <a href="page_connexion.php">Se connecter</a></p>
            </fieldset>
        </form>
        <?php } ?>
    </main>

    <?php include('contactbull.php') ?>
    <?php include('footer.php') ?>

</body>
</html>