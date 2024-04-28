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
    <link rel="stylesheet" type="text/css" href="../css/profil.css">
    <link rel="shortcut icon" href="../img/fonctionnel/logo_1.ico" type="image/x-icon">
</head>

<body>
	
    <?php include('header.php') ?>
	
    <main>
        <video id="background-video" autoplay loop muted>
            <source src="../img/compte/star-background.mp4" type="video/mp4" />
        </video>

        <?php
        if (!isset($_SESSION["authentifie"])) {
            header("location:page_connexion.php");
        }
        else {
        ?>
        <form  method="post" action="editerProfil.php" enctype="multipart/form-data">
            <fieldset>
	            <legend>Modifier votre compte</legend>
                
                <br>
                <label>Email :</label><br>
                <input type="email" name="email" id="email" placeholder="Email" required pattern = "^\w+([.-]?\w+)*@\w+([.-]?\w+)*(.\w{2,3})+$" <?php if (isset($_SESSION['email'])) {echo "value=".$_SESSION['email'];} ?>>
	            <br>
                <label>Mot de passe :</label><br>
                <input type="password" name="password" id="password" placeholder="Mot de passe" required pattern = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$">
	            <br><br><hr><br>

                <label>Nouvelle email :</label><br>
                <input type="email" name="newemail" id="newemail" placeholder="Nouvelle email" pattern = "^\w+([.-]?\w+)*@\w+([.-]?\w+)*(.\w{2,3})+$">
	            <br>
                <label>Nouveau nom d'utilisateur :</label><br>
                <input type="text" name="newname" id="newname" placeholder="Nouveau nom d'utilisateur" pattern = "^[A-Za-z0-9-'_ ]{1,40}$" maxlength="40">
	            <br>
                <label>Nouveau mot de passe :</label><br>
                <input type="password" name="newpassword" id="newpassword" placeholder="Nouveau mot de passe" pattern = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$">
                <ul>
		            <li>Au moins une majuscule</li>
		            <li>Au moins une miniscule</li>
		            <li>Au moins un chiffre</li>
		            <li>Au moins un caractère special</li>
		            <li>Doit avoir au moins 8 caractères</li>
	            </ul>
                <label>Nouvelle photo de profil :</label><br>
				<input type="file" name="newpp" accept = "image/*">

                <?php
                    if (isset($_COOKIE['ErrorEmailOrMdp'])) {
                        echo "<p style='color:red;'>Email ou mot de passe invalide</p>";
                    }
                    if (isset($_COOKIE['ErrorEmailExist'])) {
                        echo "<p style='color:red;'>Cette nouvelle adresse email est déjà prise</p>";
                    }
                    if (isset($_COOKIE['ErrorNameExist'])) {
                        echo "<p style='color:red;'>Ce nouveau nom d'utilisateur est déjà pris</p>";
                    }
                    if (isset($_COOKIE['ErrorEmailformatInvalide'])) {
                        echo "<p style='color:red;'>Format d'adresse email invalide</p>";
                    }
                    if (isset($_COOKIE['ErrorNameformatInvalide'])) {
                        echo "<p style='color:red;'>Format de nom invalide</p>";
                    }
                    if (isset($_COOKIE['ErrorMdpformatInvalide'])) {
                        echo "<p style='color:red;'>Format de mot de passe invalide</p>";
                    }
                    if (isset($_COOKIE['ErrorPPformatInvalide'])) {
                        echo "<p style='color:red;'>Format de photo de profil invalide</p>";
                    }
                ?>

                <p>(Laissez vide ce que vous ne souhaitez pas modifier)</p>
                <div id="bouton">
                    <a href="page_connexion.php">Annuler</a>
                    <input class="button" type="submit" name="Envoyer" Value="Modifier"/>
                </div>
            </fieldset>
        </form>
        <?php } ?>
    </main>

    <?php include('footer.php') ?>

</body>
</html>