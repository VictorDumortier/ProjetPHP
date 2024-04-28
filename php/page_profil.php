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
        <fieldset>
            <legend>Information du compte: </legend>
            <?php
                echo "
                <img src='../img/compte/".$_SESSION['profilePicture']."' heigh=300 width=300>

                <div id='info'>
                    <br>
                    <p>Nom d'utilisateur: </p>
                    <p>".$_SESSION["name"]."</p>
                    <br>
                    <p>Email: </p>
                    <p>".$_SESSION["email"]."</p>
                    <br>
                </div>";
            ?>
            <br>
            <div id="bouton">
                <a href="page_editerProfil.php">Éditer le profil</a>
                <a href="logout.php">Déconnexion</a>
            </div>
            <br><br><br>
            <p style="color:red;">Attention cette action est irreversible:</p>
            <a href="delete.php" id="del">Suprimer le compte</a>
        </fieldset>
        <?php } ?>
    </main>

    <?php include('footer.php') ?>

</body>
</html>