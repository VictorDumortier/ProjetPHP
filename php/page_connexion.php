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
        if (isset($_SESSION["authentifie"]) && isset($_SESSION["name"])) {
            header("location:page_profil.php");
        }
        else {
        ?>
        <form  method="post" action="login.php" enctype="multipart/form-data">
            <fieldset>
	    		<legend>Connexion</legend>
		    	<br>
                <label>Email :</label>
			    <input type="email" name="email" id="email" placeholder="Email" required <?php if (isset($_COOKIE['email'])) {echo "value=".$_COOKIE['email'];} ?>>
                <br>
                <label>Mot de passe :</label>
                <input type="password" name="password" id="password" placeholder="Mot de passe" required <?php if (isset($_COOKIE['password'])) {echo "value=".$_COOKIE['password'];} ?>>
                <br>
                <label for="remember">Se souvenir de moi </label>
                <input type="checkbox" id="remember" name="remember" <?php if (isset($_COOKIE['remember'])) {echo "checked";} ?>>
                <br>
                <?php
                    if(isset($_COOKIE['errorConnexion'])){
				        echo "<p style='color:red;'>Email ou mot de passe invalide</p>";
		            }
                ?>
		    	<br>
                <div class="envoie"><input  class="button" type="submit" name="Envoyer" Value="Se connecter"/></div>
                <p>Vous n'avez pas de compte ? <a href="page_creation_compte.php">Créer un compte</a></p>
            </fieldset>
		</form>
        <?php } ?>
    </main>

    <?php include('contactbull.php') ?>
    <?php include('footer.php') ?>

</body>
</html>