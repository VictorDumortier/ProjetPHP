<?php session_start() ;?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
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
            <h1>Postlogie</h1>
            <p>Épisode VII, VIII, IX</p>
        </div>

        <div id="epI">
            <h2>Star Wars, épisode VII : Le Réveil de la Force</h2>
            <div>
                <img src="../img/films/film_7.jpg" alt="affiche film 7">
            </div>
            <div>
                <dl>
                    <dt>Titre original:</dt>
                    <dd>Star Wars: Episode VII – The Force Awakens</dd>
                    <dt>Réalisation:</dt>
                    <dd>J. J. Abrams</dd>
                    <dt>Scénario:</dt>
                    <dd>J. J. Abrams</dd>
                    <dd>Lawrence Kasdan</dd>
                    <dd>Michael Arndt</dd>
                    <dt>Musique:</dt>
                    <dd>John Williams</dd>
                    <dt>Sociétés de production:</dt>
                    <dd>Lucasfilm Ltd</dd>
                    <dd>Bad Robot Productions</dd>
                    <dt>Genre:</dt>
                    <dd>Science-fiction</dd>
                    <dt>Durée:</dt>
                    <dd>138 minutes</dd>
                    <dt>Sortie:</dt>
                    <dd>2015</dd>
                </dl>
            </div>
            <div>
                <h3>Synopsis</h3>
                "Star Wars, épisode VII : Le Réveil de la Force" se déroule environ 30 ans après les événements de "Le Retour du Jedi". La galaxie est confrontée à une nouvelle menace : le Premier Ordre, héritier de l'Empire, cherche à établir son contrôle sur la galaxie, tandis que la Résistance, dirigée par la Générale Leia Organa, s'oppose à ses plans.
                Une carte menant à la localisation du légendaire Jedi Luke Skywalker est convoitée par le Premier Ordre et la Résistance. Rey, une jeune ferrailleuse sur la planète désertique Jakku, découvre un droïde nommé BB-8, porteur d'une partie de cette carte. Finn, un stormtrooper en fuite du Premier Ordre, rencontre Rey et BB-8, et ils s'associent pour échapper aux forces ennemies.
                Ils rencontrent Han Solo et Chewbacca, qui les aident dans leur quête pour trouver Luke Skywalker. Kylo Ren, un chevalier Sith du Premier Ordre, cherche également à localiser Luke pour éliminer toute menace potentielle pour l'ordre établi par le Premier Ordre.
                La quête pour retrouver Luke Skywalker mène à des confrontations intenses entre la Résistance et le Premier Ordre. Rey découvre ses propres capacités à manier la Force, tandis que Kylo Ren montre des signes de conflit intérieur entre le côté lumineux et le côté obscur.
                L'épisode se termine sur une note poignante lorsque Rey trouve enfin Luke Skywalker sur une île isolée, marquant le début d'une nouvelle ère pour les Jedi et la continuation de la lutte entre le bien et le mal dans la galaxie.
            </div>
        </div>

        <?php
        if (isset($_SESSION["name"])){//on affiche le reste de la page uniquement pour les personnes connecté
            ?>

        <div id="epII">
            <h2>Star Wars, épisode VIII : Les Derniers Jedi</h2>
            <div>
                <img src="../img/films/film_8.jpg" alt="affiche film 8">
            </div>
            <div>
                <dl>
                    <dt>Titre original:</dt>
                    <dd>Star Wars: Episode VIII – The Last Jedi</dd>
                    <dt>Réalisation:</dt>
                    <dd>Rian Johnson</dd>
                    <dt>Scénario:</dt>
                    <dd>Rian Johnson</dd>
                    <dt>Musique:</dt>
                    <dd>John Williams</dd>
                    <dt>Sociétés de production:</dt>
                    <dd>Lucasfilm Ltd</dd>
                    <dd>Walt Disney Pictures</dd>
                    <dd>Ram Bergman Productions</dd>
                    <dt>Genre:</dt>
                    <dd>Science-fiction</dd>
                    <dt>Durée:</dt>
                    <dd>152 minutes</dd>
                    <dt>Sortie:</dt>
                    <dd>2017</dd>
                </dl>
            </div>
            <div>
                <h3>Synopsis</h3>
                "Star Wars, épisode VIII : Les Derniers Jedi" se déroule après les événements de "Le Réveil de la Force". La Résistance, dirigée par Leia Organa, est traquée par le Premier Ordre. Rey, ayant retrouvé Luke Skywalker, cherche à le convaincre de rejoindre la lutte contre le Premier Ordre et à comprendre la Force.
                Pendant ce temps, Kylo Ren, influencé par le Suprême Leader Snoke, est aux prises avec des conflits intérieurs. L'épisode explore les nuances du côté lumineux et du côté obscur de la Force, mettant en lumière les liens entre Rey et Kylo Ren, ainsi que leurs destins entremêlés.
                Des batailles épiques ont lieu, notamment une confrontation majeure entre la Résistance et le Premier Ordre. L'épisode se concentre sur le dilemme moral des personnages principaux, leurs choix et leurs défis personnels. Il approfondit également la philosophie de la Force, remettant en question les traditions Jedi et Sith.
                L'épisode se termine sur des notes de sacrifice, de rédemption et de renouveau, ouvrant de nouvelles perspectives pour l'avenir de la saga tout en laissant les fans avec des questions sur le destin de certains personnages.
            </div>
        </div>

        <div id="epIII">
            <h2>Star Wars, épisode IX : L'Ascension de Skywalker</h2>
            <div>
                <img src="../img/films/film_9.jpg" alt="affiche film 9">
            </div>
            <div>
                <dl>
                    <dt>Titre original:</dt>
                    <dd>Star Wars: Episode IX – The Rise of Skywalker</dd>
                    <dt>Réalisation:</dt>
                    <dd>J. J. Abrams</dd>
                    <dt>Scénario:</dt>
                    <dd>J. J. Abrams</dd>
                    <dd>Chris Terrio</dd>
                    <dt>Musique:</dt>
                    <dd>John Williams</dd>
                    <dt>Sociétés de production:</dt>
                    <dd>Lucasfilm Ltd</dd>
                    <dd>Bad Robot</dd>
                    <dd>Walt Disney Pictures</dd>
                    <dt>Genre:</dt>
                    <dd>Science-fiction</dd>
                    <dt>Durée:</dt>
                    <dd>141 minutes</dd>
                    <dt>Sortie:</dt>
                    <dd>2019</dd>
                </dl>
            </div>
            <div>
                <h3>Synopsis</h3>
                Dans "Star Wars, épisode IX : L'Ascension de Skywalker", l'histoire se concentre sur la conclusion épique de la saga Skywalker. La Résistance, dirigée par la Générale Leia Organa, est confrontée à la menace persistante du Premier Ordre dirigé par Kylo Ren.
                Rey, maintenant formée en tant que Jedi, continue son périple pour découvrir la vérité sur ses origines et son lien avec la Force. Elle est accompagnée de ses alliés, Finn, Poe Dameron et d'autres fidèles, dans une quête pour contrecarrer les plans du Premier Ordre et retrouver le Sith énigmatique, l'Empereur Palpatine, revenu mystérieusement d'entre les morts.
                La lutte entre le bien et le mal s'intensifie, avec des batailles épiques, des révélations surprenantes et des confrontations majeures entre Rey et Kylo Ren. Le film explore les thèmes de la rédemption, de l'héritage familial, et offre des clôtures importantes pour plusieurs arcs narratifs et personnages emblématiques de la saga.
                Des alliances inattendues se forment, des sacrifices sont faits, et la galaxie est plongée dans un conflit final alors que Rey, soutenue par ses alliés, affronte Palpatine pour déterminer le sort de la galaxie et l'avenir des Jedi.
                "Star Wars, épisode IX : L'Ascension de Skywalker" vise à conclure l'épopée de la famille Skywalker tout en ouvrant la voie à de nouvelles histoires dans l'univers étendu de Star Wars.
            </div>
        </div>
        <?php }

            else {

            ?>
                <div id="contenu">
                    <h3 id="connh3"> La suite de ce contenu est reservé aux personnes connecté, vous pouvez vous identifier ou créer un compte : </h3>
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

