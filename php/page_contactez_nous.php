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
    <link rel="stylesheet" type="text/css" href="../css/mail.css">
    <link rel="shortcut icon" href="../img/fonctionnel/logo_1.ico" type="image/x-icon">
</head>

<body>
	
    <?php include('header.php') ?>
	
    <div class="container">
        <form action="mail.php" method="POST">
            <Legend>Dites nous</Legend>
            <label for="name">Nom:</label>
            <input type="text" name="name" id="name"placeholder="Nom" required <?php if (isset($_SESSION['name'])) {echo "value=".$_SESSION['name'];} ?>> <!--Si l'utilisateur à un compte sont pseudo est déjà rempli -->
            <br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Email" required <?php if (isset($_COOKIE['email'])) {echo "value=".$_COOKIE['email'];} ?>> <!--Si l'utilisateur à un compte ou as essayé d'en crée un sont email est déjà rempli grâce à un cookie-->
            <br>
            <label for="subject">Sujet:</label>
            <input type="text" name="subject" id="subject" pattern="[A-Za-z0-9-'_ ]"required>
            <br>
            <label for="message">Message</label>
            <textarea name="message" cols="30" rows="10" required></textarea>
            <br>
            <input type="submit" name="envoyer" value="Envoyer">
        </form>
    </div>
    <?php include('footer.php') ?>
</body>
</html>
