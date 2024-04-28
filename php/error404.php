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
    <link rel="stylesheet" type="text/css" href="../css/error404.css">
    <link rel="shortcut icon" href="../img/fonctionnel/logo_1.ico" type="image/x-icon">
</head>

<body>
	
    <?php include('header.php') ?>
	
    <main>
        <video id="background-video" autoplay loop muted>
            <source src="../img/compte/star-background.mp4" type="video/mp4" />
        </video>
        <div>
            <h1>ERROR 404</h1>
            <p>Oups ! Il semblerai que cette page à été reduite en cendre par l'étoile de la mort.</p>
        </div>

    </main>

    <?php include('footer.php') ?>

</body>
</html>