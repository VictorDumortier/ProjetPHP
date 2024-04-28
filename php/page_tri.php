<?php session_start();?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> Super Sith </title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/trilogie.css">
    <link rel="shortcut icon" href="../img/fonctionnel/logo_1.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
    <body>

        <?php include('header.php') ?>

        <main>
            <div id="Titre">
                <h1>Trilogie</h1>
                <p>Épisode IV, V, VI</p>
            </div>

            <div id="epI">
                <h2>Star Wars, épisode IV : Un nouvel espoir</h2>
                <div>
                    <img src="../img/films/film_4.jpg" alt="affiche film 4">
                </div>
                <div>
                    <dl>
                        <dt>Titre original:</dt>
                        <dd>Star Wars: Episode IV – A New Hope</dd>
                        <dt>Réalisation:</dt>
                        <dd>George Lucas</dd>
                        <dt>Scénario:</dt>
                        <dd>George Lucas</dd>
                        <dt>Musique:</dt>
                        <dd>John Williams</dd>
                        <dt>Sociétés de production:</dt>
                        <dd>Lucasfilm Ltd</dd>
                        <dd>Twentieth Century Fox</dd>
                        <dt>Genre:</dt>
                        <dd>Science-fiction</dd>
                        <dt>Durée:</dt>
                        <dd>121 minutes</dd>
                        <dt>Sortie:</dt>
                        <dd>1977</dd>
                    </dl>
                </div>
                <div>
                    <h3>Synopsis</h3>
                    "Star Wars, épisode IV : Un nouvel espoir" se déroule dans une galaxie lointaine où l'Empire galactique, dirigé par l'impitoyable Dark Vador et l'empereur Palpatine, règne en opprimant les systèmes planétaires.
                    La princesse Leia Organa cache les plans de l'Étoile de la Mort, une station spatiale destructrice, dans le droïde R2-D2, qui s'échappe avec son compagnon C-3PO vers la planète désertique Tatooine.
                    Là-bas, les droïdes rencontrent Luke Skywalker, un jeune fermier, et le vieux Jedi Obi-Wan Kenobi.
                    Ils se lancent dans une quête pour livrer les plans à l'Alliance rebelle, luttant contre l'Empire.
                    Luke découvre sa destinée de Jedi et rejoint Han Solo, le contrebandier, et Chewbacca, le Wookiee, pour sauver la princesse Leia.
                    Le groupe s'infiltre dans l'Étoile de la Mort pour sauver Leia et détruire la station.
                    Avec l'aide d'Obi-Wan, Luke parvient à utiliser la Force pour détruire l'Étoile de la Mort, marquant une victoire cruciale pour l'Alliance rebelle et ouvrant la voie à l'espoir dans la lutte contre l'Empire.
                </div>
            </div>

            <?php 

            if (isset($_SESSION["name"])){ //on affiche le reste de la page uniquement pour les personnes connecté
                ?>

            <div id="epII">
                <h2>Star Wars, épisode V : L'Empire contre-attaque</h2>
                <div>
                    <img src="../img/films/film_5.jpg" alt="affiche film 5">
                </div>
                <div>
                    <dl>
                        <dt>Titre original:</dt>
                        <dd>Star Wars : Episode V – The Empire Strikes Back</dd>
                        <dt>Réalisation:</dt>
                        <dd>Irvin Kershner</dd>
                        <dt>Scénario:</dt>
                        <dd>Leigh Brackett</dd>
                        <dd>Lawrence Kasdan</dd>
                        <dt>Musique:</dt>
                        <dd>John Williams</dd>
                        <dt>Sociétés de production:</dt>
                        <dd>Lucasfilm Ltd</dd>
                        <dt>Genre:</dt>
                        <dd>Science-fiction</dd>
                        <dt>Durée:</dt>
                        <dd>124 minutes</dd>
                        <dt>Sortie:</dt>
                        <dd>1980</dd>
                    </dl>
                </div>
                <div>
                    <h3>Synopsis</h3>
                    "Star Wars, épisode V : L'Empire contre-attaque" se déroule après la victoire de l'Alliance rebelle contre l'Étoile de la Mort.
                    L'Empire galactique, dirigé par Dark Vador et l'empereur Palpatine, traque les rebelles à travers la galaxie.
                    Pendant ce temps, sur la planète glaciale de Hoth, l'Alliance rebelle établit une base secrète.
                    Luke Skywalker poursuit son entraînement Jedi avec le maître Yoda sur la planète isolée de Dagobah, tandis que Han Solo, la princesse Leia, Chewbacca et C-3PO tentent d'échapper à la capture par les forces impériales.
                    Pendant une confrontation avec Dark Vador, Luke découvre une vérité choquante sur son passé.
                    L'Empire intensifie sa chasse aux rebelles, menant à la bataille de Hoth.
                    Les héros se séparent : Han et Leia cherchent refuge auprès de Lando Calrissian, un ancien ami de Han, tandis que Luke se rend sur Bespin pour sauver ses amis, tombant dans un piège tendu par Vador.
                    Sur Bespin, Luke affronte Vador dans un duel épique et découvre la véritable identité de son ennemi.
                    Malgré sa bravoure, Luke est blessé et perd une main avant de découvrir la vérité sur son lien familial avec Dark Vador.
                    L'épisode se termine sur une note sombre avec la capture de Han Solo par Vador et la compréhension que l'Empire est loin d'être vaincu.
                </div>
            </div>

            <div id="epIII">
                <h2>Star Wars, épisode VI : Le Retour du Jedi</h2>
                <div>
                    <img src="../img/films/film_6.jpg" alt="affiche film 6">
                </div>
                <div>
                    <dl>
                        <dt>Titre original:</dt>
                        <dd>Star Wars: Episode VI – Return of the Jedi</dd>
                        <dt>Réalisation:</dt>
                        <dd>Richard Marquand</dd>
                        <dt>Scénario:</dt>
                        <dd>Lawrence Kasdan</dd>
                        <dd>George Lucas</dd>
                        <dt>Musique:</dt>
                        <dd>John Williams</dd>
                        <dt>Sociétés de production:</dt>
                        <dd>Lucasfilm Ltd</dd>
                        <dt>Genre:</dt>
                        <dd>Science-fiction</dd>
                        <dt>Durée:</dt>
                        <dd>134 minutes</dd>
                        <dt>Sortie:</dt>
                        <dd>1983</dd>
                    </dl>
                </div>
                <div>
                    <h3>Synopsis</h3>
                    "Star Wars, épisode VI : Le Retour du Jedi" se déroule alors que l'Empire galactique consolide son emprise sur la galaxie. Han Solo est prisonnier de Jabba le Hutt, un puissant seigneur du crime, sur la planète Tatooine. Pendant ce temps, Luke Skywalker poursuit son entraînement Jedi et cherche à sauver Han et à vaincre l'Empire.
                    Luke, accompagné de Leia, Chewbacca, Lando Calrissian et leurs alliés, planifie un sauvetage audacieux pour libérer Han Solo des griffes de Jabba. Avec l'aide de R2-D2 et C-3PO, ils réussissent à libérer Han, mais leur lutte contre l'Empire est loin d'être terminée.
                    Pendant ce temps, l'Empereur Palpatine supervise la construction d'une nouvelle Étoile de la Mort, plus puissante que jamais. L'Alliance rebelle prépare une attaque décisive pour détruire cette arme redoutable et mettre fin au règne tyrannique de l'Empire.
                    Luke retourne sur la planète forestière d'Endor pour désactiver le bouclier protégeant l'Étoile de la Mort, tandis que la flotte rebelle engage un combat spatial contre les forces impériales. Une bataille épique s'ensuit sur terre et dans l'espace.
                    Pendant ce temps, sur l'Étoile de la Mort, Luke confronte Dark Vador et l'Empereur dans un duel intense. Grâce à la compassion de Luke et au sacrifice ultime de Dark Vador pour sauver son fils, l'Empereur est vaincu. La flotte rebelle réussit à détruire l'Étoile de la Mort, marquant la chute de l'Empire.
                    La galaxie célèbre la victoire de l'Alliance rebelle et la fin de la tyrannie impériale. Les héros se réunissent pour célébrer, tandis que les espoirs d'une ère de paix et de liberté renaissent dans la galaxie.
                </div>
            </div>

            <?php }

            else {

            ?>
                <div id="contenu">
                    <h3 id="connh3"> La suite de ce contenu est reseré aux personnes connecté, vous pouvez vous identifier ou créer un compte : </h3>
                    <a id="connlink" href="page_connexion.php">Connexion</a>
                </div>

            <?php
            }
            ?>

        </main>

        <?php include('contactbull.php') ?>
        <?php include('footer.php') ?>

    </body>
</html>